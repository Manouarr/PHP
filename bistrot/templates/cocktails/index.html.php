<?php foreach($cocktails as $cocktail){ ?>




    
<div class="row mt-3 mb-3 bg-warning justify-content-center">

    <h2><?= $cocktail->getName() ?></h2>
    <img src="images/<?= $cocktail->getImage() ?>" style="max-width:200px" alt="">
    <h3><strong>Ingrédients :</strong></h3>
    <p><?= $cocktail->getIngredients() ?></p>

   
    <a href="?type=cocktail&action=show&id=<?= $cocktail->getId() ?>" class="btn btn-primary">Voir</a>
   
        </a>

  

</div>

<?php } ?>