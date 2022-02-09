<?php
namespace Models;




class Cocktail extends AbstractModel
{

    protected string $nomDeLaTable = "cocktails";

    private $id;

    public function getId(){
        return $this->id;
    }


    private $ingredients;

    public function getIngredients(){
        return $this->ingredients;
    }
    public function setIngredients($ingredients){
        $this->ingredients = $ingredients;
    }
    
    
    private $name;
    
    public function getName(){
            return $this->name;
        }

    public function setName($name){
        $this->name = $name;
    }



    private $image;

    public function getImage(){
        return $this->image;
    }
    
    public function setImage($image){
        $this->image = $image;
    }

    
 
    

    /**
     * ajoute un nouveau cocktail dans la BDD
     * @param Cocktail $cocktail
     * 
     * @return void
     */
    public function save(Cocktail $cocktail):void
    {
            $sql = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable} 
             (name, image, ingredients) VALUES (:nom, :image, :ingredients)
            ");

            $sql->execute([
                'nom'=>$cocktail->name,
                'image'=>$cocktail->image,
                'ingredients'=>$cocktail->ingredients
            ]);

    }
    
    /**
     * édite un cocktail via son ID
     * @param string $name
     * @param string $ingredients
     * @param string $image
     * @param string $id
     */
    public function update($id , $name , $ingredients , $image)
    {

        $sql = $this->pdo->prepare(
            "UPDATE {$this->nomDeLaTable}
            SET name = :name , image = :image , ingredients = :ingredients
            WHERE id = :id"
        );

        $sql->execute([
            "name"=>$name,
            "image"=>$image,
            "ingredients"=>$ingredients,
            "id"=>$id
        ]);


    }
}



?>