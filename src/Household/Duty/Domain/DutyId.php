<?php

declare(strict_types=1);

namespace App\Household\Duty\Domain;

use App\Shared\Domain\ValueObject\Uuid;
use Doctrine\ORM\Mapping\Embeddable;

#[Embeddable]
final class DutyId extends Uuid
{
}
