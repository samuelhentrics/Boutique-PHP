<?php 
// Démarrage de la session
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shloistine_bd";

$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM cd";
$result = $conn->query($sql);
$listeCD = array(array('id' => "id", "titre" => "titre", "genre"=> "genre", "auteur"=>"auteur", "prix"=>"prix", "url_image" =>"url_image"));
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
array_push($listeCD, array('id'=> $row['id'],'titre' => $row['titre'], 'genre' => $row['genre'], 'auteur' => $row['auteur'],'prix' => $row['prix'],'url_image' => $row['url_image']));

    }
} else {
    echo "0 results";
}
$conn->close();
// print_r(json_encode($listeCD[$_GET["idCD"]]));//decale de -1 dans l'id il faut change la facon de get $listeCD[$_GET["idCD"]]

if(isset($listeCD[$_GET["idCD"]]) && !in_array($listeCD[$_GET["idCD"]], $_SESSION['monPanier']))
    array_push($_SESSION['monPanier'], $listeCD[$_GET["idCD"]]);

?>