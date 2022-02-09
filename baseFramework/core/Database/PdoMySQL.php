<?php
namespace Database;

class PdoMySQL 
{


    /**
    * Retourne un objet PDO pour intéragir avec la base de données
    * 
    * @return \PDO
    * 
    * 
    */
 public static function getPdo():\PDO{
   
           // Ici, entrer le nom de la base de données, ainsi que l'username et le mot de passe.
           $pdo = new \PDO("mysql:host=localhost;dbname=musique;charset=utf8", "ellamai","ellamai", [
                   \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                   \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ
           ]);
   
           return $pdo;
   
   }
}
