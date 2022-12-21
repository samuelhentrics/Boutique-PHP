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


    if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && isset($_SESSION['role'])) {
        if($_SESSION['role']){
            print('<h1>Liste des articles</h1>');
            print('
            <table id="liste" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Titre</th>
                        <th>Genre</th>
                        <th>Auteur</th>
                        <th>Prix</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>');

                include("rsc/fonctions/recupererListeArticles.php");

                foreach ($listeArticles as $numArticle => $unArticle){
                    print('
                    <tr>
                        <td>'.$unArticle->img_url.'</td>
                        <td>'.$unArticle->titre.'</td>
                        <td>'.$unArticle->genre.'</td>
                        <td>'.$unArticle->auteur.'</td>
                        <td>'.$unArticle->prix.'</td>
                        <td>'.$numArticle.'</td>
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
    

    include("rsc/template/footer.php"); ?>
</body>
</html>