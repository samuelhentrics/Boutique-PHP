<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="fr">

<head>
    <style>
        input[type='number'] {
            width: 40px;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <?php include("rsc/template/head.php"); ?>
</head>

<body>
    <?php include("rsc/template/nav.php"); ?>
    <?php include("./rsc/fonctions/sql_param.php"); ?>
    <?php include("./rsc/fonctions/panierJS.php"); ?>


<?php
// Create connection
$conn = new mysqli($host, $user, $pass, $bdd);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM cd";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["id"]. " - Name: ". $row["titre"]. " " . $row["genre"] ." <img src='./rsc/img/".$row['url_image']."'width='120px'>" . "<br>";
        print("<button onclick=ajoutCdSession(".$row["id"].")>Ajouter au panier</button>");
    }
} else {
    echo "0 results";
}
$conn->close();
    ?>
  
  <?php include("rsc/template/footer.php"); ?>

</body>

</html>