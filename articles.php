<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="fr">

<head>
    <style>
        input[type='number'] {
            width: 40px;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <?php include("rsc/template/head.php"); ?>
</head>

<body>
    <?php include("rsc/template/nav.php"); ?>
    
    <?php include("./rsc/fonctions/panierJS.php"); ?>

<?php

include_once("rsc/fonctions/recupererListeArticles.php");

echo '
<div class="container">';

$nbArticle = 0;
$nbMaxArticleLigne = 4;

foreach ($listeArticles as $idListe => $unArticle){
    if ($nbArticle%$nbMaxArticleLigne == 0){
        echo '<div class="card-group mb-3">';
    }

    echo '
    <div class="card">
        <img class="card-img-top" src="rsc/fonctions/genererVignette.php?nom='. $unArticle->img_url .'">
        <div class="card-body">
            <h5 class="card-title">'. $unArticle->titre .'</h5>
            <p class="card-text"><small class="text-muted">Artiste : '. $unArticle->auteur .'</small></p>
            <p class="card-text">Prix : '. $unArticle->prix .'</p>
            <a class="btn btn-primary" href="rsc/fonctions/ajoutPanier.php?idCD='.$unArticle->id.'">Ajouter au panier</a>
        </div>
    </div>
    ';

    if ($idListe == sizeof($listeArticles)-1){
        $moduloActuel = $nbArticle%$nbMaxArticleLigne;
        for ($i= $moduloActuel; $i < $nbMaxArticleLigne-1; $i++) {
            echo '<div class="card"></div>';
        }
    }


    if ($nbArticle%$nbMaxArticleLigne == $nbMaxArticleLigne-1){
        echo '</div>';
    }

    $nbArticle++;

}
    

echo'
</div>
';


?>
  
<?php include("rsc/template/footer.php"); ?>

</body>

</html>