<?php

require('models/categories.php');

$model = new Categories();

$subcategories = $model->getSubcategories($id);

require("views/subcategories.php");