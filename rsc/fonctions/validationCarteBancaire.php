<?php
session_start();
// Récupération des données du formulaire
$numeroCarte = $_POST['numeroCarte'];
$nomCarte = $_POST['nomCarte'];
$dateExpiCarte = $_POST['dateExpiCarte'];
$cvv = $_POST['cvv'];


// Tableau des regex de validation des numéros de carte bancaire
$regexes = array(
    'visa' => '/^4[0-9]{12}(?:[0-9]{3})?$/',
    'mastercard' => '/^(?:5[1-5][0-9]{2}|222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[01][0-9]|2720)[0-9]{12}$/',
    'amex' => '/^3[47][0-9]{13}$/',
    'diners' => '/^3(?:0[0-5]|[68][0-9])[0-9]{11}$/',
    'discover' => '/^6(?:011|5[0-9]{2})[0-9]{12}$/',
    'jcb' => '/^(?:2131|1800|35\d{3})\d{11}$/'
);

        $carteValide = false;
foreach ($regexes as $key => $uneRegexCB) {
    // Vérification de la validité du numéro de carte bancaire
    if (preg_match($uneRegexCB, $numeroCarte)) {
        // Le numéro de carte bancaire est valide
        // Code de traitement du paiement...
        $carteValide = true;
    }
}


// Vérification de la validité de la carte bancaire
if (!preg_match('/^[0-9]{2}\/[0-9]{4}$/', $dateExpiCarte)) {
    // La date d'expiration doit être au format MM/YYYY
    $carteValide = false;
} elseif (!preg_match('/^[0-9]{3}$/', $cvv)) {
    // Le CVV doit être un nombre
    $carteValide = false;
}

if ($carteValide) {
    // La carte bancaire est valide, on peut effectuer le paiement
    // Code de traitement du paiement...
    echo 'payment valide';
    $_SESSION["monPanier"] = array();
    echo "<script>setTimeout(() => {
        location.replace('http://localhost/PHP-Boutique/')
    }, 3000); </script>";
} else {
    // La carte bancaire est invalide, affichage d'un message d'erreur
    echo "La carte bancaire est invalide.";
    echo "<script> location.replace('http://localhost/PHP-Boutique/panier.php') </script>";
}
?>