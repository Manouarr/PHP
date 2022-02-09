<h2></h2>


<h2></h2>



<form action="?type=cocktail&action=edit" method="post">

<div class="form-group"><input type="text" name="name" value="<?= $cocktail->name() ?>"></div>

<div class="form-group"><input type="text" name="image" value="<?= $cocktail->image() ?>"></div>

<div class="form-group"><input type="text" name="ingredients" value="<?= $cocktail->ingredients() ?>"></div>

<div class="form-group">
    <button type="submit"name="idEdit" value="<?= $cocktail->id() ?>" class="btn btn-success">Enregistrer les modifs</button>
</div>


</form>