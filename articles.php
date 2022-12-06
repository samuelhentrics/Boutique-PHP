<!DOCTYPE html>
<html lang="en">
<!-- <?php session_start(); ?> -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
</head>
<body>
    
</body>
</html>


<?php 
$listeCD = [];

function faireUnNouveauCD($genre, $titre, $auteur, $prix, $imgPochette=null){
    
    $cd = [
        "genre_cd" => $genre,
        "titre_cd" => $titre,
        "auteur_cd" => $auteur,   
        "prix_cd" => $prix,
        "imgPochette_cd" => $imgPochette,
    ];

    return $cd;
};

function afficherListeCD($liste){
    foreach($liste as $l => $unCD){
        echo "<br>----";
        foreach ($unCD as $key => $value) {
            print_r($value." ");
        } 
    }
}
// $cd = {
//     $genre = "JPOP";
//     $titre = "Hayasaka song";
//     $auteur = "Hayasaka";   
//     $prix = 28;
//     $imgPochette = "";
// } 

array_push($listeCD, faireUnNouveauCD("JPOP", "REDO", "LISA", 20));
array_push($listeCD, faireUnNouveauCD("RAP", "CHOP", "LISA", 20));
array_push($listeCD, faireUnNouveauCD("CLASIC", "AVALE", "LISA", 20));
array_push($listeCD, faireUnNouveauCD("OSEF", "NoName", "LISA", 20));

afficherListeCD($listeCD); 

?>
