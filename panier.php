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
<script>
function getXMLHttpRequest() {
	var xhr = null;
	if (window.XMLHttpRequest || window.ActiveXObject) {
		if (window.ActiveXObject) {
			try {
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		} else {
			xhr = new XMLHttpRequest(); 
		}
	} else {
		alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
		return null;
	}
	return xhr;
}
function viderPanier(){
//Déclaration de notre objet XHR à l'aide de notre fonction déclarer plus haut
var xhr = getXMLHttpRequest();
//Déclaration d'une fonction sur l'événement onreadystatechange qui évolue au fur et à mesure de l'appel
xhr.onreadystatechange = function () {
  if(this.readyState == 4) //si la requête à abouti et est terminée
  {    
     if(this.status == 200) // si le code de retour est 200, le serveur à répondu et envoyé une réponse
     {
        //Le traitement à effectuer avec la réponse : affichage via alert, passage à une fonction, mise un jour du DOM (réponse dans xhr.responseText et dans xhr.responseXML).
        // alert("panier vidée")
     }
     else 
     {
        //traitement dans le cas d'un retour en erreur code != 200 : affichage par alert, console, mise à jour du DOM. 
        alert("erreur lors de la suppresion du panier");
     }
    location.reload()
  }
}
xhr.open("GET","./supprimerPanier.php",true); //Requête AJAX en mode GET sur l'url donnée.
xhr.send(null); //Puisque c'est une requête en GET
}
</script>
    <?php

    include("rsc/template/nav.php");

    echo '<div class="container">';
    echo '<h2>Votre panier <button onclick="viderPanier()">Vider le panier</button></h2>';

    if (isset($_SESSION["monPanier"])) {

        function afficherElemPanier()
        {
            // var_dump($_SESSION["monPanier"]);  


            foreach ($_SESSION["monPanier"] as $monPanier => $unElementDuPanier) {
                echo "<br>";
                echo '<div style="display: inline-flex;">';
                echo '<img src="./rsc/img/'.$unElementDuPanier["url_image"].'" alt="" width="120px">';
                echo '<h3>'.$unElementDuPanier["titre"].'</h3>';
                echo '<h5>'.$unElementDuPanier["auteur"].'</h5>';
                echo '<h3>'.$unElementDuPanier["prix"].'</h3>';
                echo '</div>';
                // echo "<br>    - Name: ". $row["titre"]. " " . $row["genre"] ." <img src=./rsc/img/".$row['url_image'].">" . "<br>";
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