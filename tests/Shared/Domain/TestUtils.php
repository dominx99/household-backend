<?php

declare(strict_types=1);

namespace App\Tests\Shared\Domain;

use App\Tests\Shared\Infrastructure\Mockery\MatcherIsSimilar;

final class TestUtils
{
    public static function similarTo($value, $delta = 0.0): MatcherIsSimilar
    {
        return new MatcherIsSimilar($value, $delta);
    }
}
