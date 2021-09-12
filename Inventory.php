<?php

    class Inventory
    {

        private array $products;

        public function __construct()
        {
            $productsList = array_map('str_getcsv', file('products.csv'));
            foreach($productsList as $product)
            {
                $product = new Product((string) $product[0], (int) $product[1], (int) $product[2]);
                $this->add($product);
            }
        }

        public function add(Product $products): void
        {
            $this->products[] = $products;
            $this->saveProducts();
        }

        public function getProducts(): array
        {
            return $this->products;
        }

        public function saveProducts(): void
        {
            $file = fopen('products.csv', 'w');

            foreach ($this->products as $product)
            {
                /** @var Product $product */
                fputcsv($file, [
                    $product->getName(),
                    $product->getPrice(),
                    $product->getQuantity()
                ]);
            }
            fclose($file);
        }
    }