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
     * @var array stoque le status des verifications (erreurs et success)
     */
    public $state = [
        "errors"  => array(),
        "success" => array()
    ];

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
     * Permet de conniatre si la verification aproduit des erreurs ou non
     */
    public function getState(){

      if(empty($this->state["errors"])) {
        return true;
      } else {
        return false;
      }

    }

    /**
     * Permet d'obtenir le tableau des infos
     */
    public function verifyContent(){

      foreach ($this->infos as $key => $value) {

        if(VALIDATE::exists($value)){

          $this->state["success"][$key] = true;

        } else {

          $this->state["success"][$key] = false;
          $this->state["errors"][$key] = $key . " n'a pas été renseigné";
        }

      }

    }

    /**
     * Permet d'obtenir le tableau des infos
     */
    public function verifyPin(){

      if(VALIDATE::numeric($this->infos["pin"])) {
        $this->state["success"]["pin"] = true;
      } else {
        $this->state["success"]["pin"] = false;
        $this->state["errors"]["pin"] = "Ce code pin n'est pas un chiffre";
      }

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
      $link = "?id=" . $lastid;

      $sql = "INSERT INTO TN_informations (idx_technicalnote, band, descriptio, date, image, stageplan)
              VALUES (?, ?, ?, ?, ?, ?);";
      $datas = [$lastid, $this->infos["bandname"], $this->infos["banddescription"], $this->infos["date"], $image, $image];

      $data = DB::getDB()->insert($sql, $datas);
      $data = DB::getDB()->insert("INSERT INTO TN_technicalnotes (linkhash) VALUES (?);", [$link]);

    }

  }
