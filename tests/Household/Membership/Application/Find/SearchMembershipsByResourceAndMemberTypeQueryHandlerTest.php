<?php

declare(strict_types=1);

namespace App\Tests\Household\Membership\Application\Find;

use App\Household\Membership\Application\Converter\MembershipToResponseConverter;
use App\Household\Membership\Application\SearchByCriteria\MembersipsByCriteriaSearcher;
use App\Household\Membership\Application\SearchByCriteria\SearchMembershipsByResourceAndMemberTypeQuery;
use App\Household\Membership\Application\SearchByCriteria\SearchMembershipsByResourceAndMemberTypeQueryHandler;
use App\Tests\Household\Membership\Application\Converter\EntityNameToMembershipTypeConverter;
use App\Tests\Household\Membership\Domain\FakeEntity;
use App\Tests\Household\Membership\Domain\MembershipMother;
use App\Tests\Household\Membership\Domain\ResourceMother;
use App\Tests\Household\Membership\MembershipModuleUnitTestCase;
use function Lambdish\Phunctional\map;

final class SearchMembershipsByResourceAndMemberTypeQueryHandlerTest extends MembershipModuleUnitTestCase
{
    protected SearchMembershipsByResourceAndMemberTypeQueryHandler $handler;
    private MembershipToResponseConverter $converter;

    public function setUp(): void
    {
        parent::setUp();

        $this->handler = new SearchMembershipsByResourceAndMemberTypeQueryHandler(
            new MembersipsByCriteriaSearcher($this->repository())
        );
        $this->converter = new MembershipToResponseConverter();
    }

    /** @test */
    public function should_return_membership(): void
    {
        $resource = ResourceMother::create();

        $memberships = [
            MembershipMother::create(),
            MembershipMother::create(),
            MembershipMother::create(),
        ];

        $this->shouldMatch($memberships);

        $query = new SearchMembershipsByResourceAndMemberTypeQuery(
            $resource->id()->value(),
            EntityNameToMembershipTypeConverter::convert(FakeEntity::class),
        );

        $response = MembershipsResponseMother::create(...map(
            $this->converter,
            $memberships,
        ));

        $this->assertAskResponse($response, $query, $this->handler);
    }
}
