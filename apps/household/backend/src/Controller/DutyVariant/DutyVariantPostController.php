<?php

declare(strict_types=1);

namespace Apps\Household\Backend\Controller\DutyVariant;

use App\Household\DutyVariant\Application\Create\CreateDutyVariantCommand;
use App\Household\Task\Application\Find\FindTaskExistsQuery;
use App\Household\Task\Domain\TaskId;
use App\Household\Task\Domain\TaskNotFound;
use App\Shared\Domain\ValueObject\Uuid;
use App\Shared\Infrastructure\Symfony\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints as Assert;

final class DutyVariantPostController extends ApiController
{
    #[Route('/api/v1/duty-variants', methods: ['POST'])]
    public function __invoke(Request $request): Response
    {
        $this->validateRequest($request);

        $this->ensureDutyExists((string) $request->request->get('taskId', ''));
        $this->createDutyVariant($request);

        return new Response('', Response::HTTP_CREATED);
    }

    protected function exceptions(): array
    {
        return [];
    }

    protected function constraints(): Constraint|array
    {
        return new Assert\Collection(
            [
                'taskId' => [new Assert\NotBlank()],
                'name' => [new Assert\NotBlank(), new Assert\Length(['min' => 1, 'max' => 255])],
            ]
        );
    }

    private function createDutyVariant(Request $request): void
    {
        $this->dispatch(new CreateDutyVariantCommand(
            Uuid::random()->value(),
            (string) $request->request->get('taskId', ''),
            (string) $request->request->get('name', ''),
            (int) $request->request->get('points', ''),
        ));
    }

    private function ensureDutyExists(string $taskId): void
    {
        /** @var \App\Household\Task\Application\Find\TaskExistsResponse $response */
        $response = $this->ask(new FindTaskExistsQuery($taskId));

        if (!$response->exists()) {
            throw new TaskNotFound(new TaskId($taskId));
        }
    }
}
