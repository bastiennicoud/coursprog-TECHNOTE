<?php

  // cette classe sert a appeler les différentes vues

  class WIEW{

    // appelle la vue demandée
    public static function getWiew($name, $nav, $session){

      if ($session === true) {

        $session = new session();
        $session->verifyUserSession();

      }

      require "../core/wiew/template/header.php";

      // si le parametre nav est true on inclus la navigation
      if ($nav === true){

        require "../core/wiew/template/nav.php";

      }

      require "../core/wiew/v.$name.php";

      require "../core/wiew/template/footer.php";

    }

    public static function getCtrl($name, $session){

      if ($session === true) {

        $session = new session();
        $session->verifyUserSession();

      }

      require "../core/controller/c.$name.php";

    }

  }
