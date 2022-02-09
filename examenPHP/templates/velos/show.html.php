<div class="d-flex align-center" style="margin-top: -25px;">


<div class="card border-success mb-3 text-center m-lg-5" style="max-width: 20rem;">

    <div class="card-header"> <?= $velo->getNom() ?></div>
    

                <h3 class="mt-2"><?= $velo->getPrix() ?>€</h3>


                <img class="mt-3" style=" height: 180px;" src="images/<?= $velo->getImage() ?>" alt="photo d'un single">


    <div class="card-body">

        
        <p class="card-text"> <?= $velo->getDescription() ?></p>

        <form action="?type=velo&action=delete" method="post">

                <button class="btn btn-danger" type="submit" name="id" value="<?= $velo->getId() ?>">Supprimer</button>

        </form>
    </div>

       
    


</div>



<?php foreach($commentaires as $commentaire) { ?>



<div class="card text-white bg-success mb-3" style="max-width: 20rem; max-height: 250px; margin-top: 100px;">

    <div class="card-header"><?= $commentaire->getAuteur() ?></div>

    <div class="card-body">
    <p class="card-text"><?= $commentaire->getContenu() ?></p>
    </div>

        <form action="?type=comment&action=delete" method="post">
                <button type="submit" class="btn btn-light" name="id" value="<?= $commentaire->getId()?>">Supprimer</button>
        </form>



<?php } ?>


<?php if(!$commentaires){?>

   <h2 class="mt-3">Soyez le premier à commenter le <?= $velo->getNom() ?> !</h2>

<?php } ?>

</div>

<br>

<h1>Laissez un commentaire a ce produit :</h1>

<br>

<form class="ms-5" action="?type=comment&action=new" method="post">
    <input placeholder="Nom"  type="text" name="auteur" id="">
    <textarea placeholder="Votre commentaire" type="text" name="contenu" id=""></textarea>
    <button name='veloId' value="<?= $velo->getId()?>" class="btn btn-success">Poster</button>
</form>
