<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include("rsc/template/head.php");
        
    ?>
</head>
<body>
    <?php include("rsc/template/nav.php"); ?>
    <form action="tryLogin.php" method="post">
            Votre login : <input type="text" name="login">
            <br />
            Votre mot de passe : <input type="password" name="pwd"><br />
            <input type="submit" value="Connexion">
    </form>
    <?php include("rsc/template/footer.php"); ?>
</body>
</html>