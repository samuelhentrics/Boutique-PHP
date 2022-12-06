<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <?php include("rsc/template/head.php");
        
    ?>
</head>
<body>
    <?php include("rsc/template/nav.php"); 


    if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && isset($_SESSION['role'])) {
        print("Vous êtes déjà connecté");
    }
    else{
    print('
    <form action="rsc/fonctions/login.php" method="post">
            Votre nom : <input type="text" name="user">
            <br />
            Votre mot de passe : <input type="password" name="pwd"><br />
            <input type="submit" value="Connexion">
    </form>

    ');
    }

    
    include("rsc/template/footer.php"); ?>
</body>
</html>