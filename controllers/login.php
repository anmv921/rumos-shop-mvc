<?php

    require_once("models/users.php");

    if(isset($_POST["send"])) {
        
        foreach($_POST as $key => $value) {
            $_POST[$key] = trim(
                htmlspecialchars(strip_tags($value)));
        }
        
        if(
            filter_var($_POST["email"], 
            FILTER_VALIDATE_EMAIL) &&
            mb_strlen($_POST["password"]) >= 8 &&
            mb_strlen($_POST["password"]) <= 1000
        ) {
            $usersModel = new Users();

            $user = $usersModel
            ->getUser($_POST["email"]);

            if(
                !empty($user) &&
                password_verify($_POST["password"],
                 $user["password"])
            ) {
                $_SESSION["user_id"] = $user["user_id"];
                $_SESSION["user_name"] = $user["name"];
                header("Location: ".ROOT."/cart/");
            }
            else {
                $message = "Dados incorrectos";                
            }
        }
        else {
            $message = "Dados incorrectos";
        }
    }

    require("views/login.php");
?>