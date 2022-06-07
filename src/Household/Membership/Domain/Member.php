<?php

declare(strict_types=1);

namespace App\Household\Membership\Domain;

use App\Shared\Domain\BasicId;

final class Member
{
    public function __construct(
        private BasicId $id,
        private string $type,
    ) {
    }

    public function id(): BasicId
    {
        return $this->id;
    }

    public function type(): string
    {
        return $this->type;
    }
}
