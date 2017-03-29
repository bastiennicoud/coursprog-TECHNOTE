<?php

  // cette classe sert a appeler les différentes vues

  class WIEW{

    /**
     * permet l'appel d'une vue
     * @param string nom de la vue a appeler
     * @param bool si oui on non il faut ajouter la navigation
     * @param bool si oui on non il faut verifier la session
     */
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

    /**
     * permet l'appel d'un controlleur
     * @param string nom du controlleur a appeler
     * @param bool si oui on non il faut verifier la session
     */
    public static function getCtrl($name, $session){

      if ($session === true) {

        $session = new session();
        $session->verifyUserSession();

      }

      require "../core/controller/c.$name.php";

    }

  }
