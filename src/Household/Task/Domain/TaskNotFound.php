<?php

declare(strict_types=1);

namespace App\Household\Task\Domain;

use App\Shared\Domain\DomainError;

final class TaskNotFound extends DomainError
{
    public function __construct(private TaskId $id)
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
