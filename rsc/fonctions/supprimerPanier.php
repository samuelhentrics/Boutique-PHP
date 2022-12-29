<?php session_start()?>

<?php

unset($_SESSION["monPanier"][$_GET["idCD"]]);
echo '<meta http-equiv="refresh" content="0;URL=../../panier.php">';

?>