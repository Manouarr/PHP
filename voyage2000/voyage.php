<?php
    require_once "logique.php";

   // var_dump($voyages);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voyage2000</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-warning mb-5">
    <a href="index.php" class="navbar-brand">Voyage2000</a>
    <ul class="navbar-nav me-auto">

        <li class="nav-item">
        <?php if($isLoggedIn){ ?>
                
            <form method="post">
                <button type="submit" name="logOut" class="btn btn-warning">Déco</button>
            </form>

                <?php }else{ ?>
                <form method="post">
                    <input type="text" name="user" placeholder="utilisateur">
                    <input type="text" name="password" id="" placeholder="Mot de passe">
                    <input class="btn btn-success" type="submit" value="Go">
                </form>
                <?php } ?>
            </li>

           

    </ul>
    
</nav>
<h1>Page individuelle</h1>

    <?php
        $voyage;

        if(isset($_GET['destination'])){

                foreach($voyages as $unVoyage)

                    if($unVoyage['destination'] == $_GET['destination']){

                        $voyage = $unVoyage;

                    }

        }

        


    
    ?>


    <div style="background-image:url('images/<?= $voyage['image'] ?>')" class="destination row m-5 flex-direction-column align-items-center justify-content-center">

            <h1><?= $voyage['destination'] ?></h1>
            <h2 style="color:red"><?php if($isLoggedIn){ echo $voyage['prix']*0.8; }else{echo $voyage['prix'];} ?> €</h2>
            <h3><?= $voyage['duree'] ?> Jours</h3>
            <h3>Pour <?= $voyage['personnes'] ?> voyageurs</h3>
            <h3>Transport : <?= $voyage['transport'] ?> </h3>

    </div>



</body>
</html>,
