<?php

declare(strict_types=1);

namespace App\Household\Duty\Application\Find;

use App\Shared\Domain\Bus\Query\Response;

final class DutyExistsResponse implements Response
{
    public function __construct(private bool $exists)
    {
    }

    public function exists(): bool
    {
        return $this->exists;
    }
}
