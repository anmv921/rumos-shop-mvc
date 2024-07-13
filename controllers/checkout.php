<?php

require_once("models/orders.php");
require_once("models/orderdetails.php");

/* verificar se o utilizador não está logado */
if( !isset($_SESSION["user_id"]) ) {

    header("Location: ".ROOT."/login/");
    exit;
}

/* verificar se o carrinho está vazio */
if( empty($_SESSION["cart"]) ) {

    header("Location: ".ROOT."/");
    exit;
}

/* se estiver tudo OK, efectuar a encomenda */

$ordersModel = new Orders();

$order_id = $ordersModel
->insertUserIdIntoOrders( 
    $_SESSION["user_id"] );

foreach($_SESSION["cart"] as $item) {

    $orderDetailsModel = new OrderDetails();

    /* inserir a linha de encomenda */
    $query = $db->prepare("
        INSERT INTO orderdetails
        (order_id, product_id, quantity, price_each)
        VALUES(?, ?, ?, ?)
    ");
    
    $query->execute([
        $order_id,
        $item["product_id"],
        $item["quantity"],
        $item["price"]
    ]);

    /* abater no stock */
    $query = $db->prepare("
        UPDATE products
        SET stock = stock - ?
        WHERE product_id = ?
    ");
    
    $query->execute([
        $item["quantity"],
        $item["product_id"]
    ]);
}

unset( $_SESSION["cart"] );

echo "<p>Obrigado por efectuar a encomenda, para proceder ao pagamento use a referencia MB 129038092174</p>";
