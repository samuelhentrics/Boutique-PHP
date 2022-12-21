<?php function creerListeArticles(){
    $listeArticles = array();

    include("sql_param.php");
    try
    {
    $connexion = new PDO ('mysql:host='.$host.';dbname='.$bdd, $user,
    $pass);
    $resultats=$connexion->query("SELECT * FROM cd");
    $resultats->setFetchMode(PDO::FETCH_OBJ);
    while( $tuple = $resultats->fetch() ) {
        $listeArticles[$tuple->id]["titre"] = $tuple->titre;
        $listeArticles[$tuple->id]["genre"] = $tuple->genre;
        $listeArticles[$tuple->id]["auteur"] = $tuple->auteur;
        $listeArticles[$tuple->id]["prix"] = $tuple->prix;
        $listeArticles[$tuple->id]["url_image"] = $tuple->url_image;
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