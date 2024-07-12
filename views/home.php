<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title>Mega Ultra Akea</title>
    </head>
    <body>
        <main>
            <ul>
<?php

    foreach($categories as $category) {
        echo '
            <li>
                <a href="' . ROOT . '/subcategories/' .
                $category["category_id"] .
                 '">' . $category["name"] . '</a>
            </li>
        ';
    }
?>
            </ul>
<?php
    require("templates/navigation.php");
?>
        </main>
    </body>
</html>