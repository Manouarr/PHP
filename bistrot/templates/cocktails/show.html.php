

<h1><?= $cocktail->getName() ?></h1>


<p><strong>Ingredients : </strong><?= $cocktail->getIngredients() ?></p>

<img src="images/<?= $cocktail->getImage() ?>" alt=""><hr>

<a class="btn btn-warning" href="?type=cocktail&action=edit&id=<?=$cocktail->getId() ?>">Modifier</a>

<form action="?type=cocktail&action=delete" method="post">
    <button class="btn btn-danger" type="submit" name="id" value="<?= $cocktail->getId() ?>">Supprimer</button>
</form>


<form class="ms-5" action="?type=comment&action=new" method="post">
    <div class="form-group"><input placeholder="Votre nom"  type="text" name="author" id=""></div>
    <div class="form-group"><textarea placeholder="Votre commentaire" type="text" name="content" id=""></textarea></div>
    <div class="form-group"><button name='cocktailId' value="<?= $cocktail->getId()?>" class="btn btn-success">Poster</button></div>
</form>



<?php foreach($commentaires as $commentaire) : ?>
            <div class="row bg-success mt-2 mb-2">

                <h3>
                    <p><strong><?= $commentaire->getAuthor() ?></strong></p>
                </h3>
                <p class="ms-5" ><?= $commentaire->getContent() ?></p>

            <form action="?type=comment&action=delete" method="post">
                <button type="submit" class="btn btn-danger" name="id" value="<?= $commentaire->getId()?>">Supprimer</button>
            </form>
            </div>
<?php endforeach ?>

<?php if(!$commentaires){?>
   <h2>Soyez le premier à commenter le <?= $cocktail->getName() ?>  !!</h2>
<?php } ?>