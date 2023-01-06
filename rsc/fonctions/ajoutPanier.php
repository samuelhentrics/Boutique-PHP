<?php 
// Démarrage de la session
session_start(); 


include("sql_param.php");

// Créer la connexion à la BDD
$conn = new mysqli($host, $user, $pass, $bdd);

// Récupérer toutes les infos sur les CD
$sql = "SELECT * FROM cd";
$result = $conn->query($sql);
$listeCD = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $listeCD[$row['id']] = array('id'=> $row['id'],'titre' => $row['titre'], 'genre' => $row['genre'], 'auteur' => $row['auteur'],'prix' => $row['prix'],'url_image' => $row['url_image'], 'quantite' => 1);
    }
} else {
    echo "0 results";
}
$conn->close();

// Cas où l'on donne en parametre un idCD
if (isset($listeCD[$_GET["idCD"]])) {
    // S'il n'existe pas de CD avec cet id
    if (!$_SESSION['monPanier'][$_GET["idCD"]]){
        // Ajouter l'article avec une quantité de 1
        $_SESSION['monPanier'][$_GET["idCD"]] = $listeCD[$_GET["idCD"]];
    }
    else{
        // Sinon augmenter la quantité
        $_SESSION["monPanier"][$_GET["idCD"]]['quantite'] = $_SESSION["monPanier"][$_GET["idCD"]]['quantite']+1;
    }
    echo '<body onLoad="alert(\'Article ajouté au panier\')">';
    echo '<meta http-equiv="refresh" content="0;URL=../../articles.php">';
}
echo '<body onLoad="alert(\'Erreur lors de l\'ajout de l\'article au panier\')">';
echo '<meta http-equiv="refresh" content="0;URL=../../articles.php">';

?>