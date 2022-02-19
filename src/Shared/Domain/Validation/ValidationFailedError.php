<?php

declare(strict_types=1);

namespace App\Shared\Domain\Validation;

use InvalidArgumentException;

final class ValidationFailedError extends InvalidArgumentException
{
    private array $errors;

    public function __construct(array $errors)
    {
        $this->errors = $errors;
    }

    public function errors(): array
    {
        return $this->errors;
    }
}
