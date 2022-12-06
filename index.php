<?php session_start(); 
if(isset($_SESSION["monPanier"])){
    echo "votre panier existe";
    print_r($_SESSION["monPanier"]);  
}else{
    // $_SESSION["monPanier"] = array(["COMPILJPOP2022", 50]);
    echo "votre panier est vide";
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <?php include("rsc/template/head.php");
        
    ?>
</head>
<body>
    <?php include("rsc/template/nav.php"); ?>

    <h1>Bienvenue sur votre site de vente préféré pour vos achats de CD</h1>
    <p>Achetez chez nous !<p>

    <?php include("rsc/template/footer.php"); ?>
</body>
</html>