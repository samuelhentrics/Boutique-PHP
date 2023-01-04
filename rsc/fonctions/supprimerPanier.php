<?php 

session_start();

// Supprime l'article choisi
unset($_SESSION["monPanier"][$_GET["idCD"]]);

// Retour à la page Panier
echo '<meta http-equiv="refresh" content="0;URL=../../panier.php">';

?>