<?php

  // cette classe gere l'ajout ou la mise a jour de fiches techniques

  class newtechnote {

    /**
     * @var array stoquera toutes les donées passées lors de l'instanciation
     */
    private $infos;
    /**
     * @var array stoquera toutes les donées passées lors de l'instanciation
     */
    private $user;

    /**
     * constructeur, initialise les parametres de la classes
     * @param array infos a traiter
     */
    public function __construct($infos, $user){

      $this->infos = $infos;
      $this->user = $user;

    }

    /**
     * Permet d'obtenir le tableau des infos
     */
    public function getInfos(){

      return $this->infos;

    }

    /**
     * Permet de créer une nouvelle fiche etchnique
     */
    public function writeNew(){

      $sql = "INSERT INTO TN_technicalnotes (idx_user, name, lastedit, description, pincode, public)
              VALUES (?, ?, NOW(), ?, ?, 1);";
      $datas = [$this->user, $this->infos["name"], $this->infos["techdescription"],  $this->infos["pin"]];

      $data = DB::getDB()->insert($sql, $datas);

      $image = trim($this->infos["name"]) . ".jpg";
      $lastid = DB::getDB()->lastId();

      $sql = "INSERT INTO TN_informations (idx_technicalnote, band, descriptio, date, image, stageplan)
              VALUES (?, ?, ?, ?, ?, ?);";
      $datas = [$lastid, $this->infos["bandname"], $this->infos["banddescription"], $this->infos["date"], $image, $image];

      $data = DB::getDB()->insert($sql, $datas);

    }

  }
