# Revo technical test

Four exercises solved in plain PHP (8.4+), one folder per exercise, without frameworks. Loops over collections are written with higher-order functions (`array_map`, `array_filter`, `array_sum`, `array_column`, `implode`), never with `foreach`.

## 01 - GitHub score

Fetches the public events of a GitHub user and scores them: PushEvent 5, CreateEvent 4, IssuesEvent 3, CommitCommentEvent 2, anything else 1.

```
cd 01-github-score && php score.php
```

- `GithubEventsClient` calls the GitHub API (unauthenticated, so the result is limited to the latest events) and returns the decoded events, throwing if the request fails.
- `GithubScoreCalculator` maps each event to its points and sums them.

## 02 - Variants cost

Reads a products feed and sums the price of every variant of the products of the given types (Lamp and Wallet).

```
cd 02-variants-cost && php cost.php
```

- `products.json` is a sample feed with the same structure as the one in the exercise, including a product without variants.
- `VariantsCostCalculator` filters the products by type, flattens their variants and sums the prices. A single total is returned, as the exercise asks for "the cost of all the variants".

## 03 - Movie rental

Refactor of the classic movie rental statement, keeping the original output.

```
cd 03-movie-rental && php statement.php
```

- `MovieType` is an enum that owns the pricing and frequent renter points rules for each type, so adding a type means adding a case.
- `Rental` delegates its amount and points to the movie type; `Customer` sums them.
- The statement is rendered by a `StatementFormatter` implementation: `TextStatementFormatter` and `HtmlStatementFormatter` (which escapes names and titles) are included. A new format (XML, JSON...) is a new class implementing the interface; `Customer` does not change.

## 04 - Prime numbers

Prints the prime numbers up to a given limit, built with TDD. The commit history shows each red/green/refactor step.

```
cd 04-primes && composer install
vendor/bin/phpunit
php primes.php 50
```

- "A given input" is interpreted as an upper limit: `PrimeNumbersFinder::upTo(int $limit)` returns the primes between 2 and the limit. The script takes the limit as its first argument and defaults to 100.
- 1 is not a prime number, so limits below 2 return an empty list.
- Primality is checked by trial division: a number is prime when its only divisor from 2 upwards is itself.
