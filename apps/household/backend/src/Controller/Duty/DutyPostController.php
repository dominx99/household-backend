<?php

declare(strict_types=1);

namespace Apps\Household\Backend\Controller\Duty;

use App\Shared\Infrastructure\Symfony\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints as Assert;

final class DutyPostController extends ApiController
{
    #[Route('/api/v1/duties', methods: ['POST'])]
    public function __invoke(Request $request): Response
    {
        $this->validateRequest($request);

        $this->createDuty($request);

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
                'name' => [new Assert\NotBlank(), new Assert\Length(['min' => 1, 'max' => 255])],
            ]
        );
    }

    private function createDuty(Request $request): void
    {
    }
}
