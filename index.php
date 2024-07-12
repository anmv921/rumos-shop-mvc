<?php

define("ROOT", "/shopMVC");

echo $_SERVER['REQUEST_URI'];

$url_parts = explode("/", $_SERVER["REQUEST_URI"]);

$controller = $url_parts[2];

if( empty($controller) ) {
    $controller = "home";
}

require("controllers/" . $controller . ".php");