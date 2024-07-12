<?php

class Categories {

    public $db;

    public function __construct() {
        // isto devia estar no config
        $this->db = new PDO(
            "mysql:host=localhost;dbname=shop;charset=utf8mb4",
             "root",
              "");
    } // End __construct

    public function get() {
        $query = $this->db->prepare("
            SELECT category_id, name
            FROM categories
            WHERE parent_id = 0
        ");
        $query->execute();
        return $query->fetchAll();
    } // End get

    public function getSubcategories($parent_id) {
        $query = $this->db->prepare("
            SELECT
                c1.category_id,
                c1.name,
                c2.name AS parent_name
            FROM
                categories AS c1
            INNER JOIN
                categories AS c2 ON(c1.parent_id  = c2.category_id)
            WHERE
                c1.parent_id = ?
        ");

        // ? na query é uma variável
        // Execute recebe um array de variaveis - multiplos ??
        $query->execute([$parent_id]);

        return $query->fetchAll();
    } // End getSubcategories

} // End class