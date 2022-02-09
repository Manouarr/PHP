<div class="text-center mt-2" >

<a href="?type=velo&action=new" type="button" class="btn btn-danger">Créer un vélo</a>

</div>

<div class="row d-flex align-center" style="margin-top: -25px;">



<?php foreach ($velos as $velo) { ?>

    


<div class="card border-success mb-3 text-center m-lg-5" style="max-width: 20rem;">

    <div class="card-header"> <?= $velo->getNom() ?></div>
    

                <h3 class="mt-2"><?= $velo->getPrix() ?>€</h3>


                <img class="mt-3" style=" height: 180px;" src="images/<?= $velo->getImage() ?>" alt="photo d'un single">


    <div class="card-body">

        
        <p class="card-text"> <?= $velo->getDescription() ?></p>

        <a href="?type=velo&action=show&id=<?= $velo->getId() ?>" style="width: 100px; color: black;" type="button" class="btn btn-light">Voir</a>

    </div>

       
    
    
</div>


<?php } ?>



