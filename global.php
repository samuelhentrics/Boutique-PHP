<?php

session_start(); 
if(!isset($_SESSION["monPanier"])){
    $_SESSION["monPanier"] = array();
}

?>