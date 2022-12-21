<?php include("global.php"); ?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <?php include("rsc/template/head.php"); ?>
</head>

<body>
    <?php

    include("rsc/template/nav.php");

    echo '<div class="container">';
    echo '<h2>Votre panier</h2>';


    if (isset($_SESSION["monPanier"])) {

        function afficherElemPanier()
        {
            foreach ($_SESSION["monPanier"] as $monPanier => $unElementDuPanier) {
                print_r($unElementDuPanier);
            }
        }

        // Cas où le panier est vide
        if (empty($_SESSION["monPanier"])) {
            print("Votre panier est vide.");
        }

        // Cas où le panier n'est pas vide
        else {
            afficherElemPanier();
        }
    }

    

    echo '</div>';
    include("rsc/template/footer.php");

    ?>


</body>

</html>