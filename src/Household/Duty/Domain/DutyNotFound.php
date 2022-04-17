<?php

declare(strict_types=1);

namespace App\Household\Duty\Domain;

use App\Shared\Domain\DomainError;

final class DutyNotFound extends DomainError
{
    public function __construct(private DutyId $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'duty_not_found';
    }

    protected function errorMessage(): string
    {
        return sprintf('The duty <%s> has not been found', $this->id->value());
    }
}
