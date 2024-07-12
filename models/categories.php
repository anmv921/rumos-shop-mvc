<?php

class Categories {

    public $db;

    public function __construct() {
        // isto devia estar no config
        $this->db = new PDO(
            "mysql:host=localhost;dbname=shop;charset=utf8mb4",
             "root",
              "");
    }

    public function get() {
        $query = $this->db->prepare("
            SELECT category_id, name
            FROM categories
            WHERE parent_id = 0
        ");

        $query->execute();

        return $query->fetchAll();

    } // End get

} // End class