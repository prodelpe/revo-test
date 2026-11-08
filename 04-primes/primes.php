<?php

require_once 'vendor/autoload.php';

use Primes\PrimeNumbersFinder;

$limit = (int) ($argv[1] ?? 100);

$primeNumbersFinder = new PrimeNumbersFinder();
$primes = $primeNumbersFinder->upTo($limit);

$formattedPrimes = implode(', ', $primes);

echo "Prime numbers up to {$limit}: {$formattedPrimes}\n";
