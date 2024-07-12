<?php

require("models/products.php");

$model = new Products();

$product = $model->getItem($id);

require("views/productdetail.php");