<?php

require_once("base.php");

class Users extends Base {

    public function insertUser(
        $name,
        $email,
        $passwordHash,
        $address,
        $city,
        $postal_code,
        $country,
        $vat_code
    ) {
        $query = $this->db->prepare("
            INSERT INTO users
                (name,
                email,
                password,
                address,
                city,
                postal_code,
                country,
                vat_code)
            VALUES(?, ?, ?, ?, ?, ?, ?, ?)
        ");

        return $query->execute([
            $name,
            $email,
            $passwordHash,
            $address,
            $city,
            $postal_code,
            $country,
            $vat_code
        ]);

    } // End insertUser

} // End class