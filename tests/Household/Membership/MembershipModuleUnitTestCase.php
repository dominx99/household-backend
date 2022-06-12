<?php

declare(strict_types=1);

namespace App\Tests\Household\Membership;

use App\Household\Membership\Domain\Membership;
use App\Household\Membership\Domain\MembershipRepository;
use App\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class MembershipModuleUnitTestCase extends UnitTestCase
{
    private MembershipRepository|MockInterface|null $repository;

    protected function repository(): MembershipRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(MembershipRepository::class);
    }

    protected function shouldSave(Membership $membership): void
    {
        $this->repository()
            ->shouldReceive('save')
            ->with($this->similarTo($membership))
            ->once()
            ->andReturnNull()
        ;
    }

    protected function shouldSearch(?Membership $membership): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->once()
            ->andReturn($membership);
    }

    protected function shouldMatch(array $memberships): void
    {
        $this->repository()
            ->shouldReceive('matching')
            ->once()
            ->andReturn($memberships);
    }
}
