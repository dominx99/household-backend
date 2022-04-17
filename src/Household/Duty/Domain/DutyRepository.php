<?php

declare(strict_types=1);

namespace App\Household\Duty\Domain;

interface DutyRepository
{
    public function save(Duty $duty): void;

    public function search(DutyId $id): ?Duty;
}
