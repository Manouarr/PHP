<?php

session_start();

if(isset($_GET['boisson']) ){


    if($_GET['boisson'] == 'cafe'){

        require_once "cafe.php";

    }elseif($_GET['boisson'] == 'coca'){

        require_once "coca.php";

    }else{

    require_once "the.php";


    }
 

}else{

require_once "question.php";

}

$motDePasse = "petanque";

$isLoggedIn = false;

if( isset($_POST['logOut'])){
    
    unset($_SESSION['isLoggedIn']);
}
if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']){

    $isLoggedIn = true;
}


if (  isset($_POST['pass'])  && $_POST['pass'] == $motDePasse  ) {
    $isLoggedIn = true ;
    $_SESSION['isLoggedIn'] = true;

}






?>