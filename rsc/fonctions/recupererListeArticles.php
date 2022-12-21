<?php function creerListeArticles(){
    include("rsc/class/Article.php");
    $listeArticles = array();

    include("sql_param.php");
    try
    {
    $connexion = new PDO ('mysql:host='.$host.';dbname='.$bdd, $user,
    $pass);
    $resultats=$connexion->query("SELECT * FROM cd");
    $resultats->setFetchMode(PDO::FETCH_OBJ);
    while( $tuple = $resultats->fetch() ) {
        $unCD = new Article($tuple->id, $tuple->titre,$tuple->genre,$tuple->auteur,$tuple->prix,$tuple->url_image);
        $listeArticles[$tuple->id] = $unCD;
    }
    $resultats->closeCursor();
    } // fin try
    catch(Exception $e){
        echo 'Erreur : '.$e->getMessage().'<br />';
    }

    return $listeArticles;
}

$listeArticles = creerListeArticles();
?>