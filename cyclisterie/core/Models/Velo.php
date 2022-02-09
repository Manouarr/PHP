<?php

namespace Models;

class Velo extends AbstractModel
{

    protected string $nomDeLaTable = "velos";

    protected $id;
    protected $name;
    protected $description;
    protected $image;
    protected $price;
    protected $user_id;




    public function getId()
    {
        return $this->id ;
    }
    
    public function getName()
    {
        return $this->name ;
    }

    public function setName($name){
        $this->name = $name;
    }
    public function getDescription()
    {
        return $this->description ;
    }

    public function setDescription($description){
        $this->description = $description;
    }
    public function getImage()
    {
        return $this->image ;
    }

    public function setImage($image){
        $this->image = $image;
    }
    public function getPrice()
    {
        return $this->price ;
    }

    public function setPrice($price){
        $this->price = $price;
    }


    public function save(Velo $velo)
    {
        $sql = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable}
                (name, description, image, price, user_id) VALUES (:name, :description, :image, :price, :user_id)
        ");
        $sql->execute([
            "name"=>$velo->name ,
            "description"=>$velo->description ,
            "image"=>$velo->image ,
            "price"=>$velo->price,
            "user_id"=>$velo->user_id,
        ]);


    }

    public function update(Velo $velo){

        $sql = $this->pdo->prepare("UPDATE {$this->nomDeLaTable}
            SET name = :name , description = :description ,
             image = :image , price = :price 
            WHERE id = :id
        ");

        $sql->execute([
            "name"=>$velo->name,
            "description"=>$velo->description,
            "image"=>$velo->image,
            "price"=>$velo->price,
            "id"=>$velo->id
        ]);

    }

    public function getAvis(){

        $modelAvis = new \Models\Avis();
        return $modelAvis->findAllByVelo($this);
    }

    /**
     * @return User
     */
    public function getAuthor():User
    {
        $modelUser = new \Models\User();
       return $modelUser->findById($this->user_id);

    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }




}