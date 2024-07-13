<?php

class Base {
    public $db;

    public function __construct() {
        $this->db = new PDO(
            "mysql:host=localhost;dbname=shop;charset=utf8mb4", "root", "");
    } // End __construct

    public function getDb() {
        return $this->db;
    } // End getDb
    
} // End class