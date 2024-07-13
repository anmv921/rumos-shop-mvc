<?php

require_once("base.php");

class OrderDetails extends Base {

    public function insertOrderDetails(
        $order_id,
        $product_id,
        $quantity,
        $price
    ) {

        $query = $this->db->prepare("
            INSERT INTO orderdetails
            (order_id, 
            product_id, 
            quantity, 
            price_each)
            VALUES(?, ?, ?, ?)
        ");
    
        $query->execute([
            $order_id,
            $product_id,
            $quantity,
            $price
        ]);

    } // End insertOrderDetails

} // End class