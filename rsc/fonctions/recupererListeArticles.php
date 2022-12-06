<?php function creerListeArticles(){
    $listeArticles = array();

    $PARAM_hote='lakartxela.iutbayonne.univ-pau.fr'; // le chemin vers le serveur
    $PARAM_bdd='shloistine_bd'; // le nom de votre base de données
    $PARAM_user='shloistine_bd'; // nom d'utilisateur pour se connecter
    $PARAM_pw='shloistine_bd'; // mot de passe de l'utilisateur pour se connecter
    try
    {
    $connexion = new PDO ('mysql:host='.$PARAM_hote.';dbname='.$PARAM_bdd, $PARAM_user,
    $PARAM_pw);
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