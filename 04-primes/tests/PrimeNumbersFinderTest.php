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
}
