<?php 

require_once "db.php";

if(
    isset($_POST['supprimer'])
    && !empty($_POST['supprimer'])
    
    ){
      
        $id = $_POST['supprimer'];

        $id = htmlspecialchars($id);

        $delete = "DELETE FROM messages WHERE id = $id";
    
        $resultatDeMaRequete = mysqli_query($maConnection, $delete);
    
        header("Location: index.php");
    
    }

?>