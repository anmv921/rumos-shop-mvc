<?php

require("models/products.php");

$model = new Products();

$products = $model->getProductsFromCategory($id);

require("views/products.php");