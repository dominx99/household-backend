<?php

declare(strict_types=1);

namespace App\Household\DutyVariant\Domain;

interface DutyVariantRepository
{
    public function save(DutyVariant $dutyVariant): void;
}
