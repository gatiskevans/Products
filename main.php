<?php

    $csv = 'products.csv';
    $openFile = fopen($csv, 'rw');


    class Products {

        private $fileHandler;

        public function __construct($fileHandler){
            $this->fileHandler = $fileHandler;
        }

        public function mainMenu() {
            echo "1 | Add product\n";
            echo "2 | List products\n";
            echo "3 | Exit program\n";
            $selection = (int) readline("Welcome!");
            switch($selection){
                case 1:
                    break;
                case 2:
                    echo $this->listProducts($this->fileHandler);
                    break;
                case 3:
                    die("Bye!");
            }
        }

        public function listProducts($openFile): string {
            $listItems = '';
            while(list($id,$name,$quantity) = fgetcsv($openFile, 1000, ',')){
                $listItems .= "ID:$id $name, Qty: $quantity\n";
            }
            return $listItems;
        }

        public function addProduct() {
            
        }

    }

    $products = new Products($openFile);
    $products->mainMenu();