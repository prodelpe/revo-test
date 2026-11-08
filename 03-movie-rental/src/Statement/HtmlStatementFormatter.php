<?php

class HtmlStatementFormatter implements StatementFormatter
{
    public function format(Customer $customer): string
    {
        $result = "<h1>Rental Record for {$customer->getName()}</h1>\n";
        $result .= "<ul>\n";

        $result .= implode('', array_map(function (Rental $rental) {
            return "    <li>{$rental->getMovie()->getTitle()}: {$rental->getAmount()}</li>\n";
        }, $customer->getRentals()));

        $result .= "</ul>\n";
        $result .= "<p>Amount owed is <strong>{$customer->getTotalAmount()}</strong></p>\n";
        $result .= "<p>You earned <strong>{$customer->getTotalFrequentRenterPoints()}</strong> frequent renter points</p>";

        return $result;
    }
}
