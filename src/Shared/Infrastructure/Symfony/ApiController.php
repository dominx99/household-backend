<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Symfony;

use App\Shared\Domain\Bus\Command\Command;
use App\Shared\Domain\Bus\Command\CommandBus;
use App\Shared\Domain\Validation\ValidationFailedError;
use function Lambdish\Phunctional\each;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validation;

abstract class ApiController
{
    public function __construct(
        private CommandBus $commandBus,
        ApiExceptionsHttpStatusCodeMapping $exceptionHandler
    ) {
        each(
            fn (int $httpCode, string $exceptionClass) => $exceptionHandler->register($exceptionClass, $httpCode),
            $this->exceptions()
        );
    }

    abstract protected function exceptions(): array;

    /** @return Constraint|Constraint[]  */
    abstract protected function constraints(): Constraint|array;

    protected function validateRequest(Request $request): void
    {
        $input = $request->request->all();

        $violations = Validation::createValidator()->validate($input, $this->constraints());

        if ($violations->count()) {
            throw new ValidationFailedError($this->formatViolationsToErrors($violations));
        }
    }

    private function formatViolationsToErrors(ConstraintViolationListInterface $violations): array
    {
        $errors = [];

        foreach ($violations as $violation) {
            $errors[str_replace(['][', ']', '['], ['.', '', ''], $violation->getPropertyPath())] = $violation->getMessage();
        }

        return $errors;
    }

    protected function dispatch(Command $command): void
    {
        $this->commandBus->dispatch($command);
    }
}
