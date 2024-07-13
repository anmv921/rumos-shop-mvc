<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title>Criar Conta</title>
    </head>
    <body>
        <h1>Criar Conta</h1>
<?php
    if(isset($message)) {
        echo '<p role="alert">' .$message. '</p>';
    }
?>
        <p>
            Se já tem uma conta de utilizador, <a 
            href="<?=ROOT?>/login/" >
            efectue login
        </a>.
        </p>
        <form method="post" action="<?=ROOT?>/register/">
            <div>
                <label>
                    Nome
                    <input type="text" 
                    name="name" 
                    required minlength="3" maxlength="60">
                </label>
            </div>
            <div>
                <label>
                    Email
                    <input type="email" 
                    name="email" required>
                </label>
            </div>
            <div>
                <label>
                    Password
                    <input type="password" 
                    name="password" required minlength="8" 
                    maxlength="1000">
                </label>
            </div>
            <div>
                <label>
                    Repetir Password
                    <input type="password" 
                    name="repeat_password" required minlength="8" 
                    maxlength="1000">
                </label>
            </div>
            <div>
                <label>
                    Morada
                    <input type="text" 
                    name="address" required minlength="10" 
                    maxlength="120">
                </label>
            </div>
            <div>
                <label>
                    Cidade
                    <input type="text" 
                    name="city" required minlength="3" 
                    maxlength="40">
                </label>
            </div>
            <div>
                <label>
                    Código Postal
                    <input type="text" name="postal_code" 
                    required minlength="4" maxlength="20">
                </label>
            </div>
            <div>
                <label>
                    País
                    <select name="country">
<?php
    foreach($countries as $country) {

        $selected = "";
        if($country["code"] === "pt") {
            $selected = " selected";
        }

        echo '
            <option value="' .
            $country["code"]. '"' .$selected. '>' .
            $country["name"]. '</option>
        ';
    }
?>  
                    </select>
                </label>
            </div>
            <div>
                <label>
                    NIF
                    <input 
                    type="text" 
                    name="vat_code" 
                    required minlength="9" 
                    maxlength="11">
                </label>
            </div>
            <div>
                <label>
                    <input type="checkbox" name="agrees" required>
                    Concordo com os termos e condições
                </label>
            </div>
            <div>
                <button type="submit" 
                name="send">
                    Registar
                </button>
            </div>
        </form>
    </body>
</html>