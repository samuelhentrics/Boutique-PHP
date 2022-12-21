<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="fr">

<head>
    <style>
        input[type='number'] {
            width: 40px;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <?php include("rsc/template/head.php"); ?>
</head>

<body>
    <?php include("rsc/template/nav.php"); ?>

    <?php

    echo '<div class="container">';

    $listeCD = [];
    if (isset($_SESSION["monPanier"])) {

        $monPanier = $_SESSION['monPanier'];
        // define("MON_PANIER", $monPanier);
        function faireUnNouveauCD($genre, $titre, $auteur, $prix, $imgPochette = null)
        {

            $cd = [
                "genre_cd" => $genre,
                "titre_cd" => $titre,
                "auteur_cd" => $auteur,
                "prix_cd" => $prix,
                "imgPochette_cd" => $imgPochette,
            ];

            return $cd;
        };

        function afficherListeCD($liste)
        {
            echo '<form action="./panier.php" method="post">';
            foreach ($liste as $l => $unCD) {
                echo "<br>";
                foreach ($unCD as $key => $value) {
                    print_r($value . " ");
                }
                //prende la cd 
                // echo '<input type="checkbox" name="" id="">';
                echo '<input type="number" name="" id="" placeholder="nombre de de cd" min="0" value="0"';
                echo "<br>";
            }
            echo "<br>";
            echo '<button type="submit">Valide le choix de mon panier</button>';
            echo '</form>';
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
    }


    echo '</div>';

    ?>

    <?php include("rsc/template/footer.php"); ?>
</body>

</html>