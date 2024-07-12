<?php

require_once("base.php");

class Products extends Base {

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

    public function getItem($id) {
        $query = $this->db->prepare("
            SELECT product_id, name, description, price, stock, image, category_id
            FROM products
            WHERE product_id = ?
        ");

        $query->execute([$id]);

        return $query->fetch();
    } // End getItem

    public function getProductWithStock($product_id, $quantity) {

        $query = $this->db->prepare("
            SELECT product_id, name, price, stock
            FROM products
            WHERE product_id = ?
            AND stock >= ?
        ");

        $query->execute([
            $product_id,
            $quantity
        ]);

        return $query->fetch( PDO::FETCH_ASSOC );
    } // End getProductWithStock

} // End class