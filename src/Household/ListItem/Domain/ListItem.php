<?php

declare(strict_types=1);

namespace App\Household\ListItem\Domain;

final class ListItem
{
    public function __construct(private ListItemId $id, private string $name)
    {
    }

    public function id(): ListItemId
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }
}
