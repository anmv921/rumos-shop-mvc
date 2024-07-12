<?php

if(isset($_POST["send"]) &&
 intval($_POST["quantity"]) > 0) {
        
   require('models/products.php');

   $model = new Products();

   $product = $model->getProductWithStock(
    $_POST['product_id'],
    $_POST['quantity']);

    // die( print_r($product) );

    if(!empty($product)) {

        $_SESSION["cart"][ $product["product_id"] ] = [
            "product_id" => $product["product_id"],
            "quantity" => intval($_POST["quantity"]),
            "name" => $product["name"],
            "price" => $product["price"],
            "stock" => $product["stock"]
        ];
    } // End if

    /* forçar que o utilizador entre na página
       novamente mas por GET em vez de POST */
    header("Location: ".ROOT."/cart/");
} // End if





require('views/cart.php');