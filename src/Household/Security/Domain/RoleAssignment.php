<?php

declare(strict_types=1);

namespace App\Household\Security\Domain;

final class RoleAssignment
{
    public function __construct(
        private string $roleId,
        private string $userId,
        private string $resourceId,
    ) {
    }
}
