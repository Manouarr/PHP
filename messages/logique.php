<?php
 
    // CONNECTION DB

require_once "db.php";

if(
    isset($_GET['id'])
&& !empty($_GET['id'])

){

    $modeEdition = false;
    if( isset($_GET['edition'])) {
        $modeEdition = true; 
}


    $id = htmlspecialchars($_GET['id']);

    $sql = "SELECT messages.id, messages.auteur, messages.description FROM messages WHERE id = '$id'";

        $resultat = mysqli_query($maConnection, $sql);
        $message = $resultat->fetch_assoc();


}else {

        $maRequete = "SELECT * FROM messages";

        $messages = mysqli_query($maConnection, $maRequete);

}