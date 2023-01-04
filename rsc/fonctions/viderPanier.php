<?php 
// Démarrage de la session
session_start(); 

// Vide le panier
$_SESSION["monPanier"] = array();

// Retour à la page Panier
echo '<meta http-equiv="refresh" content="0;URL=../../panier.php">';

?>