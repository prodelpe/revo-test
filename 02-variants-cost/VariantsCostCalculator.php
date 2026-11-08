<?php

class VariantsCostCalculator
{
    public function calculate(array $products, array $productTypes): float
    {
        $filteredProducts = array_filter($products, function ($product) use ($productTypes) {
            return in_array($product['product_type'], $productTypes);
        });

        $variantGroups = array_column($filteredProducts, 'variants');
        $variants = array_merge(...$variantGroups);
        $prices = array_column($variants, 'price');

        return array_sum($prices);
    }
}

