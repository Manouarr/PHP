<?php

require_once "logique.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thé ou café ?</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>

        body{
            margin:0px;
            padding:0px;
            overflow : hidden;
        }
    </style>

</head>
<body>
        <nav class="navbar navbar-expand navbar-dark bg-success">
            <a href="/hb/theOuCafe" class="navbar-brand">Thé ou Café ?</a>
        
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <form>

                        <input class="btn btn-success" type="submit" value="the" name="boisson">

                    </form>
                </li>
                <li class="nav-item">
                    <a href="http://localhost/hb/theOuCafe/?boisson=cafe" class="nav-link active">Café</a>
                </li>

            <?php if($isLoggedIn){ ?>

                <li class="nav-item">
                    <a href="http://localhost/hb/theOuCafe/?boisson=coca" class="nav-link active">Coca</a>
                  </li>
    
                <form method="post">
                
                    <input name="logOut" type="submit" class="btn btn-danger" value="Log Out">


                </form>

            <?php }else{ ?>

                <li>
                    <form method="post">
                        <input type="text" name="pass" placeholder="mot de passe">
                    <button class="btn btn-primary" type="submit">Go</button>
                </form>
                </li>   

            <?php } ?>
            </ul>

        </nav>

            <div class="row">

                <?=  $pageContent ?>

            </div>






</body>
</html>