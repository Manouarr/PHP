<?php

//$motClair = "pissenlit";
echo "<hr>";
//echo $motClair;
echo "<hr>";
echo "<hr>";

$vraiMotDePasseCrypte = "b8e6e401868dfcdfec60ad9ec71a3df3";

$motDePassEntre = "passenlit";

//trouver un moyen de verifier que le mot de passe entré
//est correct ou non

if (md5($motDePassEntre) === $vraiMotDePasseCrypte){
    echo "ok";
} else {
    echo "ERREUR";
}

?>