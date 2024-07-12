<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title>Carrinho</title>
        <style>
            table, tr, th, td {
                border: 1px solid #000;
                border-collapse: collapse;
            }
        </style>
    </head>
    <body>
<?php
    if( !empty($_SESSION["cart"]) ) {
?>
        <table>
            <tr>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Subtotal</th>
            </tr>
<?php
        $total = 0;

        foreach($_SESSION["cart"] as $item) {

            $subtotal = $item["price"] * $item["quantity"];
            $total += $subtotal;

            echo '
                <tr>
                    <td>' .$item["name"]. '</td>
                    <td>' .$item["quantity"]. '</td>
                    <td>' .$item["price"]. '€</td>
                    <td>' .$subtotal. '€</td>
                </tr>
            ';
        }
?>
            <tr>
                <td colspan="3"></td>
                <td><?php echo $total; ?>€</td>
            </tr>
        </table>
<?php
    }
    else {
        echo "<p>Ainda não tem nada no carrinho</p>";
    }
?>
        <nav>
            <a href="./">Voltar à Home</a>
            <a href="checkout.php">Efectuar Encomenda</a>
        </nav>
    </body>
</html>
