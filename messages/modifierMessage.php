<?php

require_once "db.php";

if(
    isset($_POST['newMessage'])
    && !empty($_POST['newMessage'])
    && isset($_POST['numero'])
    && !empty($_POST['numero'])
    
    ){

        $id = $_POST['numero'];

        $id = htmlspecialchars($id);

        $description = $_POST['newMessage'];

        $description = htmlspecialchars($description);
    
        $update = "UPDATE messages SET description ='$description' where id = '$id'";
    
        $resultatDeMaRequete = mysqli_query($maConnection, $update);
    
        header("Location: message.php?id=$id");
    
    }


?>