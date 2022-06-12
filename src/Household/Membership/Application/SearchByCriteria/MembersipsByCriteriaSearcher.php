<?php

declare(strict_types=1);

namespace App\Household\Membership\Application\SearchByCriteria;

use App\Household\Membership\Application\Converter\MembershipToResponseConverter;
use App\Household\Membership\Domain\MembershipRepository;
use App\Shared\Domain\Criteria\Criteria;
use App\Shared\Domain\Criteria\Filters;
use App\Shared\Domain\Criteria\Order;
use function Lambdish\Phunctional\map;

final class MembersipsByCriteriaSearcher
{
    public function __construct(private MembershipRepository $repository)
    {
    }

    public function search(Filters $filters, Order $order, ?int $limit, ?int $offset): MembershipsResponse
    {
        $criteria = new Criteria($filters, $order, $offset, $limit);

        return new MembershipsResponse(
            ...map(
                new MembershipToResponseConverter(),
                $this->repository->matching($criteria),
            ),
        );
    }
}
