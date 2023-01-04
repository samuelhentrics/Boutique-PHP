<?php

session_start();

// Vérifier que l'on est connecté
if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && isset($_SESSION['role'])) {
    // Vérifier que l'one est admin
    if ($_SESSION['role']) {
        // on teste si nos variables sont définies
        if (isset($_POST['titre']) && isset($_POST['genre']) && isset($_POST['auteur']) && isset($_POST['prix']) && isset($_FILES['image'])) {
            // On récupére les infos BDD
            include("sql_param.php");

            // On récupére les données du formulaire
            $titre = $_POST['titre'];
            $genre = $_POST['genre'];
            $auteur = $_POST['auteur'];
            $prix = $_POST['prix'];

            $tmpNomImage = $_FILES['image']['tmp_name'];

            // On récupére l'extension de l'image
            $nomFichier = $_FILES['image']['name'];
            $explodeExtension = explode('.', $nomFichier);
            $extension = strtolower(end($explodeExtension));

            // On crée un nom unique à l'image
            $nomImage = uniqid('', true) . "." . $extension;

            // On met l'image dans le dossier
            move_uploaded_file($tmpNomImage, '../img/' . $nomImage);

            $nomtable = "cd";
            $link = mysqli_connect($host, $user, $pass, $bdd) or die("Impossible de se connecter à la BDD");

            $query = "INSERT INTO $nomtable (titre, genre, auteur, prix, url_image) VALUES ('$titre','$genre','$auteur',$prix, '$nomImage')";

            try {
                // Tentative d'ajout de l'article
                mysqli_query($link, $query);
                echo '<body onLoad="alert(\'Article crée\')">';
            }
            catch (Exception $e) {
                // Sinon si erreur 
                echo '<body onLoad="alert(\'Erreur lors de l\'ajout\')">';
            }


            $link->close();

            // Redirection vers le login
            echo '<meta http-equiv="refresh" content="0;URL=../../admin_liste.php">';
        } else {
            echo '<body onLoad="alert(\'Erreur lors de l\'ajout\')">';
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