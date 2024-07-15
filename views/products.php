<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title>
            <?php echo $products[0]["category"] ?? ""; ?>
        </title>
        <style>
            .products {
                list-style-type: none;
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                grid-gap: 20px;
            }

            .products li {
                text-align: center;
            }

            .products li img {
                width: 100%;
            }
        </style>
    </head>
    <body>
        <main>
            <h1>
                <?php echo $products[0]["category"] ?? ""; ?>
            </h1>
            <ul class="products">
<?php
    if (isset($products[0]["product_id"])) {
        foreach($products as $product) {
            echo '
                <li>
                    <a href="' . ROOT . '/productdetail/' . 
                    $product["product_id"] . '">
                        <img src="' . ROOT . '/images/' .
                        $product["image"] . '" alt="">' . 
                        $product["name"] .
                    '</a>
                </li>
            ';
        } // End foreach
    } // End if
?>
            </ul>
<?php
    require("templates/navigation.php");
?>
        </main>
    </body>
</html>