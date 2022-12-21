<?php function creerListeArticles()
{
    include("rsc/class/Article.php");

    // Création de la liste (vide)
    $listeArticles = array();

    include("sql_param.php");
    try {

        // Tentative de connexion à la BDD
        $connexion = new PDO(
            'mysql:host=' . $host . ';dbname=' . $bdd,
            $user,
            $pass
        );
        $resultats = $connexion->query("SELECT * FROM cd");
        $resultats->setFetchMode(PDO::FETCH_OBJ);

        // Ajout de chaque tuple de la requete dans la liste
        while ($tuple = $resultats->fetch()) {
            // Création d'un objet Article (CD dans notre cas)
            $unCD = new Article($tuple->id, $tuple->titre, $tuple->genre, $tuple->auteur, $tuple->prix, $tuple->url_image);
            
            // Ajout de l'objet dans la liste
            $listeArticles[$tuple->id] = $unCD;
        }

        // Fermeture de la BDD
        $resultats->closeCursor();
    } // fin try
    catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
    }

    return $listeArticles;
}

$listeArticles = creerListeArticles();