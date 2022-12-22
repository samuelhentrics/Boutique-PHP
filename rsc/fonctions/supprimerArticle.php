<?php

session_start();

if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && isset($_SESSION['role'])) {
    if ($_SESSION['role']) {
        // on teste si nos variables sont définies
        if (isset($_POST['id'])) {
            // On récupére le mot de passe du nom de login
            include("sql_param.php");

            // On récupére l'id a supprimer
            $id = $_POST['id'];

            $nomtable = "cd";

            $link = mysqli_connect($host, $user, $pass, $bdd) or die("Impossible de se connecter à la BDD");

            $query = "DELETE FROM $nomtable WHERE id=$id";

            try {
                // Tentative d'ajout de l'article
                mysqli_query($link, $query);
                echo '<body onLoad="alert(\'Article supprimé\')">';
            } catch (Exception $e) {
                // Sinon si erreur 
                echo '<body onLoad="alert(\'Erreur lors de la suppression\')">';
            }


            $link->close();

            // Redirection vers le login
            echo '<meta http-equiv="refresh" content="0;URL=../../admin_liste.php">';
        }
        else {
            echo 'Les variables du formulaire ne sont pas déclarées.';
        }
    }
    // Cas où l'utilisateur n'est pas administrateur
    else{
        echo '<meta http-equiv="refresh" content="0;URL=../../index.php">';
    }
}
// Cas où l'on est pas connecté
else{
    echo '<meta http-equiv="refresh" content="0;URL=../../index.php">';
}