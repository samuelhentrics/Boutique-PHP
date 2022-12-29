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

    echo '<br><div class="row">
            <div class="col-md-10">
                <h3>
                    Votre panier
                </h3>
            </div>';

    if (!empty($_SESSION["monPanier"])){
        echo '<div class="col-md-2">
            <a href="rsc/fonctions/viderPanier.php" class="btn btn-danger btn-lg">Vider le panier</a>
        </div>';
    }
    else{
        echo '<div class="col-md-2"></div>';
    }
   
    echo '</div><br>';

    if (isset($_SESSION["monPanier"])) {

        // Cas où le panier est vide
        if (empty($_SESSION["monPanier"])) {
            print("Votre panier est vide.");
        }

        // Cas où le panier n'est pas vide
        else {
            $totalPrix = 0;

            echo '
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
            ';
            
            foreach ($_SESSION["monPanier"] as $monPanier => $unElementDuPanier) {
                echo '
                <tr>
                    <th>
                        <img src="rsc/fonctions/genererVignette.php?nom='. $unElementDuPanier["url_image"].'&taille=150">
                    </th>
                    <th>' . $unElementDuPanier["titre"] . '</th>
                    <th>' . str_replace(".","€",$unElementDuPanier["prix"]) . '</th>
                    <th>
                        <input type="number" id=inputQuantite' . $unElementDuPanier["id"] . ' placeholder="quantite" min="0" onchange="modifierquantite(' . $unElementDuPanier["id"] . ')" value="' . $unElementDuPanier["quantite"] . '">
                    </th>
                    <th>
                        <a class="btn btn-danger" href="rsc/fonctions/supprimerPanier.php?idCD='. $unElementDuPanier["id"] . '">Supprimer</a>
                    </th>
                
                </tr>
                
                ';
                $totalPrix = $totalPrix + ($unElementDuPanier["prix"] * $unElementDuPanier["quantite"]);
            }

            echo "
                </tbody>
            </table>
            ";

            echo '<br>
            <div class="row">
                <div class="col-md-10">';

                echo '<p>Panier : '. str_replace(".","€",$totalPrix) .'</p>';
                echo '<p>Frais de livraison estimés : Gratuit</p>';
                echo '<h3>TOTAL : ' . str_replace(".","€",$totalPrix) .'</h3>';

                echo '
                </div>
                <div class="col-md-2">';
                if(isset($_SESSION['login']) && isset($_SESSION['pwd'])){
                    echo'
                    <button class="btn btn-success btn-lg">Valider mon panier</button>
                    ';
                }
                else{
                    echo '<p>Vous devez être connecté pour payer</p>';
                    echo '<a class="btn btn-primary btn-lg" href="login.php">Se connecter</a>';
                }
            
            echo '</div>
            </div><br>';


            
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