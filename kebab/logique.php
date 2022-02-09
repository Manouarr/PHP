<?php

require_once "db.php";


$viandes = ["Agneau","Veau","Dinde"];
$sauces = ["Algérienne","Mayonnaise","gruyère"];



//**************************** */



if(
    !empty($_GET['id'])
&&  ctype_digit($_GET['id'])
){
    //afficher un seul kebab par son id



    $id = $_GET['id'];

    $sql = "SELECT * FROM kebabs WHERE id = '$id'";
    $resultat = mysqli_query($maConnexion, $sql); 

    $kebab = $resultat->fetch_assoc();


}else{

    //sinon, je trouve tous les kebabs
    $maRequete = "SELECT * FROM kebabs";

    $kebabs = mysqli_query($maConnexion, $maRequete);
}

?>








