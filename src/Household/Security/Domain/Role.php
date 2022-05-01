<?php

declare(strict_types=1);

namespace App\Household\Security\Domain;

final class Role
{
    public function __construct(
        private string $name
    ) {
    }
}

