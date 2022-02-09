<?php
namespace Controllers;

   

class Velo extends AbstractController
{

    protected $defaultModelName = \Models\Velo::class;


    /**
     * affiche l'accueil des vélos avec TOUS les vélos
     */
    public function index()
    {

        

        $velos= $this->defaultModel->findAll();

        $pageTitle = "Accueil vélos";

        return $this->render("velos/index", compact("pageTitle", "velos"));

    }





    /**
     * afficher un velo et les commentaires
     */
    public function show()
    {
    
        
        $id = null;

        if( !empty($_GET['id']) && ctype_digit($_GET['id']) ){ $id= $_GET['id']; }

        if(!$id){ 
          
            
           return $this->redirect();
         }

        $velo = $this->defaultModel->findById($id);

        if ( !$velo ) {  return $this->redirect(); }


        $modelComment = new \Models\Comment();
        $commentaires = $modelComment->findAllByVelo($velo);


        $pageTitle = $velo->getNom();

        $this->render("velos/show", compact("pageTitle", "velo", "commentaires"));





    }


    /**
     * supprimer un vélo par son ID et rediriger vers l'index des vélos
     */
    public function delete():Response
    {

        $id =null;
        if(!empty($_POST['id']) && ctype_digit($_POST['id'])){$id= $_POST['id'];}

        if(!$id){ return $this->redirect([   
                                            "type"=>"velo",
                                            "action"=>"index",
                                            "info"=>"noId"
                                            ]);}

       
        $velo = $this->defaultModel->findById($id);

        if(!$velo) { 
            return $this->redirect();
         }

        $this->defaultModel->remove($velo);

        return $this->redirect([   
                                "type"=>"velo",
                                "action"=>"index",
                                "info"=>"deleted"
                                 ]);

     
    }




    /**
     * Récupère les valeurs saisies grâce aux inputs pour créer un nouvelle classe Single afin de la passer à la fonction save
     */
    public function new()
    {
        
        
        $nom = null;
        $description = null;
        $image = null;
        $prix =null;
        



        if(!empty($_POST['nom'])){ $nom = $_POST['nom'] ; }
        if(!empty($_POST['description'])){ $description = $_POST['description'] ; }
        if(!empty($_POST['image'])){ $image = $_POST['image'] ; }
        if(!empty($_POST['prix'])){ $prix = $_POST['prix'] ; }

        if( $nom && $description && $image && $prix ){

                $velo = new \Models\Velo();
                $velo->setNom($nom);
                $velo->setDescription($description);
                $velo->setImage($image);
                $velo->setPrix($prix);


            $this->defaultModel->save($velo);

            return $this->redirect([
                                    'type'=>'velo',
                                    'action'=>'index'
                                    ]);

        }

        return $this->render("velos/create", ["pageTitle"=>'Nouveau vélo']);


    }
}
?>