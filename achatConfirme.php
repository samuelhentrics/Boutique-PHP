<?php include("global.php"); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achat Confirmé</title>
    
    <?php include("rsc/template/head.php");

    ?>
</head>

<body class="text-center">
    <?php include("rsc/template/nav.php");

    echo '<div class="container-xxl">';


    // Cas où l'on est déjà connecté
    if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && isset($_SESSION['achat'])) {
        $numeroCommande = mt_rand(100000, 999999);
        echo '
        
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Merci pour votre achat !</h4>
            <p>Votre commande n°'.$numeroCommande.' a bien été prise en compte. Nous l\'expédirons le plus tôt possible.</p>
        </div>
        
        ';

        unset($_SESSION['achat']);
    }
    else {
        echo '<meta http-equiv="refresh" content="0;URL=panier.php">';
    }


    echo '</div>';


    include("rsc/template/footer.php"); ?>
</body>

</html>