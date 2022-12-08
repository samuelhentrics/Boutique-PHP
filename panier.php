<?php session_start(); ?>
<?php 
if($_POST["POST"])
    echo var_dump($_POST);
if(isset($_SESSION["monPanier"])){

    // print_r($_SESSION["monPanier"]);

    function afficherElemPanier(){
        foreach ($_SESSION["monPanier"] as $monPanier => $unElementDuPanier) {
            print_r($unElementDuPanier); //array
        }
    }
    afficherElemPanier();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>