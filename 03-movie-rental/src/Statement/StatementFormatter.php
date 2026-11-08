<?php

interface StatementFormatter
{
    public function format(Customer $customer): string;
}
