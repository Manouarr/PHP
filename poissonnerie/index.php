<?php 
session_start();
//unset($_SESSION['connected']);
//session_unset();
require_once "authentification.php";
require_once "poissons.php";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Poissonnerie</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/united/bootstrap.min.css">

    <link rel="stylesheet" href="style.css">
</head>
<body>
    


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="/hb/poissonerie">Poisson 2000</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link active" href="#">Shop
                  <span class="visually-hidden">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Poissons</a>
              </li>
              <li>
                <?php if(!$isLoggedIn){?>
                <form action="" method="post">
                    <input type="text" name="username" id="">
                    <input type="password" name="password" id="">
                    <button type="submit" class="btn btn-success">Log in</button>
                   
                      <span style="color:white" ><?= $messageErreur ?></span>
                     <?php }else{?>

                        <span style="color:white;font-weight:bolder">
                     Bonjour <?= $_SESSION['username'] ?> !
                      </span>
                        <form method="post">
                          <button class="btn btn-danger" type="submit" name="logout">Log out</button>
                        </form>
                  <?php } ?>

                </form>
                
              </li>
          
            </ul>

          </div>
        </div>
      </nav>
     
      <div class="row justify-content-center">
      <h1>Tiens voila du poisson</h1></div>


        <div class="container">

        <div class="">
<form method="get" action="index.php" >
  <button type="submit" name="type" value="mer" class="btn btn-primary">eau de mer</button>
</form>
<form><button type="submit" name="type" value="douce" class="btn btn-success">eau douce</button></form>
          
          
          <a href="/hb/poissonerie" class="btn btn-secondary">tous les poissons</a>

        </div>

            <div class="row justify-content-center">

            


                <?php echo $contenuDeLaPage ?>





            </div>





        </div>
      

      


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>