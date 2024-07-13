<?php

require_once("base.php");

class Countries extends Base {

    public function getCountries() {

        $query = $this->db->prepare("
            SELECT code, name
            FROM countries
            ORDER BY name
        ");

        $query->execute();

        return $query
        ->fetchAll( PDO::FETCH_ASSOC );

    } // End getCountries

    
} // End class