<?php

namespace Models;

class User extends AbstractModel
{
    protected string $nomDeLaTable = "users";

        private $id;
        private $username;
        private $password;
        private $email;
        private $display_name;


/**
 * @return mixed
 */
    public function getId()
{
    return $this->id;
}
/**
 * @return mixed
 */public function getUsername()
{
    return $this->username;
}/**
 * @param mixed $username
 */public function setUsername($username): void
{
    $this->username = $username;
}/**
 * @return mixed
 */public function getPassword()
{
    return $this->password;
}/**
 * @param mixed $password
 */public function setPassword($password): void
{
    $this->password = password_hash($password, PASSWORD_DEFAULT);
}


/**
 * @return mixed
 */public function getEmail()
{
    return $this->email;
}/**
 * @param mixed $email
 */public function setEmail($email): void
{
    $this->email = $email;
}/**
 * @return mixed
 */public function getDisplayName()
{
    return $this->display_name;
}

/**
 * @param mixed $display_name
 */public function setDisplayName($display_name): void
{
    $this->display_name = $display_name;
}

    /**
     * @param string $username
     * @return User | boolean
     *
     */
public function findByUsername(string $username)
{
    $sql = $this->pdo->prepare("SELECT * FROM {$this->nomDeLaTable}
                                    WHERE username = :username"
    );

    $sql->execute([
        "username"=>$username
    ]);
    $sql->setFetchMode(\PDO::FETCH_CLASS, get_class($this));
    return $sql->fetch();
}

    /**
     * @param User $user
     * @return void
     */
public function register(User $user)
{
    $sql = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable}
        (username, password, display_name, email) VALUES (:username, :password, :display_name, :email)  
    ");
    $sql->execute([
        "username"=>$user->username,
        "password"=>$user->password,
        "email"=>$user->email,
        "display_name"=>$user->display_name
    ]);
}

public function logIn(string $password){

    $result = false;

    if(password_verify($password, $this->password)){

        $result = true;

        $_SESSION['user']= [
            "id"=>$this->id,
            "username"=>$this->username,
            "displayName"=>$this->display_name
        ];
    }

    return $result;
}

public function logOut()
{
    session_unset();
}

    /**
     * @return User|bool
     */
public static function getUser()
{
       if( !isset($_SESSION['user'])){
        return false;
       }else{
           $modelUser = new \Models\User();
         return  $modelUser->findById($_SESSION['user']['id']);
       }
}











}