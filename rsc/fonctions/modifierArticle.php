<?php

session_start();

if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && isset($_SESSION['role'])) {
    if ($_SESSION['role']) {
        // on teste si nos variables sont définies
        if (isset($_POST['id']) && isset($_POST['titre']) && isset($_POST['genre']) && isset($_POST['auteur']) && isset($_POST['prix']) && isset($_POST['url_image'])) {
            // On récupére le mot de passe du nom de login
            include("sql_param.php");

            // On récupére les données du formulaire

            $id = $_POST['id'];
            $titre = $_POST['titre'];
            $genre = $_POST['genre'];
            $auteur = $_POST['auteur'];
            $prix = $_POST['prix'];
            $url_image = $_POST['url_image'];

            $nomtable = "cd";
            $link = mysqli_connect($host, $user, $pass, $bdd) or die("Impossible de se connecter à la BDD");

            $query = "UPDATE $nomtable SET titre='$titre', genre='$genre', auteur='$auteur', prix='$prix' WHERE id=$id";

            try {
                // Tentative d'ajout de l'article
                mysqli_query($link, $query);

                if($_FILES["image"]["name"] != null){
                    $tmpNomImage = $_FILES['image']['tmp_name'];
                    move_uploaded_file($tmpNomImage, '../img/' . $url_image);
                }

                echo '<body onLoad="alert(\'Article modifié\')">';
            }
            catch (Exception $e) {
                // Sinon si erreur 
                echo '<body onLoad="alert(\'Erreur lors de la modification\')">';
            }


            $link->close();

            // Redirection vers le login
            echo '<meta http-equiv="refresh" content="0;URL=../../admin_liste.php">';
        } else {
            echo '<body onLoad="alert(\'Erreur lors de la modification\')">';
            echo '<meta http-equiv="refresh" content="0;URL=../../admin_liste.php">';
        }
    }
    else{
        echo '<meta http-equiv="refresh" content="0;URL=../../index.php">';
    }
}
else{
    echo '<meta http-equiv="refresh" content="0;URL=../../index.php">';
}