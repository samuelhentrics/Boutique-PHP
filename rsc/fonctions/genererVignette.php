<?php

if (isset($_GET['nom'])) {
    // Récupérer le nom de l'image
    $nom_image = $_GET['nom'];

    // Chemin de l'image
    $cheminImg = '../img/' . $nom_image;

    // Paramètres de redimensionnement
    if (isset($_GET['taille'])){
        $largeur = $_GET['taille'];
        $hauteur = $_GET['taille'];
    }
    else{
        $largeur = 200;
        $hauteur = 200;
    }
    

    // Déterminer le type de l'image
    $type = pathinfo($cheminImg, PATHINFO_EXTENSION);
    // On vérifie le type de l'image si on peut la générer ou pas en vignette
    if ($type == 'jpg' || $type == 'jpeg') {
        $image = imagecreatefromjpeg($cheminImg);
    }
    elseif ($type == 'png') {
        $image = imagecreatefrompng($cheminImg);
    }
    else {
        die('Type d\'image non pris en charge');
    }

    // Obtenir les dimensions de l'image de base
    $largeurImage = imagesx($image);
    $hauteurImage = imagesy($image);

    // Calculer les dimensions de la nouvelle image 
    $ratio = min($largeur / $largeurImage, $hauteur / $hauteurImage);
    $nouvelleLargeur = $largeurImage * $ratio;
    $nouvelleHauteur = $hauteurImage * $ratio;

    // Créer la vignette
    $vignette = imagecreatetruecolor($nouvelleLargeur, $nouvelleHauteur);

    // Redimensionner l'image
    imagecopyresampled($vignette, $image, 0, 0, 0, 0, $nouvelleLargeur, $nouvelleHauteur, $largeurImage, $hauteurImage);

    // Envoyer l'image au navigateur
    header('Content-Type: image/jpeg');
    imagejpeg($vignette);

    imagedestroy($image);
    imagedestroy($vignette);
}
