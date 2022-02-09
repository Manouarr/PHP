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


      

        $comment = $this->defaultModel->findById($id);



        if (!$comment) {

            return $this->redirect([   
                                    "type"=>"cocktail",
                                    "action"=>"index",
                                    "info"=>"noId"
                                    ]);
        }


        $this->defaultModel->remove($comment);

       return $this->redirect([
        "type"=> "cocktail",
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


        $cocktailId = null;
        $author = null;
        $content = null;

        if (!empty($_POST['cocktailId']) && ctype_digit($_POST['cocktailId'])) {

            $cocktailId = $_POST['cocktailId'];
        }
        if (!empty($_POST['author'])) {

            $author = htmlspecialchars($_POST['author']);
        }

        if (!empty($_POST['content'])) {

            $content = htmlspecialchars($_POST['content']);
        }



        if (!$cocktailId || !$content || !$author) {

            return $this->redirect([
                                    "type"=>"cocktail",
                                    "action"=>"show",
                                    "id"=> $cocktailId
                                ]);
}


        // on vérifie si le cocktail existe bien avant de le commenter

        $modelCocktail = new \Models\Cocktail();

        $cocktail = $modelCocktail->findById($cocktailId);



        if (!$cocktail) {
            return $this->redirect([
                "type"=>"cocktail",
                "action"=>"index",
                "info"=>"noId"
            ]);
        }

            $comment = new \Models\Comment();
            $comment->setAuthor($author);
            $comment->setContent($content);
            $comment->setCocktailId($cocktailId);
                                    

        $this->defaultModel->save($comment);



        return $this->redirect([
                                "type"=>"cocktail",
                                "action"=>"show",
                                "id"=> $comment->getCocktailId()
                            ]);
    
    }
}