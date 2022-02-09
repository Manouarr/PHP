<?php 
require_once "logique.php";
//var_dump($messages);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/sketchy/bootstrap.min.css">

</head>
<body>
  <nav class="navbar navbar-expand-lg mb-5">
      <a href="index.php" class="navbar-brand">Message Board</a>
</nav>

    <div class="container">

    <form action="createMessage.php" method="post">
    <div class="d-flex flex-column align-items-center justify-content-center">

        <input type="text" name="auteur" placeholder="Votre nom">
        <textarea name="description" cols="25" rows="3" placeholder="Votre Message"></textarea>
        <button type="submit" class="btn btn-success">Poster</button>


    </div>

    </form>


    </div>

<div class="container">


        <hr>
            <h3 style="color:teal"><?= $message['auteur'] ?> :</h3>

            <?php if ($modeEdition){?>

                <form action="modifierMessage.php" method="post">
                    
                    <textarea name="newMessage" value="" cols="30" rows="10">
                        <?= $message['description'] ?>
                    </textarea>
                <button name="numero" value="<?= $message['id']?>" class="btn btn-success">Enregistrer les modifications</button>
                </form>

            <?php }else { ?>  

            <p><?= $message['description'] ?></p>

            <?php } ?>


            <form action="deleteMessage.php" method="post">
                <button type="submit" class="btn btn-danger"
                name="delete" value="<?= $message['id']?>"
                >
                    <strong>X</strong>
                </button>

                <a href="message.php?id=<?= $message['id']?>&edition" class="btn btn-info">Modifier</a>
            </form>
        <hr>
    
</div>


</body>
</html>