<?php

    class Display {

        public function promptProduct(Inventory $inventory) {
            $name = readline("Product name: ");
            $price = (int) readline("Product price (¢): ");
            $quantity = (int) readline("Product quantity: ");
            $inventory->add(new Product($name, $price, $quantity));
        }

        public function promptChooseToAdd(Inventory $inventory){
            $selection = readline("Do you want to add a product: (Y/N) ");
            switch(strtoupper($selection)) {
                case "Y":
                    $this->promptProduct($inventory);
                    break;
                default:
                    echo "Bye!";
                    break;
            }
        }

        public function listProducts(Inventory $inventory): string {
            $list = '';
            /** @var Product $product */
            foreach($inventory->getProducts() as $index => $product){
                $list .= "$index | {$product->getname()}, ¢{$product->getPrice()}, Qty: {$product->getQuantity()}\n";
            }
            return $list;
        }

    }