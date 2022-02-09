<?php

namespace Models;




class Velo extends AbstractModel
{

    protected string $nomDeLaTable = "velos";



    private $id;

    public function getId(){
            return $this->id;
        }




    
    private $nom;
    
    public function getNom(){
            return $this->nom;
        }

    public function setNom($nom){
            $this->nom = $nom;
        }    






    private $description;
    
    public function getDescription(){
            return $this->description;
        }
    
    public function setDescription($description){
            $this->description = $description;
    }    






    private $image;

    public function getImage(){
            return $this->image;
    }
 
    public function setImage($image){
            $this->image = $image;
    }    






    private $prix;

    public function getPrix(){
        return $this->prix;
    }
    
    public function setPrix($prix){
        $this->prix = $prix;
    }    




        /**
     * ajoute un nouveau vélo dans la BDD
     * @param Velo $velo
     * 
     * @return void
     */
    public function save(Velo $velo):void
    {
            $sql = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable} 
             ( nom, description, image, prix) VALUES (:nom, :description, :image, :prix)
            ");

            $sql->execute([

                'nom'=>$velo->nom,
                'description'=>$velo->description,
                'image'=>$velo->image,
                'prix'=>$velo->prix
            ]);

    }



}

?>