<?php

declare(strict_types=1);

namespace App\Household\Duty\Application\Find;

use App\Household\Duty\Domain\DutyId;
use App\Household\Duty\Domain\DutyRepository;
use App\Shared\Domain\Bus\Query\QueryHandler;

final class FindDutyExistsQueryHandler implements QueryHandler
{
    public function __construct(private DutyRepository $repository)
    {
    }

    public function __invoke(FindDutyExistsQuery $query): DutyExistsResponse
    {
        if (!$this->repository->search(new DutyId($query->dutyId()))) {
            return new DutyExistsResponse(false);
        }

        return new DutyExistsResponse(true);
    }
}
