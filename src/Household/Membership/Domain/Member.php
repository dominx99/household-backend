<?php

declare(strict_types=1);

namespace App\Household\Membership\Domain;

final class Member
{
    public function __construct(
        private string $id,
        private string $type,
    ) {}

    public function id(): string
    {
        return $this->id;
    }

    public function type(): string
    {
        return $this->type;
    }
}
