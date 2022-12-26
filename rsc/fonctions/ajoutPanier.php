<?php 
// Démarrage de la session
session_start(); 


include("sql_param.php");

// Create connection
$conn = new mysqli($host, $user, $pass, $bdd);
$sql = "SELECT * FROM cd";
$result = $conn->query($sql);
$listeCD = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $listeCD[$row['id']] = array('id'=> $row['id'],'titre' => $row['titre'], 'genre' => $row['genre'], 'auteur' => $row['auteur'],'prix' => $row['prix'],'url_image' => $row['url_image'], 'quantite' => 1);
    }
} else {
    echo "0 results";
}
$conn->close();
print_r($_SESSION['monPanier']);
if (isset($listeCD[$_GET["idCD"]])) {
    if (!$_SESSION['monPanier'][$_GET["idCD"]])
        $_SESSION['monPanier'][$_GET["idCD"]] = $listeCD[$_GET["idCD"]];
    else
        $_SESSION["monPanier"][$_GET["idCD"]]['quantite'] = $_SESSION["monPanier"][$_GET["idCD"]]['quantite']+1;
}

?>