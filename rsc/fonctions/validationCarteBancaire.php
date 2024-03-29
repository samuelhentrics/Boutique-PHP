<?php
session_start();

// Récupération des données du formulaire
$numeroCarte = $_POST['numeroCarte'];
$nomCarte = $_POST['nomCarte'];
$dateExpiCarte = $_POST['dateExpiCarte'];
$cvv = $_POST['cvv'];

$carteValide = true;

// Vérifier que le code de carte bancaire est correcte
if (!preg_match('/^[0-9]{16}$/', $numeroCarte)) {
    // Vérifier que l'on ait 16 caractères qui sont des chiffres
    $carteValide = false;
}
if($numeroCarte[0]!=$numeroCarte[strlen($numeroCarte)-1]){
    // Vérifier que le premier caractere est le meme que le dernier
    $carteValide = false;
}


// Vérification de la validité de la carte bancaire
if (!preg_match('/^[0-9]{2}\/[0-9]{4}$/', $dateExpiCarte)) {
    // La date d'expiration doit être au format MM/YYYY
    $carteValide = false;
}
else{
    // Transformer la date au format Y-m
    $dateTab = explode('/', $dateExpiCarte);
    $dateExpiCarte = $dateTab[1] . "-" . $dateTab[0];
}

if (!preg_match('/^[0-9]{3}$/', $cvv)) {
    // Le CVV doit être un nombre
    $carteValide = false;
}

// Vérification que la carte à une date > 2 mois
$dateMaxCarteValide = date("Y-m", strtotime("+3 months"));

if (strtotime($dateMaxCarteValide) > strtotime($dateExpiCarte)) {
    $carteValide = false;
}

print('

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script src="https://kit.fontawesome.com/1c7be7f624.js" crossorigin="anonymous"></script>
<script>
function cacherDiv() {
    document.getElementById("check").style.visibility = "hidden";
    document.getElementById("resultat").style.visibility = "visible";
}

</script>


<body onload="setTimeout(cacherDiv,3000);"> 
    <div class="modal-dialog" role="document" id="check">
        <div class="modal-content rounded-4 shadow">
        <div class="modal-header border-bottom-0">
            <h4 class="modal-title fs-5">Vérification la carte bancaire</h4>
            
        </div>
        <div class="modal-body py-0">
            <p>Cette opération peut prendre un peu de temps</p>
        </div>
        </div>
    </div>

');

if ($carteValide) {
    // La carte bancaire est valide, on peut effectuer le paiement
    // Code de traitement du paiement...

    echo '
    <div class="alert alert-success" role="alert" id="resultat" style="visibility: hidden;">
        <h4 class="alert-heading">Payement validé !</h4>
        <p>Vous allez être redirigé vers le site ! Merci de votre achat !</p>
        <hr>
        <a type="button" href="../../achatConfirme.php" class="btn btn-lg btn-success w-100 mx-0 mb-2">Cliquez ici si vous n\'êtes pas redirigé</a>
    </div>
    
    </body>
    
    ';
    $_SESSION["monPanier"] = array();
    $_SESSION["achat"] = "ok";
    echo "<script>setTimeout(() => {
         location.replace('../../achatConfirme.php')
    }, 5000); </script>";

} else {
    // La carte bancaire est invalide, affichage d'un message d'erreur
    echo '
    <div class="alert alert-danger" role="alert" id="resultat" style="visibility: hidden;">
        <h4 class="alert-heading">Echec du payement !</h4>
        <p>Vous allez être redirigé vers le panier</p>
        <hr>
        <a type="button" href="../../panier.php" class="btn btn-lg btn-danger w-100 mx-0 mb-2">Cliquez ici si vous n\'êtes pas redirigé</a>
    </div>
    
    </body>
    
    ';
    


    echo "<script>setTimeout(() => {
        location.replace('../../panier.php')
    }, 5000); </script>";
}
?>