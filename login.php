<?php include("global.php"); ?>
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

<body class="text-center">
    <?php include("rsc/template/nav.php");

    echo '<div class="container-xxl">';


    // Cas où l'on est déjà connecté
    if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && isset($_SESSION['role'])) {
        print("Vous êtes déjà connecté");
    }

    // Cas où l'on souhaite se connecter
    else {
        print('
    <form action="rsc/fonctions/login.php" class="form-signin" method="post">
  
        <h1 class="h3 mb-3 font-weight-normal">Se connecter</h1>
        <label for="inputPseudo" class="sr-only">Pseudo</label>
        <input type="text" id="inputPseudo" name="login" class="form-control" placeholder="Pseudo" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Mot de passe</label>
        <input type="password" id="inputPassword" name="pwd" class="form-control" placeholder="Mot de passe" required="">
        <div class="checkbox mb-3">
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
        <div class="text-center">
                <p>Pas encore inscrit ? <a href="register.php">S\'inscrire</a></p>
        </div>
    </form>
    ');
    }


    echo '</div>';


    include("rsc/template/footer.php"); ?>
</body>

</html>