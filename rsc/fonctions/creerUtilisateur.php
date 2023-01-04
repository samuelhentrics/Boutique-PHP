<?php

// on teste si nos variables sont définies
if (isset($_POST['user']) && isset($_POST['pwd'])) {
    // On récupére le mot de passe du nom de login
    include("sql_param.php");

    // On récupére les données du formulaire
    $username = $_POST['user'];
    $mdp = $_POST['pwd'];

    // Mode dev (pour le rôle)
    if (isset($_POST['role'])) {
        $estAdmin = 1;
    } else {
        $estAdmin = 0;
    }


    $nomtable = "utilisateur";
    $link = mysqli_connect($host, $user, $pass, $bdd) or die("Impossible de se connecter à la BDD");
    $query = "INSERT INTO $nomtable (user, mdp, role) VALUES ('$username','$mdp',$estAdmin)";

    try {
        // Tentative d'ajout de l'utilisateur
        mysqli_query($link, $query);
        echo '<body onLoad="alert(\'Utilisateur crée\')">';
    } catch (Exception $e) {
        // Sinon si erreur = utilisateur existant
        echo '<body onLoad="alert(\'Utilisateur déjà existant\')">';
    }


    $link->close();

    // Redirection vers le login
    echo '<meta http-equiv="refresh" content="0;URL=../../login.php">';
} else {
    echo '<meta http-equiv="refresh" content="0;URL=../../register.php">';
}
