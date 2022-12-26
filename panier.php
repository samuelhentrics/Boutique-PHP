<?php include("global.php"); ?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <?php include("rsc/template/head.php"); ?>
    <?php include("rsc/fonctions/panierJS.php"); ?>
</head>

<body>
    
    <?php

    include("rsc/template/nav.php");

    echo '<div class="container">';
    echo '<h2>Votre panier <button onclick="viderPanier()">Vider le panier</button></h2>';

    if (isset($_SESSION["monPanier"])) {

        function afficherElemPanier()
        {
            // var_dump($_SESSION["monPanier"]);  

            $totalPrix = 0;
            foreach ($_SESSION["monPanier"] as $monPanier => $unElementDuPanier) {
                echo "<br>";
                echo '<div style="display: inline-flex;">';
                echo '<img src="./rsc/img/'.$unElementDuPanier["url_image"].'" alt="" width="120px">';
                echo '<h3>'.$unElementDuPanier["titre"].'</h3>';
                echo '<h5>'.$unElementDuPanier["auteur"].'</h5>';
                echo '<h3>'.$unElementDuPanier["prix"].'</h3>';
                echo '<input type="number" placeholder="quantite" min="0" value="'.$unElementDuPanier["quantite"].'">';
                echo '<button onclick="supprimerDuPanier('.$unElementDuPanier["id"].')">Supprimer</button>';
                echo '</div>';
                // echo "<br>    - Name: ". $row["titre"]. " " . $row["genre"] ." <img src=./rsc/img/".$row['url_image'].">" . "<br>";
            $totalPrix = $totalPrix + ($unElementDuPanier["prix"]*$unElementDuPanier["quantite"]);
            }
            echo '<h1>prix total a payer: ' . $totalPrix . '€</h1>';
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
<form action="validationCarteBancaire.php" method="post">
  <label for="numeroCarte">Numéro de carte (5134476373697754) : </label><br>
  <input type="text" id="numeroCarte" name="numeroCarte" required><br>
  <label for="nomCarte">Nom du titulaire de la carte :(null)</label><br>
  <input type="text" id="nomCarte" name="nomCarte" required><br>
  <label for="dateExpiCarte">Date d'expiration (MM/YYYY) :</label><br>
  <input type="text" id="dateExpiCarte" name="dateExpiCarte" required><br>
  <label for="cvv">CVV :</label><br>
  <input type="text" id="cvv" name="cvv" required><br><br>
  <input type="submit" value="Payer">
</form>


</body>

</html>