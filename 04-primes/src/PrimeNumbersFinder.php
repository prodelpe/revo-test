<?php

namespace Primes;

class PrimeNumbersFinder
{
    public function upTo(int $limit): array
    {
        if ($limit < 2) {
            return [];
        }

        $primes = array_filter(range(2, $limit), function (int $number) {
            return $this->isPrime($number);
        });

        return array_values($primes);
    }

    private function isPrime(int $number): bool
    {
        $divisors = array_filter(range(2, $number), function (int $divisor) use ($number) {
            return $number % $divisor === 0;
        });

        return count($divisors) === 1;
    }
}
