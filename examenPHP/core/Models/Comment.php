<?php

namespace Models;


class Comment extends AbstractModel
{

    protected string $nomDeLaTable = "commentaires";

    protected $id ;
    public function getId(){
        return $this->id;
    }

    



    protected $auteur ;

    public function getAuteur(){
        return $this->auteur;
    }

    public function setAuteur($auteur)
        {
            $this->auteur = $auteur;
        }

    protected $contenu ;

    public function getContenu(){
        return $this->contenu;
    }
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    protected $velo_id;

    public function getVeloId(){
        return $this->velo_id;
    }
    public function setVeloId($velo_id)
    {
        $this->velo_id = $velo_id;
    }



        /**
         * trouve tous les commentaires associés à un cocktail
         * 
         * @param Velo $velo
         *
         * @return array|bool 
         * 
         */                                                  
        public function findAllByVelo(Velo $velo)
            {

                

                $maRequete = $this->pdo->prepare("SELECT * FROM commentaires 
                        WHERE velo_id = :velo_id");

                $maRequete->execute([
                    "velo_id" => $velo->getId()
                ]);

                $commentaires = $maRequete->fetchAll(\PDO::FETCH_CLASS, get_class($this));

                return $commentaires;
            }



            /**
         * 
         * enregistre un commentaire dans la base de données
         * 
         * @param string $auteur
         * @param string $contenu
         * @param integer $veloId
         */
        public function save($comment): void
        {

        
            $maRequeteCreation = $this->pdo->prepare("INSERT INTO commentaires 
        (auteur, contenu, velo_id ) 
        VALUES(:auteur, :contenu, :velo_id)");

            $maRequeteCreation->execute([
                "auteur" => $comment->auteur,
                "contenu" => $comment->contenu,
                "velo_id" => $comment->velo_id
            ]);
        }


        }