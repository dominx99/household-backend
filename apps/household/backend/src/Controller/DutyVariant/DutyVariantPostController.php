<?php

declare(strict_types=1);

namespace Apps\Household\Backend\Controller\DutyVariant;

use App\Household\Duty\Application\Find\FindDutyExistsQuery;
use App\Household\Duty\Domain\DutyId;
use App\Household\Duty\Domain\DutyNotFound;
use App\Household\DutyVariant\Application\Create\CreateDutyVariantCommand;
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

        $this->ensureDutyExists((string) $request->request->get('dutyId', ''));
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
                'dutyId' => [new Assert\NotBlank()],
                'name' => [new Assert\NotBlank(), new Assert\Length(['min' => 1, 'max' => 255])],
            ]
        );
    }

    private function createDutyVariant(Request $request): void
    {
        $this->dispatch(new CreateDutyVariantCommand(
            Uuid::random()->value(),
            (string) $request->request->get('dutyId', ''),
            (string) $request->request->get('name', ''),
            (int) $request->request->get('points', ''),
        ));
    }

    private function ensureDutyExists(string $dutyId): void
    {
        /** @var \App\Household\Duty\Application\Find\DutyExistsResponse */
        $response = $this->ask(new FindDutyExistsQuery($dutyId));

        if (!$response->exists()) {
            throw new DutyNotFound(new DutyId($dutyId));
        }
    }
}
