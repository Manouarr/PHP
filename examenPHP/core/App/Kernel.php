<?php

namespace App;


class Kernel
{

    public static function run()
    {

        // Deux variables modifiables afin de cibler la page d'accueil au choix.
        $type = 'home';
        $action = 'index';

        if(!empty($_GET['type'])) {$type = $_GET["type"];}
        if(!empty($_GET['action'])){ $action = $_GET["action"];}

       
        $type = ucfirst($type);
      
        $nomDeType = "\Controllers\\".$type;

        $controller = new $nomDeType();
        $controller->$action();

    }


}