<?php

  // classe pour la gestion des fiches techniques
  class technote{

    /**
     * @var string nom de l'utilisateur
     */
    private $user = "";
    /**
     * @var string id de l'utilisateur
     */
    private $userid = "";

    /**
     * constructeur, initialise les 2 parametres de la classe
     * @param string nom de l'utilisateur
     * @param string id de l'utilisateur
     */
    public function __construct($user, $userid){

      $this->user = $user;
      $this->userid = $userid;

    }

    /**
     * permet d'obtenir une card (mise en forme bootstrap) pour chaque fiche technique
     * @param string nom de l'utilisateur
     * @param string id de l'utilisateur
     */
    public function getCard(){

      $data = DB::getDB()->prepare("SELECT TN_technicalnotes.id_technicalnote, TN_technicalnotes.name, TN_technicalnotes.description, TN_technicalnotes.pincode, TN_technicalnotes.linkhash, TN_technicalnotes.lastedit
                                    FROM TN_technicalnotes
                                    INNER JOIN TN_users ON TN_users.id_users=TN_technicalnotes.idx_user
                                    WHERE TN_users.id_users = ?;",
                                    [$this->userid]);

      //
      return $data;
    }


  }
