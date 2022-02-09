<?php 

$hote = "localhost";
$username = "karimhalkoum";
$password = "beyonce";
$db = "karimkebab";

$maConnexion = mysqli_connect($hote, $username, $password, $db);

if (!$maConnexion) {
    
    echo "PROBLEME D'AUTHENTIFICATION";
}

?>
