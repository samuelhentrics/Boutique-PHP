<?php

session_start();

if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && isset($_SESSION['role'])) {
    if ($_SESSION['role']) {
        // on teste si nos variables sont définies
        if (isset($_POST['titre']) && isset($_POST['genre']) && isset($_POST['auteur']) && isset($_POST['prix']) && isset($_FILES['image'])) {
            // On récupére le mot de passe du nom de login
            include("sql_param.php");

            // On récupére les données du formulaire
            $titre = $_POST['titre'];
            $genre = $_POST['genre'];
            $auteur = $_POST['auteur'];
            $prix = $_POST['prix'];

            $tmpNomImage = $_FILES['image']['tmp_name'];
            $nomImage = $_FILES['image']['name'];
            move_uploaded_file($tmpNomImage, '../img/' . $nomImage);

            $nomtable = "cd";
            $link = mysqli_connect($host, $user, $pass, $bdd) or die("Impossible de se connecter à la BDD");

            $query = "INSERT INTO $nomtable (titre, genre, auteur, prix, url_image) VALUES ('$titre','$genre','$auteur',$prix, '$nomImage')";

            try {
                // Tentative d'ajout de l'article
                mysqli_query($link, $query);
                echo '<body onLoad="alert(\'Article crée\')">';
            } catch (Exception $e) {
                // Sinon si erreur 
                echo '<body onLoad="alert(\'Erreur lors de l\'ajout\')">';
            }


            $link->close();

            // Redirection vers le login
            echo '<meta http-equiv="refresh" content="0;URL=../../admin_liste.php">';
        } else {
            echo 'Les variables du formulaire ne sont pas déclarées.';
        }
    }
    else{
        echo '<meta http-equiv="refresh" content="0;URL=../../index.php">';
    }
}
else{
    echo '<meta http-equiv="refresh" content="0;URL=../../index.php">';
}