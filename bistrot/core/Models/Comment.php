<?php

namespace Models;


class Comment extends AbstractModel
{

    protected string $nomDeLaTable = "comments";

    protected $id ;
    public function getId(){
        return $this->id;
    }

    



    protected $author ;

    public function getAuthor(){
        return $this->author;
    }

    public function setAuthor($author)
        {
            $this->author = $author;
        }

    protected $content ;

    public function getContent(){
        return $this->content;
    }
    public function setContent($content)
    {
        $this->content = $content;
    }

    protected $cocktail_id;

    public function getCocktailId(){
        return $this->cocktail_id;
    }
    public function setCocktailId($cocktail_id)
    {
        $this->cocktail_id = $cocktail_id;
    }





        /**
         * trouve tous les commentaires associés à un cocktail
         * 
         * @param Cocktail $cocktail
         *
         * @return array|bool 
         * 
         */                                                  
        public function findAllByCocktail(Cocktail $cocktail)
            {

                

                $maRequete = $this->pdo->prepare("SELECT * FROM comments 
                        WHERE cocktail_id = :cocktail_id");

                $maRequete->execute([
                    "cocktail_id" => $cocktail->getId()
                ]);

                $commentaires = $maRequete->fetchAll(\PDO::FETCH_CLASS, get_class($this));

                return $commentaires;
            }




        /**
         * 
         * enregistre un commentaire dans la base de données
         * 
         * @param string $author
         * @param string $content
         * @param integer $cocktailId
         */
        public function save($comment): void
            {

            
                $maRequeteCreation = $this->pdo->prepare("INSERT INTO comments 
            (author, content, cocktail_id ) 
            VALUES(:author, :content, :cocktail_id)");

                $maRequeteCreation->execute([
                    "author" => $comment->author,
                    "content" => $comment->content,
                    "cocktail_id" => $comment->cocktail_id
                ]);
            }





  

}