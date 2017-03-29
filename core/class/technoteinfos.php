<?php

  // classe pour la gestion des fiches techniques
  class technoteinfos{

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

      // recuperation des infos dans la bd
      $datas = DB::getDB()->prepare("SELECT TN_technicalnotes.id_technicalnote, TN_technicalnotes.name, TN_technicalnotes.description, TN_technicalnotes.pincode, TN_technicalnotes.linkhash, TN_technicalnotes.lastedit, TN_informations.image
                                      FROM TN_technicalnotes
                                      INNER JOIN TN_users ON TN_technicalnotes.idx_user=TN_users.id_users
                                      INNER JOIN TN_informations ON TN_technicalnotes.id_technicalnote=TN_informations.idx_technicalnote
                                      WHERE TN_users.id_users = ?;",
                                    [$this->userid]);


      $template = "";

      // crée la mise en forme pour chaque card
      foreach ($datas as $key => $value) {

        $template = $template . "
          <div class='card'>
            <img class='card-img-top img-fluid' src='img/cover/" . $value->image . "' alt='Photo du group " . $value->name . "'>
            <div class='card-block'>
              <h4 class='card-title'>" . $value->name . "</h4>
              <p class='card-text'>" . $value->description . "</p>
              <p class='card-text'>Code pin <span class='badge badge-default'>" . $value->pincode . "</span></p>
              <p class='card-text'>Lien de partage : <a href='technote" . $value->linkhash . "' class='card-link'>link</a></p>
              <p class='card-text'><small class='text-muted'>Derniere mise a jour " . $value->lastedit . "</small></p>
            </div>

            <div class='card-block'>
                <a href='prewiew?id=" . $value->id_technicalnote . "' class='btn btn-info'>Prévisualiser</a>
            </div>

            <div class='card-footer'>
              <a href='setedit?id=" . $value->id_technicalnote . "' class='btn btn-primary'>Editer</a>
              <a href='delete/" . $value->id_technicalnote . "' class='btn btn-danger'>Supprimer</a>
            </div>
          </div>
        ";

      }

      return $template;

    }

    public function getTechName($id) {

      $data = DB::getDB()->prepare("SELECT name FROM TN_technicalnotes WHERE id_technicalnote=?", [$id]);

      return $data[0]->name;

    }

  }
