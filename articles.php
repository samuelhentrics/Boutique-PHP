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
    <script  language="javascript">
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
function ajoutCdSession(id){
var xhr = getXMLHttpRequest();
//Déclaration d'une fonction sur l'événement onreadystatechange qui évolue au fur et à mesure de l'appel
xhr.onreadystatechange = function () {
  if(this.readyState == 4) //si la requête à abouti et est terminée
  {    
     if(this.status == 200) // si le code de retour est 200, le serveur à répondu et envoyé une réponse
     {
        //Le traitement à effectuer avec la réponse : affichage via alert, passage à une fonction, mise un jour du DOM (réponse dans xhr.responseText et dans xhr.responseXML).
        // var resultat = JSON.parse(this.responseText);
        // document.getElementById('info').innerHTML = "Fiche de l'utilisateur : Nom : " + resultat.nom + " Prénom : " + resultat.prenom + " Tel : " + resultat.telephone; 
     }
     else 
     {
        //traitement dans le cas d'un retour en erreur code != 200 : affichage par alert, console, mise à jour du DOM. 
        alert("Le serveur n'a pas répondu à la requête : code d'erreur : " + this.status);
     }
  }
}
xhr.open("GET","./addPanier.php?idCD=" + id,true); //Requête AJAX en mode GET sur l'url donnée.
xhr.send(null); //Puisque c'est une requête en GET
}

</script>
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shloistine_bd";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM cd";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["id"]. " - Name: ". $row["titre"]. " " . $row["genre"] ." <img src=./rsc/img/".$row['url_image'].">" . "<br>";
        print("<button onclick=ajoutCdSession(".$row["id"].")>Ajouter au panier</button>");
    }
} else {
    echo "0 results";
}
$conn->close();

/*
    echo '<div class="container">';

    $listeCD = [];
    if (isset($_SESSION["monPanier"])) {

        $monPanier = $_SESSION['monPanier'];
        // define("MON_PANIER", $monPanier);
        function faireUnNouveauCD($id, $genre, $titre, $auteur, $prix, $imgPochette = null)
        {

            $cd = [
                "id_cd" => $id,
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
            echo '<form action="./panier.php" method="get">';
            foreach ($liste as $l => $unCD) {
                echo "<br>";
                foreach ($unCD as $key => $value) {
                    print_r($value . " ");
                }
                //prende la cd 
                // echo '<input type="checkbox" name="" id="">';
                echo '<input type="number" name="'.$unCD['id_cd'].'" id="'.$unCD['id_cd'].'" placeholder="nombre de de cd" min="0" value="0"';
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

        array_push($listeCD, faireUnNouveauCD(1,"JPOP", "REDO", "LISA", 20));
        array_push($listeCD, faireUnNouveauCD(2,"RAP", "CHOP", "LISA", 20));
        array_push($listeCD, faireUnNouveauCD(3,"CLASIC", "AVALE", "LISA", 20));
        array_push($listeCD, faireUnNouveauCD(4,"OSEF", "NoName", "LISA", 20));

        afficherListeCD($listeCD);
    }



    echo '</div>';
*/
    ?>
  
  <?php include("rsc/template/footer.php"); ?>

<script>
var xhr = getXMLHttpRequest();

</script>
</body>

</html>