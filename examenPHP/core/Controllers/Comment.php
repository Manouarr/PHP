<?php
namespace Controllers;



class Comment extends AbstractController
{


    
    protected $defaultModelName = \Models\Comment::class;
   


    /**
     * supprime un commentaire par son ID
     * @return Response
     * 
     * 
     */
    public function delete():Response
    {

        $id =null;

        if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
            $id = $_POST['id'];
        }

        if (!$id) {
            die("Erreur sur l'ID. Pars .");
        }
        //verifier que le commentaire existe


      

        $commentaire = $this->defaultModel->findById($id);



        if (!$commentaire) {

            return $this->redirect([   
                                    "type"=>"velo",
                                    "action"=>"index",
                                    "info"=>"noId"
                                    ]);
        }


        $this->defaultModel->remove($commentaire);

       return $this->redirect([
        "type"=> "velo",
        "action"=> "index"
    ]);

    }




        
    
    /**
     * crée un nouveau commentaire
     * 
     * @return Response
     */
    public function new():Response
    {


        
        $auteur = null;
        $contenu = null;
        $veloId = null;


        if (!empty($_POST['veloId']) && ctype_digit($_POST['veloId'])) {

            $veloId = $_POST['veloId'];
        }
        if (!empty($_POST['auteur'])) {

            $auteur = htmlspecialchars($_POST['auteur']);
        }

        if (!empty($_POST['contenu'])) {

            $contenu = htmlspecialchars($_POST['contenu']);
        }



        if (!$veloId || !$contenu || !$auteur) {

            return $this->redirect([
                                    "type"=>"velo",
                                    "action"=>"show",
                                    "id"=> $veloId
                                ]);
}


        // on vérifie si le vélo existe bien avant de le commenter

        $modelVelo = new \Models\Velo();

        $velo = $modelVelo->findById($veloId);



        if (!$velo) {
            return $this->redirect([
                "type"=>"velo",
                "action"=>"index",
                "info"=>"noId"
            ]);
        }

            $comment = new \Models\Comment();
            $comment->setAuteur($auteur);
            $comment->setContenu($contenu);
            $comment->setVeloId($veloId);
                                    

        $this->defaultModel->save($comment);



        return $this->redirect([
                                "type"=>"velo",
                                "action"=>"show",
                                "id"=> $comment->getVeloId()
                            ]);
    
    }
}



