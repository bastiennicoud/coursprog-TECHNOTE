<?php

  // classe pa recuperation de touts les infos d'une fiche tchnique
  class technote{

    /**
     * @var string id de la fiche tedchnique
     */
    private $technoteid = "";

    /**
     * @var string id de la fiche tedchnique
     */
    private $userid = "";

    /**
     * constructeur, initialise les 2 parametres de la classe
     * @param string nom de l'utilisateur
     * @param string id de l'utilisateur
     */
    public function __construct($technoteid, $userid){

      $data = DB::getDB()->prepare("SELECT id_users FROM TN_users INNER JOIN TN_technicalnotes ON id_users=idx_user WHERE id_technicalnote=?", [$technoteid]);

      if ($data[0]->id_users == $userid){

        $this->technoteid = $technoteid;
        $this->userid = $userid;
        
      }

    }

  }
