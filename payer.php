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
    <script>
        function modifierquantite(id) {
            modifierquantitePanier(id, document.querySelector(`input#inputQuantite${id}`).value)
        }
    </script>
</head>

<body>

    <?php

    include("rsc/template/nav.php");

    echo '<div class="container">';

    if (isset($_SESSION['login']) && isset($_SESSION['pwd'])){
        if(!empty($_SESSION["monPanier"])){
            echo '<br><div class="row">
            <div class="col-md-8">
                <h2>
                    Payer votre commande
                </h2>
            </div>';

            $totalPrix = 0;
            foreach ($_SESSION["monPanier"] as $monPanier => $unElementDuPanier) {
                $totalPrix = $totalPrix + ($unElementDuPanier["prix"] * $unElementDuPanier["quantite"]);
            }

            echo '<div class="col-md-4">
                    <h2>Montant à payer : '. str_replace(".","€",$totalPrix)."<h2>
                </div>
                ";

            echo '
            <form action="rsc/fonctions/validationCarteBancaire.php" method="post">
                <label for="numeroCarte">Numéro de carte (5134476373697754) : </label><br>
                <input type="text" id="numeroCarte" name="numeroCarte" required><br>
                <label for="nomCarte">Nom du titulaire de la carte :(null)</label><br>
                <input type="text" id="nomCarte" name="nomCarte" required><br>
                <label for="dateExpiCarte">Date d\'expiration (MM/YYYY) :</label><br>
                <input type="text" id="dateExpiCarte" name="dateExpiCarte" required><br>
                <label for="cvv">CVV :</label><br>
                <input type="text" id="cvv" name="cvv" required><br><br>
                <input type="submit" value="Payer">
            </form>
            ';


        }
        else{
            echo '<meta http-equiv="refresh" content="0;URL=panier.php">';
        }
    }
    else{
        echo '<meta http-equiv="refresh" content="0;URL=panier.php">';
    }
    
    echo '</div>';
    include("rsc/template/footer.php");

    ?>
    


</body>

</html>