<?php
namespace  Controllers;

class Velo extends AbstractController
{

    protected $defaultModelName = \Models\Velo::class ;

    public function index()
    {


        return $this->render("velos/index", [
            "pageTitle" => "accueil velos",
            "velos" => $this->defaultModel->findAll()
        ]);
    }



    public function show(){

        $id=null;
        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){$id = $_GET['id'];}

        if(!$id){return $this->redirect(["type"=>"velo",
                                            "action"=>"index"
        ]);}

        $velo = $this->defaultModel->findById($id);
        if(!$velo){return $this->redirect(["type"=>"velo",
                                            "action"=>"index"
                                            ]);}

        return $this->render("velos/show", [
            "pageTitle"=> $velo->getName(),
            "velo"=>$velo,
           
        ]);



    }

    public function new()
    {
            $userConnecte = $this->getUser();

            if(!$userConnecte){
                $this->redirect([
                    "type"=>"user",
                    "action"=>"signin",
                    "info"=> "veuillez vous connecter pour ajouter un velo"
                ]);
            }


        $name = null;
        $description = null;
        $price = null;

        if(!empty($_POST['name'])){$name = htmlspecialchars( $_POST['name']);}
        if(!empty($_POST['description'])){$description = htmlspecialchars( $_POST['description']);}
        
        if(!empty($_POST['price'])){$price = htmlspecialchars( $_POST['price']);}

        if($name && $description && $price && !empty($_FILES['imageVelo'])){

           
                $file= new \App\File('imageVelo');

                            
        
                    if(!$file->isImage()){
                        return $this->redirect(["type"=>"velo",
                        "action"=>"new"
                            ]);     
                    }

                $file->upload(); 

                $velo = new \Models\Velo();
                
                $velo->setName($name);
                $velo->setDescription($description);
                $velo->setImage($file->getName());
                $velo->setPrice($price);
                $velo->setUserId($userConnecte->getId());


                $this->defaultModel->save($velo);

                return $this->redirect(["type"=>"velo",
                "action"=>"index"
        ]);

        }





        return $this->render("velos/create", ["pageTitle"=> "nouveau velo"]);
    }



    public function delete(){



        $id = null;
        if(!empty($_POST['id']) && ctype_digit($_POST['id'])){$id = $_POST['id'];}
       
        if(!$id){return $this->redirect(["type"=>"velo",
            "action"=>"index"
                ]);}

                $velo = $this->defaultModel->findById($id);
                if($velo){

                    $user=$this->getUser();

                    if(!$user){
                        return $this->redirect([
                            "type"=>"velo",
                            "action"=>"show",
                            "id"=> $velo->getId(),
                            "info"=> "il faut etre connecté pour supprimer un vélo"
                        ]);
                    }




                    if($user != $velo->getAuthor()){

                        return $this->redirect([
                            "type"=>"velo",
                            "action"=>"show",
                            "id"=> $velo->getId(),
                            "info"=> "déso, seul son créateur a le pouvoir de le supprimer"
                        ]);

                    }
                    $this->defaultModel->remove($velo);

                }

                return $this->redirect(["type"=>"velo",
                                        "action"=>"index"
                                            ]);


        
    }

    public function change()
    {
        $veloId = null;
        $name = null;
        $description = null;
        $image = null;
        $price = null;

        if(!empty($_POST['name'])){$name = htmlspecialchars( $_POST['name']);}
        if(!empty($_POST['description'])){$description = htmlspecialchars( $_POST['description']);}
        if(!empty($_POST['image'])){$image = htmlspecialchars( $_POST['image']);}
        if(!empty($_POST['price'])){$price = htmlspecialchars( $_POST['price']);}
        if(!empty($_POST['id']) && ctype_digit($_POST['id'])){$veloId = $_POST['id'];}

        if($name && $description && $image && $price && $veloId){

                $velo = $this->defaultModel->findById($veloId);

                if(!$velo){return $this->redirect(["type"=>"velo",
                    "action"=>"index"
                    ]);}

                $velo->setName($name);
                $velo->setDescription($description);
                $velo->setImage($image);
                $velo->setPrice($price);

                $this->defaultModel->update($velo);

                return $this->redirect(["type"=>"velo",
                "action"=>"index"
        ]);

        }







        $id=null;
        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){$id = $_GET['id'];}

        if(!$id){return $this->redirect(["type"=>"velo",
                                            "action"=>"index"
        ]);}

        $velo = $this->defaultModel->findById($id);
        if(!$velo){return $this->redirect(["type"=>"velo",
            "action"=>"index"
            ]);}


        return $this->render("velos/update", ["pageTitle"=> "Modifier",
                                              "velo"=>$velo
        ]);

    }
}