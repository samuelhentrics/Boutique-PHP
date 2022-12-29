<?php 
// Démarrage de la session
session_start(); 
$_SESSION["monPanier"] = array();
echo '<meta http-equiv="refresh" content="0;URL=../../panier.php">';

?>