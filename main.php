<?php

    require_once 'Inventory.php';
    require_once 'Product.php';
    require_once 'Display.php';

    $inventory = new Inventory();
    $display = new Display();

    echo $display->listProducts($inventory);
    $display->promptChooseToAdd($inventory);