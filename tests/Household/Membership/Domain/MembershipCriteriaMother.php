<?php

declare(strict_types=1);

namespace App\Tests\Household\Membership\Domain;

use App\Shared\Domain\BasicId;
use App\Shared\Domain\Criteria\Criteria;
use App\Tests\Shared\Domain\Criteria\CriteriaMother;
use App\Tests\Shared\Domain\Criteria\FilterMother;
use App\Tests\Shared\Domain\Criteria\FiltersMother;

final class MembershipCriteriaMother
{
    public static function resourceIdAndMemberTypeEquals(
        BasicId $resourceId,
        string $memberType
    ): Criteria {
        return CriteriaMother::create(
            FiltersMother::create([
                FilterMother::fromValues(
                    [
                        'field' => 'resource.id',
                        'operator' => '=',
                        'value' => $resourceId->value(),
                    ],
                ),
                FilterMother::fromValues(
                    [
                        'field' => 'member.type',
                        'operator' => '=',
                        'value' => $memberType,
                    ],
                ),
            ])
        );
    }
}
