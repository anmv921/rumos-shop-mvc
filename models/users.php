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

    public function getUser($email) {
        $query = $this->db->prepare("
            SELECT user_id, name, password
            FROM users
            WHERE email = ?
        ");
        $query->execute([$email]);

        return $query->fetch();
    } // End getUser

} // End class