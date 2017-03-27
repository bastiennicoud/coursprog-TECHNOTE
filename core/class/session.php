<?php

  /**
  * Class de gestion des sessions PHP
  */
  class session {

    // constructeur, on demarre les session des l'instanciation de la classe
    public function __construct(){

      session_start();

    }

    // permet d'ajouter l'utilisateur a la session
    public function createUserSession($userid, $username){

      $_SESSION["userid"] = $userid;
      $_SESSION["username"] = $username;

    }

    // verifie que l'utilisateur a bien une session
    public function verifyUserSession(){

      if(!isset($_SESSION['username']) && !isset($_SESSION['userid'])){

        header("Location: login");

        exit();

      }

    }

    // pour arreter une session
    public function destroySession(){

      session_destroy();

    }

  }
