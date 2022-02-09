<?php

session_start();
$voyages = [

    [
        "destination"=> "Canada",
        "prix"=> 3455,
        "duree"=> 19,
        "image"=> "canada.png",
        "personnes"=> 2,
        "transport"=>"avion"

    ],
    [
        "destination"=> "Mexique",
        "prix"=> 2355,
        "duree"=> 25,
        "image"=> "mexique.png",
        "personnes"=> 3,
        "transport"=>"avion"

    ],
    [
        "destination"=> "Espagne",
        "prix"=> 254,
        "duree"=> 10,
        "image"=> "espagne.png",
        "personnes"=> 1,
        "transport"=>"bus"

    ],
  

];

$utilisateurs = [

    [
        "id" => 1,
        "username"=> "patricia",
        "password"=> "ladatedenaissancedepatricia"

    ],
    [
        "id" => 2,
        "username"=> "luc",
        "password"=> "paindemie"

    ],

];

$isLoggedIn = false;

if(isset($_POST['logOut'])){
    unset($_SESSION['id']);
}


if(isset($_SESSION['id'])){
    $isLoggedIn = true;
}

if(
   ( isset($_POST['user']) &&  !empty($_POST['user'])  )
&&
( isset($_POST['password']) &&  !empty($_POST['password'])  )

){

    foreach($utilisateurs as $utilisateur){

        if(    
            $_POST['user'] == $utilisateur['username']
            &&
            $_POST['password'] == $utilisateur['password']
        ){

                $isLoggedIn = true;
                $_SESSION['id'] = $utilisateur['id'];
        }

    }
    

}



?>