<?php

namespace Primes\Tests;

use PHPUnit\Framework\TestCase;
use Primes\PrimeNumbersFinder;

class PrimeNumbersFinderTest extends TestCase
{
    private PrimeNumbersFinder $finder;

    protected function setUp(): void
    {
        parent::setUp();

        $this->finder = new PrimeNumbersFinder();
    }

    public function test_it_returns_two_as_the_only_prime_up_to_two(): void
    {
        $result = $this->finder->upTo(2);

        $this->assertSame([2], $result);
    }

    public function test_it_returns_all_primes_up_to_ten(): void
    {
        $result = $this->finder->upTo(10);

        $this->assertSame([2, 3, 5, 7], $result);
    }

    public function test_it_returns_no_primes_when_the_limit_is_below_two(): void
    {
        $this->assertSame([], $this->finder->upTo(1));
        $this->assertSame([], $this->finder->upTo(0));
        $this->assertSame([], $this->finder->upTo(-5));
    }

    public function test_it_finds_all_primes_up_to_one_thousand(): void
    {
        $result = $this->finder->upTo(1000);

        $this->assertCount(168, $result);
    }
}
