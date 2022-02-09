<?php
$users = [
    [
        "username" => "patrick",
        "password" => "07deeb9a62b32d60b193df8503486f40"
    ],
    [
        "username" => "pascale",
        "password" => "rouquin"
    ],
    [
        "username" => "bobby",
        "password" => "tentacule"
    ],
  
  ];  
  $salt = "poivre";
  $isLoggedIn = false;

    if(isset($_POST['logout'])){
        unset($_SESSION['connected']);
        unset($_SESSION['username']);     
    }

    
    if(
        isset($_SESSION['connected']) && $_SESSION['connected']
    ){
        $isLoggedIn = true;
    }



  $messageErreur = "";
  
  $utilisateurInconnu = "Utilisateur Inconnu";
  $mdpErrone = "mot de passe érroné";
  $champsVides= "veuillez renseigner tous les champs";
  
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
  
                                               
                                if($motDePasse == md5($_POST['password'].md5($salt)) ) {
  
                                       $isLoggedIn = true;
                                       $_SESSION['connected'] = true;
                                       $_SESSION['username'] = $_POST['username'];
  
                                }  else {
  
                                   $messageErreur = $mdpErrone;
                                }
  
  
                   }else{
  
                       $messageErreur = $utilisateurInconnu;
                   }
   
   
   
   
  
  }else{
  
       $messageErreur = $champsVides;
  }
  
  


?>