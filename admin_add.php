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
            print('<div class="row">
            <div class="col-md-12">
                <h3>
                    Ajouter un article
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <form role="form" method="post" action="rsc/fonctions/creerArticle.php" enctype="multipart/form-data">
                    <div class="form-group">
                         
                        <label for="titre">
                            Titre
                        </label>
                        <input type="text" class="form-control" id="titre" name="titre" />
                    </div>
                    <div class="form-group">
                         
                        <label for="genre">
                            Genre
                        </label>
                        <input type="text" class="form-control" id="genre" name="genre" />
                    </div>
                    <div class="form-group">
                         
                        <label for="auteur">
                            Auteur
                        </label>
                        <input type="text" class="form-control" id="auteur" name="auteur" />
                    </div>
                    <div class="form-group">
                         
                        <label for="prix">
                            Prix
                        </label>
                        <input type="number" class="form-control" id="prix" name="prix" step="0.01" />
                    </div>
                    <div class="form-group">
					 
					<label for="image">
						Image
					</label>
					<input type="file" class="form-control-file" id="image" name="image" />
				</div>
                    <input type="submit" class="btn btn-primary" value="Ajouter">
                    </input>
                </form>
            </div>
            <div class="col-md-4">
            </div>
        </div>
            ');
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