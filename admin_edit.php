<?php 
include("global.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <?php include("rsc/template/head.php"); ?>
</head>
<body>
    <?php include("rsc/template/nav.php");

    echo '<div class="container"><br>';


    if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && isset($_SESSION['role'])) {
        if($_SESSION['role']){
            if($_POST['id']){
                // Id du CD actuel
                $id = $_POST['id'];

                // On récupére les infos BDD
                include("rsc/fonctions/sql_param.php");

                $nomtable = "cd";
                $link = mysqli_connect($host, $user, $pass, $bdd) or die("Impossible de se connecter à la BDD");

                $query = "SELECT * FROM $nomtable WHERE id=$id";

                try {
                    // Tentative d'ajout de l'article
                    $result = mysqli_query($link, $query);

                    $donnees = mysqli_fetch_array($result);
                    $titre = $donnees["titre"];
                    $genre = $donnees["genre"];
                    $auteur = $donnees["auteur"];
                    $prix = $donnees["prix"];
                    $url_image = $donnees["url_image"];

                    print('<div class="row">
                <div class="col-md-12">
                    <h3>
                        Modifier un article
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <form role="form" method="post" action="rsc/fonctions/modifierArticle.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="'.$id.'"/>
                    <input type="hidden" name="url_image" value="'.$url_image.'"/>    
                    
                    <div class="form-group text-center">
                        <img src="./rsc/fonctions/genererVignette.php?nom='.$url_image.'">
                    </div>
                    <br>
                    <div class="form-group">
                            <label for="titre">
                                Titre
                            </label>
                            <input type="text" class="form-control" id="titre" name="titre" value="'.$titre.'" />
                        </div>
                        <br>
                        <div class="form-group">
                             
                            <label for="genre">
                                Genre
                            </label>
                            <input type="text" class="form-control" id="genre" name="genre" value="'.$genre.'" />
                        </div>
                        <br>
                        <div class="form-group">
                             
                            <label for="auteur">
                                Auteur
                            </label>
                            <input type="text" class="form-control" id="auteur" name="auteur" value="'.$auteur.'"/>
                        </div>
                        <br>
                        <div class="form-group">
                             
                            <label for="prix">
                                Prix
                            </label>
                            <input type="number" class="form-control" id="prix" name="prix" step="0.01" value="'.$prix.'" />
                        </div>
                        <br>
                        <div class="form-group">
                         
                        <label for="formFile" class="form-label" name="image">Changer d\'image ?</label>
                        <input class="form-control" type="file" id="formFile" name="image">
                        <br>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Modifier">
                        </input>
                    </form>
                </div>
                <div class="col-md-4">
                </div>
            </div>
                ');
                }
                catch (Exception $e) {
                    // Sinon si erreur 
                    echo '<h1>Erreur de requête SQL</h1>';
                } 

                
            }
            else{
                print('<h1>Code article inconnu.</h1>');
            }

        }
        else{
            print('<h1>Page inacessible</h1>');
        }
    }
    else{
    
    print('<h1>Page inacessible</h1>');
    }
    
    echo '</div>';
    include("rsc/template/footer.php"); ?>
</body>
</html>