<?php

require("models/products.php");

$model = new Products();

$products = $model->getProductsFromCategory($id);

print_r($products);

// require("views/products.php");