<?php

namespace Controllers;

class User extends AbstractController
{
    protected $defaultModelName = \Models\User::class;


public function signUp(){

    $username = null;
    $password = null;
    $email = null;
    $displayName = null;

    if(!empty($_POST['username'])){$username = htmlspecialchars($_POST['username']);}
    if(!empty($_POST['password'])){$password = htmlspecialchars($_POST['password']);}
    if(!empty($_POST['email'])){$email = htmlspecialchars($_POST['email']);}
    if(!empty($_POST['displayName'])){$displayName = htmlspecialchars($_POST['displayName']);}

    if($username && $password && $email && $displayName )
    {



        //on vérifie que le username n'est pas déja utilisé

        if($this->defaultModel->findByUsername($username)){


            return $this->redirect(["type"=>"user",
                                    "action"=>"signup",
                                    "info"=>"ce username est deja utilisé déso"
                                    ]);
        }

        //on passe à la création de l'user maintenant qu'on est sur que le username est libre

        //création d'un nouvel objet user, et assignation des ses valeurs
        //d'apres celles recueillies dans le formulaire

        $nouvelUser = new \Models\User();
        $nouvelUser->setUsername($username);
        $nouvelUser->setPassword($password);
        $nouvelUser->setEmail($email);
        $nouvelUser->setDisplayName($displayName);


        $this->defaultModel->register($nouvelUser);





    }



    return $this->render("users/signup", [
        "pageTitle"=>"Création de compte"
    ]);
}

public function signIn(){

    $username = null;
    $password = null;

    if(!empty($_POST['username'])){$username = htmlspecialchars($_POST['username']);}
    if(!empty($_POST['password'])){$password = htmlspecialchars($_POST['password']);}

            if($username && $password){

                $userLoggingIn = $this->defaultModel->findByUsername($username);
                if(!$userLoggingIn){


                    return $this->redirect(["type"=>"user",
                        "action"=>"signin",
                        "info"=>"déso {$username} je te connais pas"
                    ]);
                }

               if(!$userLoggingIn->logIn($password)){
                           return $this->redirect(["type"=>"user",
                               "action"=>"signin",
                               "info"=>"déso {$username} mauvais mot de passe"
                           ]);
                   ;}

                return $this->redirect(["type"=>"home",
                    "action"=>"index",
                    "info"=>"Bienvenue {$userLoggingIn->getDisplayName()}"
                ]);



            }



    return $this->render("users/signin", ["pageTitle"=>"Connexion"]);
}

public function signOut()
{
    $this->defaultModel->logOut();

    return $this->redirect(["type"=>"home", "action"=>"index", "info"=>"vous etes déconnecté"]);
}


}