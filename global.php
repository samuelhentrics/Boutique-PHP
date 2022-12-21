<?php
// Démarrage de la session
session_start(); 

// Création d'un panier vide si celui-ci n'existe pas
if(!isset($_SESSION["monPanier"])){
    $_SESSION["monPanier"] = array();
}

?>