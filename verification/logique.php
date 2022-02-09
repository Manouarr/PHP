<?php 

// *************************** TABLEAU ************************

$users = [
[
    "username" => "beyonce",
    "password" => "79baec642ff95ca1299e18cf0dcf56f6"
],
[
    "username" => "drake",
    "password" => "1ad1e5c1f4d03c4e70b7a5d95b7dc0eb"
],
[
    "username" => "bryson",
    "password" => "21375122402a2c834e3fb89bc94f05fe"
]
];

// *************************** VARIABLES ************************


$utilisateurInconnu = "Utilisateur Inconnu";
$mdpErrone = "mot de passe érroné";
$champsVides= "veuillez renseigner tous les champs";
$messageErreur = "";
$modeFormulaire = true;
$userName = "";
$password = "";



// *************************** BOUCLES ************************

$salt = md5("pollution");

$cryptageDefinitif = md5("presents".$salt);



if(

    ( isset($_POST['username']) && isset($_POST['password'])  )

    &&

    ( !empty($_POST['username']) && !empty($_POST['password'])  )

 ){
               // VERIFICATION SUIVANTE : est-ce que l'utilisateur existe ?                
                   
                   $userExists = false;
                   $motDePasse;

                   foreach($users as $user){

                       if($_POST['username'] == $user['username']) {

                           // cet utilisateur existe
                           $userExists = true;
                           $motDePasse = $user['password'];
                       }

                   }

                   if($userExists){

                                               //VERIFICATION SUIVANTE Est-ce le mot de passe est le bon ?

                                              
                                if($motDePasse == $_POST['password']) {

                                       $modeFormulaire = false;

                                }  else {

                                   $messageErreur = $mdpErrone;
                                }

                   }else{

                       $messageErreur = $utilisateurInconnu;
                   }
   
  }else{

       $messageErreur = $champsVides;
  }

  //**************** CRYPTAGE****************** */




?>