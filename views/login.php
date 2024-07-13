<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title>Efectuar Login</title>
    </head>
    <body>
        <h1>Efectuar Login</h1>
<?php
    if(isset($message)) {
        echo '<p role="alert">' .$message. '</p>';
    }
?>
        <p>
            Se ainda não tem conta de utilizador, <a 
            href="<?=ROOT?>/register/">efectue registo</a>.
        </p>
        <form method="post" action="<?=ROOT?>/login/">
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
                    name="password" 
                    required minlength="8" 
                    maxlength="1000">
                </label>
            </div>
            <div>
                <button type="submit" 
                name="send">
                    Login
                </button>
            </div>
        </form>
    </body>
</html>