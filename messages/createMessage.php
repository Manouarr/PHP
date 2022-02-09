<?php
require_once "db.php";
//recupérer les données entrées dans le formulaire (le message)
//echo "bienvenue sur cette autre page";

if(
isset($_POST['auteur'])
&& !empty($_POST['auteur'])
&& isset($_POST['description'])
&& !empty($_POST['description'])
){
   $auteur = $_POST['auteur'];
   $description = $_POST['description'];

  /*  echo($auteur);
   echo($description); */



    $requete = "INSERT INTO messages(auteur, description) VALUES ('$auteur', '$description')";

    $resultatDeMaRequete = mysqli_query($maConnection, $requete);

    header("Location: index.php");

}




//$_POST

//se connecter à la base de données

//insérer le nouveau message dans la base de données

// retourner automatiquement sur index

// methode header()

?>