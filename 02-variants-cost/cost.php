<?php

require_once 'VariantsCostCalculator.php';

$feed = json_decode(file_get_contents('products.json'), true);

$variantsCostCalculator = new VariantsCostCalculator();
$total = $variantsCostCalculator->calculate($feed['products'], ['Lamp', 'Wallet']);

$formattedTotal = number_format($total, 2, ',', '.');

echo "Total cost: {$formattedTotal}\n";
