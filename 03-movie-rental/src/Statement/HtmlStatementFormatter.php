<?php

class HtmlStatementFormatter implements StatementFormatter
{
    public function format(Customer $customer): string
    {
        $name = htmlspecialchars($customer->getName());

        $result = "<h1>Rental Record for {$name}</h1>\n";
        $result .= "<ul>\n";

        $result .= implode('', array_map(function (Rental $rental) {
            $title = htmlspecialchars($rental->getMovie()->getTitle());

            return "    <li>{$title}: {$rental->getAmount()}</li>\n";
        }, $customer->getRentals()));

        $result .= "</ul>\n";
        $result .= "<p>Amount owed is <strong>{$customer->getTotalAmount()}</strong></p>\n";
        $result .= "<p>You earned <strong>{$customer->getTotalFrequentRenterPoints()}</strong> frequent renter points</p>";

        return $result;
    }
}
