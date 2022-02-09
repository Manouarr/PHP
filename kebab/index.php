<?php 

require_once "logique.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/journal/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    


</head>

<body>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Karim KEBAB</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">

        <a href="creerKebab.php" type="button" class="btn btn-dark">Creer une recette</a>

        </li>
        
      </ul>
      <form class="d-flex">
        <input class="form-control me-sm-2" type="text" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<main> 





    
    <?php foreach( $kebabs as $kebab){ ?>

        <div class="card text-white bg-info mb-3 mt-5 ml-5" style="max-width: 18rem;">
        <div class="card-header">Kebab  <?= $kebab['garniture'] ?> </div>
        
        <h5 class="card-title cardViande">viande : <?= $viandes[$kebab['viande']-1] ?> </h5>
        <hr>
        <h5 class="card-title">Sauce : <?= $sauces[$kebab['sauce']-1] ?> </h5>
        <hr>
        <h5 class="card-title">Difficulté :  
      

        <div class="row">

        <?php for ($i=0; $i<5 ; $i++){ ?>

        <div class="cercle<?php if($kebab['difficulte']>$i){ echo " plein";} ?>"></div>

        <?php } ?>

        </div>

        </h5>

        <a href="kebab.php?id=<?=$kebab['id']?>" type="button" class="btn btn-light">Voir</a>
        
        <a href="" type="button class="btn btn-primary"></a>
        

        </div>
        </div>
    <?php } ?>

  




</main>

</body>

</html>