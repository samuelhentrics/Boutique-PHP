<?php include("global.php"); ?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <?php include("rsc/template/head.php");?>
</head>
<body>
<?php 

include("rsc/template/nav.php");


if(isset($_SESSION["monPanier"])){

    // print_r($_SESSION["monPanier"]);

    function afficherElemPanier(){
        foreach ($_SESSION["monPanier"] as $monPanier => $unElementDuPanier) {
            print_r($unElementDuPanier); //array
        }
    }

    if(empty($_SESSION["monPanier"])){
        print("Votre panier est vide.");
    }
    else{
        afficherElemPanier();
    }
    
}


include("rsc/template/footer.php");

?>

    
</body>
</html>