<?php 
include("global.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des articles</title>
    <?php include("rsc/template/head.php");
        
    ?>
    <script>
        $(document).ready(function () {
            $('#liste').DataTable();
        });
    </script>
</head>
<body>
    <?php include("rsc/template/nav.php");

    echo '<div class="container"><br>';


    if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && isset($_SESSION['role'])) {
        if($_SESSION['role']){
            print('<div class="row">
                        <div class="col-md-9">
                            <h3>
                                Liste des articles
                            </h3>
                        </div>
                        <div class="col-md-3">
                            <a type="button" class="btn btn-primary btn-lg" href="admin_add.php">
                                Ajouter un article
                            </a>
                        </div>
                    </div><br><br>');
            print('
            <table id="liste" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Vignette</th>
                        <th>Titre</th>
                        <th>Genre</th>
                        <th>Auteur</th>
                        <th>Prix</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>');

                include("rsc/fonctions/recupererListeArticles.php");

                foreach ($listeArticles as $idListe => $unArticle){
                    print('
                    <tr>
                        <td>'."<img src='./rsc/fonctions/genererVignette.php?nom=".$unArticle->img_url."'>".'</td>
                        <td>'.$unArticle->titre.'</td>
                        <td>'.$unArticle->genre.'</td>
                        <td>'.$unArticle->auteur.'</td>
                        <td>'.$unArticle->prix.'</td>
                        <td>
                            <form id="modifier" action="admin_edit.php" method="post">
                            <input type="hidden" name="id" value="'.$unArticle->id.'"/>
                            <input type="submit" class="btn btn-primary btn-lg" value="Modifier"></input>
                            </form>
                            <br>
                            <form id="delete" action="rsc/fonctions/supprimerArticle.php" method="post">
                            <input type="hidden" name="id" value="'.$unArticle->id.'"/>
                            <input type="submit" class="btn btn-danger btn-lg" value="Supprimer"></input>
                            </form>
                        </td>
                    </tr>
                ');
                }
                

            print('
                </tbody>
            </table>
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