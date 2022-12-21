<?php

// on teste si nos variables sont définies
if (isset($_POST['login']) && isset($_POST['pwd'])) {
    // On récupére le mot de passe du nom de login
    include("sql_param.php");
    $login_valide = $_POST['login'];

    $nomtable = "utilisateur";

    $link = mysqli_connect($host, $user, $pass, $bdd) or die("Impossible de se connecter à la BDD");

    $query = "SELECT mdp, role FROM $nomtable WHERE user='$login_valide'";

    $result = mysqli_query($link, $query);
    $resultReq = mysqli_fetch_assoc($result);
    $pwd_valide = $resultReq["mdp"];
    $role = $resultReq["role"];

    $link->close();

    // on vérifie les informations saisies
    if ($login_valide == $_POST['login'] && $pwd_valide == $_POST['pwd']) {
        session_start();
        // on enregistre les paramètres de notre visiteur comme variables session ($login et $pwd) (
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['pwd'] = $_POST['pwd'];
        $_SESSION['role'] = $role;
        // on redirige notre visiteur vers une page de notre section membre
        header('location: ../../index.php');
    } else {
        echo '<body onLoad="alert(\'Vos identifiants sont incorrects\')">';
        // puis on le redirige vers la page d'accueil
        echo '<meta http-equiv="refresh" content="0;URL=../../login.php">';
    }
} else {
    echo 'Les variables du formulaire ne sont pas déclarées.';
}
