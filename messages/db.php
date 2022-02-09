<?php
   $hote = "localhost";
   $username = "messageadmin";
   $password = "coucou";
   $db = "messageboard";

    $maConnection = mysqli_connect($hote, $username, $password, $db); 

    if(!$maConnection){
        echo "PROBLEME DE CONNEXION";
    }


    ?>