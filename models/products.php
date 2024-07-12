<?php

class Products {
    public $db;

    public function __construct() {
        // isto devia estar no config
        $this->db = new PDO(
            "mysql:host=localhost;dbname=shop;charset=utf8mb4",
             "root",
              "");
    } // End __construct

    public function getProductsFromCategory($category_id) {
        $query = $this->db->prepare("
            SELECT
                products.product_id,
                products.name,
                products.image,
                categories.name AS category
            FROM
                products
            INNER JOIN
                categories USING(category_id)
            WHERE
                products.category_id = ?
        ");

        $query->execute([$category_id]);

        return $query->fetchAll();

    } // End getProductsFromCategory


}