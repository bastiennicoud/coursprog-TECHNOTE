<?php

  /**
  * Class de gestion des sessions PHP
  */
  class session {

    public function __construct(){

      session_start();

    }

    public function createUserSession($userid, $username){

      $_SESSION["userid"] = $userid;
      $_SESSION["username"] = $username;

    }

  }
