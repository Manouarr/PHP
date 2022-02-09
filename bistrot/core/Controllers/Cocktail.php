<?php
namespace Controllers;

   

class Cocktail extends AbstractController
{

    protected $defaultModelName = \Models\Cocktail::class;


    /**
     * affiche l'accueil des cocktails avec TOUS les cocktails
     */
    public function index()
    {

        

        $cocktails= $this->defaultModel->findAll();

        $pageTitle = "Accueil Cocktails";

        return $this->render("cocktails/index", compact("pageTitle", "cocktails"));




    }

    /**
     * afficher un cocktail et ses commentaires
     */
    public function show()
    {
    
        
        $id = null;

        if( !empty($_GET['id']) && ctype_digit($_GET['id']) ){ $id= $_GET['id']; }

        if(!$id){ 
          
            
           return $this->redirect();
         }

        $cocktail = $this->defaultModel->findById($id);

        if ( !$cocktail ) {  return $this->redirect(); }


        $modelComment = new \Models\Comment();
        $commentaires = $modelComment->findAllByCocktail($cocktail); // 

        $pageTitle = $cocktail->getName();

        $this->render("cocktails/show", compact("pageTitle", "cocktail", "commentaires"));





    }

    /**
     * supprimer un cocktail par son ID et rediriger vers l'index des cocktails
     */
    public function delete():Response
    {

        $id =null;
        if(!empty($_POST['id']) && ctype_digit($_POST['id'])){$id= $_POST['id'];}

        if(!$id){ return $this->redirect([   
                                            "type"=>"cocktail",
                                            "action"=>"index",
                                            "info"=>"noId"
                                            ]);}

       
        $cocktail = $this->defaultModel->findById($id);

        if(!$cocktail) { 
            return $this->redirect();
         }

        $this->defaultModel->remove($cocktail);

        return $this->redirect([   
                                "type"=>"cocktail",
                                "action"=>"index",
                                "info"=>"deleted"
                                 ]);

     
    }

    public function new()
    {
        

        $nom = null;
        $image=null;
        $ingredients=null;

        if(!empty($_POST['nom'])){ $nom = $_POST['nom'] ; }
        if(!empty($_POST['image'])){ $image = $_POST['image'] ; }
        if(!empty($_POST['ingredients'])){ $ingredients = $_POST['ingredients'] ; }

        if( $nom && $image && $ingredients ){

                $cocktail = new \Models\Cocktail();
                $cocktail->setName($nom);
                $cocktail->setImage($image);
                $cocktail->setIngredients($ingredients);


            $this->defaultModel->save($cocktail);

            return $this->redirect([
                                    'type'=>'cocktail',
                                    'action'=>'index'
                                    ]);

        }



        return $this->render("cocktails/create", ["pageTitle"=>'Nouveau cocktail']);
    }

    /**
     * afficher un cocktail dans un formulaire
     */
    public function edit()
    {
        //si on repere le cas d'une demande de soumission
        //alors on prend une autre direction

        $idEdit = null;
        $name = null;
        $image = null;
        $ingredients = null;

        if(!empty($_POST['idEdit']) && ctype_digit($_POST['idEdit'])){ $idEdit =$_POST['idEdit'];}
        if(!empty($_POST['name'])){ $name = $_POST['name'];}
        if(!empty($_POST['image'])){ $image = $_POST['image'];}
        if(!empty($_POST['ingredients'])){ $ingredients = $_POST['ingredients'];}

        if($idEdit && $name && $ingredients && $image){

          //  je suis bien dans le cas de la soumission et donc pas de render

          //je verifie si le cocktail existe bien, sinon tchao
            $cocktail = $this->defaultModel->findById($idEdit);

            if(!$cocktail){return $this->redirect();}


        // ici, je suis sur que le cocktail existe, je passe au traitement de l'update

            $cocktail->setName($name);
            $cocktail->setIngredients($ingredients);
            $cocktail->setImage($image);

            $this->defaultModel->update($cocktail);

            return $this->redirect([
                "type"=>"cocktail",
                "action"=>"show",
                "id"=>$cocktail->getId()
            ]);


        }



        $id = null;
        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){  $id = $_GET['id']; }
        if(!$id){return $this->redirect();}

        $cocktail = $this->defaultModel->findById($id);

        if(!$cocktail){return $this->redirect();}

      
        return $this->render("cocktails/edit", [
                                                    "pageTitle"=>"edition",
                                                    "cocktail"=>$cocktail
                                               ]);
    }

}