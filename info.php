<?php include("global.php"); ?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <?php include("rsc/template/head.php"); ?>
</head>

<body>

    <?php

    include("rsc/template/nav.php");

    echo '<div class="container">';

    include_once("rsc/fonctions/recupererListeArticles.php");

    $article = $listeArticles[$_GET["idListe"]];

    if($article){
        echo '
        <h2> Information sur l\'article </h2>
        
        <div class="row">
            <div class="col-md-3">
                <img src="rsc/fonctions/genererVignette.php?nom='.$article->img_url.'">
            </div>

            <div class="col-md-9">
                <h3>'.$article->titre.'</h3>
                <small>Auteur : '.$article->auteur.' | Genre : '. $article->genre .'</small>
                <p>Découvrez l\'album "'. $article->titre.'" de '. $article->auteur .' !
                <h4>Prix : '.$article->prix.'</h4>
                <a class="btn btn-primary" href="rsc/fonctions/ajoutPanier.php?idCD='.$article->id.'">Ajouter au panier</a>
            </div>
        
        
        ';
    }
    else{
        echo "<h2>Le CD n'existe pas</h2>";
    }

    echo '</div>';

    include("rsc/template/footer.php");

    ?>

</body>

</html>