<?php

require("models/categories.php");

$model = new Categories();

$categories = $model
->getCategories();

require("views/home.php");