<?php

    require("models/countries.php");
    require("models/users.php");

    $countriesModel = new Countries();
    $countries = $countriesModel->getCountries();

    /* criar um array simples de códigos 
    para usar na validação do formulário */
    $country_codes = [];
    foreach($countries as $country) {
        $country_codes[] = $country["code"];
    }

    if( isset($_POST["send"]) ) {

        /* sanitizar cada elemento do
         formulário para prevenir XSS */
        foreach($_POST as $key => $value) {
            $_POST[ $key ] = trim(htmlspecialchars(strip_tags($value)));
        }

        if(
            mb_strlen($_POST["name"]) >= 3 &&
            mb_strlen($_POST["name"]) <= 60 &&
            mb_strlen($_POST["address"]) >= 10 &&
            mb_strlen($_POST["address"]) <= 120 &&
            mb_strlen($_POST["city"]) >= 3 &&
            mb_strlen($_POST["city"]) <= 40 &&
            mb_strlen($_POST["postal_code"]) >= 4 &&
            mb_strlen($_POST["postal_code"]) <= 20 &&
            mb_strlen($_POST["vat_code"]) >= 9 &&
            mb_strlen($_POST["vat_code"]) <= 11 &&
            mb_strlen($_POST["password"]) >= 8 &&
            mb_strlen($_POST["password"]) <= 1000 &&
            filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&
            $_POST["password"] === $_POST["repeat_password"] &&
            in_array($_POST["country"], $country_codes) &&
            isset( $_POST["agrees"] )
        ) {
            $message = "Conta criada com sucesso";

            $usersModel = new Users();
            $result = $usersModel
            ->insertUser(
                $_POST["name"],
                $_POST["email"],
                password_hash(
                $_POST["password"],
                PASSWORD_DEFAULT),
                $_POST["address"],
                $_POST["city"],
                $_POST["postal_code"],
                $_POST["country"],
                $_POST["vat_code"]
            );

            if($result) {
                $_SESSION["user_id"] = 
                $usersModel->getDb()->lastInsertId();
                header("Location: ".ROOT."/cart/");
            }
            else {
                $message = "Esta conta já existe";
            }
        }
        else {
            $message = "Informação obrigatória não preenchida correctamente";
        }
    }

    require('views/register.php');
?>