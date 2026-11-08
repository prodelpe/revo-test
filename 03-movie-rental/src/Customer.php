<?php

class Customer
{
    private string $name;
    private array $rentals = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addRental(Rental $rental): void
    {
        $this->rentals[] = $rental;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRentals(): array
    {
        return $this->rentals;
    }

    public function getTotalAmount(): float
    {
        $amounts = array_map(function (Rental $rental) {
            return $rental->getAmount();
        }, $this->rentals);

        return array_sum($amounts);
    }

    public function getTotalFrequentRenterPoints(): int
    {
        $points = array_map(function (Rental $rental) {
            return $rental->getFrequentRenterPoints();
        }, $this->rentals);

        return array_sum($points);
    }

    public function statement(StatementFormatter $formatter): string
    {
        return $formatter->format($this);
    }
}
