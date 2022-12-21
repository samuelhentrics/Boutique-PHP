<?php

// on teste si nos variables sont définies
if (isset($_POST['user']) && isset($_POST['pwd'])) {
    // On récupére le mot de passe du nom de login
    include("sql_param.php");

    $username = $_POST['user'];
    $mdp = $_POST['pwd'];

    if (isset($_POST['role'])){
        $estAdmin = 1;
    }
    else{
        $estAdmin = 0;
    }

    $nomtable = "utilisateur";

    $link = mysqli_connect($host, $user, $pass, $bdd) or die("Impossible de se connecter à la BDD");

    
    $query = "INSERT INTO $nomtable (user, mdp, role) VALUES ('$username','$mdp',$estAdmin)";

    try {
        mysqli_query($link, $query);
        echo '<body onLoad="alert(\'Utilisateur crée\')">';
    } catch (Exception $e) {
        echo '<body onLoad="alert(\'Utilisateur déjà existant\')">';
    }
      

    $link->close();

    // Redirection vers le login
    echo '<meta http-equiv="refresh" content="0;URL=../../login.php">';
} else {
    echo 'Les variables du formulaire ne sont pas déclarées.';
}
