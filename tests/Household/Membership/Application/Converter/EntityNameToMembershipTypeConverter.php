<?php

declare(strict_types=1);

namespace App\Tests\Household\Membership\Application\Converter;

use App\Shared\Domain\Utils;
use function Lambdish\Phunctional\last;

final class EntityNameToMembershipTypeConverter
{
    public static function convert(string $className): string
    {
        return Utils::toSnakeCase(last(explode('\\', $className)));
    }
}
