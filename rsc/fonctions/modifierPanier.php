<?php

session_start();
$_SESSION["monPanier"][$_GET["idCD"]]['quantite'] = $_GET["quantite"];

?>