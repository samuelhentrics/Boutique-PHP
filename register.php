<?php
include("global.php");
?>
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

<body class="text-center">
    <?php include("rsc/template/nav.php"); 

    echo '<div class="container">';


    // Cas où l'on est déjà connecté => impossible de refaire une demande de connexion
    if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && isset($_SESSION['role'])) {
        print("Vous êtes déjà connecté");
    }

    // Cas où l'on est pas connecté
    else{
    print('
    <form action="rsc/fonctions/creerUtilisateur.php" class="form-signin" method="post">
  
        <h1 class="h3 mb-3 font-weight-normal">S\'inscrire</h1>
        <label for="inputPseudo" class="sr-only">Pseudo</label>
        <input type="text" id="inputPseudo" name="user" class="form-control" placeholder="Pseudo" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Mot de passe</label>
        <input type="password" id="inputPassword" name="pwd" class="form-control" placeholder="Mot de passe" required="">
        <div class="checkbox mb-3">
        <label>
            <input type="checkbox" name="role">Administrateur ? (Mode dev)</label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">S\'inscrire</button>
        <div class="text-center">
                <p>Déjà inscrit ? <a href="login.php">Se connecter</a></p>
        </div>
    </form>
    

    ');
    }

    echo '</div>';

    include("rsc/template/footer.php"); ?>
</body>

</html>