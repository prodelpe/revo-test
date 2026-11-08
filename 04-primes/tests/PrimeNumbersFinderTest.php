<?php

namespace Primes\Tests;

use PHPUnit\Framework\TestCase;
use Primes\PrimeNumbersFinder;

class PrimeNumbersFinderTest extends TestCase
{
    public function test_it_returns_two_as_the_only_prime_up_to_two(): void
    {
        $finder = new PrimeNumbersFinder();
        $result = $finder->upTo(2);
        $this->assertSame([2], $result);
    }

    public function test_it_returns_all_primes_up_to_ten(): void
    {
        $finder = new PrimeNumbersFinder();
        $result = $finder->upTo(10);
        $this->assertSame([2, 3, 5, 7], $result);
    }

    public function test_it_returns_no_primes_when_the_limit_is_below_two(): void
    {
        $finder = new PrimeNumbersFinder();
        $result = $finder->upTo(1);
        $this->assertSame([], $result);
    }
}
