<?php

enum MovieType
{
    case Regular;
    case NewRelease;
    case Children;

    public function getAmount(int $daysRented): float
    {
        return match ($this) {
            self::Regular => 2 + max($daysRented - 2, 0) * 1.5,
            self::NewRelease => $daysRented * 3,
            self::Children => 1.5 + max($daysRented - 3, 0) * 1.5,
        };
    }

    public function getFrequentRenterPoints(int $daysRented): int
    {
        return match ($this) {
            self::NewRelease => $daysRented > 1 ? 2 : 1,
            self::Regular, self::Children => 1,
        };
    }
}
