<?php

declare(strict_types=1);

namespace App\Tests\Household\Membership\Domain;

use App\Household\Membership\Domain\Member;
use App\Shared\Domain\BasicId;
use App\Tests\Shared\Domain\BasicIdMother;
use App\Tests\Shared\Domain\WordMother;

final class MemberMother
{
    public static function create(
        ?BasicId $id = null,
        ?string $type = null,
    ): Member {
        return new Member(
            $id ?? BasicIdMother::create(),
            $type ?? WordMother::create(),
        );
    }
}
