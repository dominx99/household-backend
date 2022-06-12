<?php

declare(strict_types=1);

namespace App\Household\Membership\Application\SearchByCriteria;

use App\Shared\Domain\Bus\Query\QueryHandler;
use App\Shared\Domain\Criteria\Filters;
use App\Shared\Domain\Criteria\Order;

final class SearchMembershipsByResourceAndMemberTypeQueryHandler implements QueryHandler
{
    public function __construct(private MembersipsByCriteriaSearcher $searcher)
    {
    }

    public function __invoke(SearchMembershipsByResourceAndMemberTypeQuery $query): MembershipsResponse
    {
        $filters = Filters::fromValues([
            [
                'field' => 'resource.id',
                'operator' => '=',
                'value' => $query->resourceId(),
            ],
            [
                'field' => 'member.type',
                'operator' => '=',
                'value' => $query->memberType(),
            ],
        ]);
        $order = Order::none();

        return $this->searcher->search($filters, $order, 0, 10);
    }
}
