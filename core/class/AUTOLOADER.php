<?php

  // ma classe d'autoloading des différentes classes du site web
  // me permet d'éviter des reuqire a chaque fois que j'ai besoin d'une classe

  class AUTOLOADER{

    // fonction qui initialise l'autoloader et lui presise quelle fonction utliser pour trouver les classes
    static function register(){
      spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    // cette fonction va charger le fichier php correspondant a la classe a charger
    static function autoload($class_name){
      require '../core/class/' . $class_name . '.php';
    }

  }
