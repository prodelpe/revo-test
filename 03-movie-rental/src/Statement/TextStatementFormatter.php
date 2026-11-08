<?php

class TextStatementFormatter implements StatementFormatter
{
    public function format(Customer $customer): string
    {
        $result = "Rental Record for {$customer->getName()}\n";

        $result .= implode('', array_map(function (Rental $rental) {
            return "\t{$rental->getMovie()->getTitle()}\t{$rental->getAmount()}\n";
        }, $customer->getRentals()));

        $result .= "Amount owed is {$customer->getTotalAmount()}\n";
        $result .= "You earned {$customer->getTotalFrequentRenterPoints()} frequent renter points";

        return $result;
    }
}
