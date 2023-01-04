<?php

session_start();

// Vérifier que l'on est connecté
if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && isset($_SESSION['role'])) {
    // Vérifier que l'on est admin
    if ($_SESSION['role']) {
        // on teste si nos variables sont définies
        if (isset($_POST['id']) && isset($_POST['url_image'])) {
            // On récupére les infos sur la BDD
            include("sql_param.php");

            // On récupére l'id a supprimer
            $id = $_POST['id'];

            $nomtable = "cd";

            // Supprimer l'image du CD
            $file = "../img/" . $_POST["url_image"];
            if (file_exists($file)) {
                unlink($file);
            }

            // Connexion à la BDD
            $link = mysqli_connect($host, $user, $pass, $bdd) or die("Impossible de se connecter à la BDD");

            $query = "DELETE FROM $nomtable WHERE id=$id";

            try {
                // Tentative de suppression de l'article
                mysqli_query($link, $query);
                echo '<body onLoad="alert(\'Article supprimé\')">';
            } catch (Exception $e) {
                // Sinon si erreur 
                echo '<body onLoad="alert(\'Erreur lors de la suppression\')">';
            }


            $link->close();

            // Redirection vers admin_liste
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