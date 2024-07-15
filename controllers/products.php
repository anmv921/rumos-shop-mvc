<?php

require("models/products.php");
require('models/categories.php');

$productsModel = new Products();

$products = $productsModel
->getProductsFromCategory($id);

if ( count($products) == 0 ) {
    $categoriesModel = new Categories();
    $category = $categoriesModel
    ->getSubcategoryById($id);
    $products[0]["category"] = $category["name"];
}

require("views/products.php");