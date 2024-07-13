<?php

require_once("base.php");

class Orders extends Base {

    public function insertUserIdIntoOrders($user_id) {
        $query = $this->db->prepare("
            INSERT INTO orders
            (user_id)
            VALUES(?)
        ");

        $query
        ->execute([ $user_id ]);
        
        return $this->db->lastInsertId();

    } // End insertUserIdIntoOrders




} // End class