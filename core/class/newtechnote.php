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
     * @var integer stoquera l'in de la technote en cors d'edition
     */
    public $id;
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

      $this->lastid = DB::getDB()->lastId();
      $image = $this->lastid . str_replace(' ','',$this->infos["bandname"]) . ".jpg";
      $link = "?id=" . $this->lastid;

      $sql = "INSERT INTO TN_informations (idx_technicalnote, band, descriptio, date, image, stageplan)
              VALUES (?, ?, ?, ?, ?, ?);";
      $datas = [$this->lastid, $this->infos["bandname"], $this->infos["banddescription"], $this->infos["date"], $image, $image];

      $data = DB::getDB()->insert($sql, $datas);
      $data = DB::getDB()->insert("UPDATE TN_technicalnotes SET linkhash = ? WHERE id_technicalnote=?;", [$link, $this->lastid]);

    }

    /**
     * Permet de mettre a jour les infos de base d'une fiche tech
     * @param integer id de la fiche technique a mettre a jour
     */
    public function updateInfos($id){

      $link = "?id=" . $id;

      $sql = "UPDATE TN_technicalnotes SET idx_user = ?, name = ?, lastedit = NOW(), description = ?, pincode = ?, linkhash = ?, public = 1 WHERE id_technicalnote = ?";
      $datas = [$this->user, $this->infos["name"], $this->infos["techdescription"],  $this->infos["pin"], $link, $id];

      $data = DB::getDB()->insert($sql, $datas);

      $image = $id . str_replace(' ','',$this->infos["bandname"]) . ".jpg";

      $sql = "UPDATE TN_informations SET band = ?, descriptio = ?, date = ?, image = ?, stageplan = ? WHERE idx_technicalnote = ?";
      $datas = [$this->infos["bandname"], $this->infos["banddescription"], $this->infos["date"], $image, $image, $id];

      $data = DB::getDB()->insert($sql, $datas);

    }

    /**
     * Permet d'ajouter un contact a une fiche technique
     * @param integer id de la fiche technique en question
     */
    public function addContact($id){

      $data = DB::getDB()->insert("INSERT INTO TN_contacts (idx_technicalnote, name, email, phone, website, function)
              VALUES (?, ?, ?, ?, ?, ?);",
              [$id, $this->infos["name"], $this->infos["email"], $this->infos["phone"], $this->infos["web"], $this->infos["function"]]);

    }

    /**
     * Permet d'ajouter un commetaire a la fiche technique
     * @param integer id de la fiche technique en question
     */
    public function addComment($id){

      $data = DB::getDB()->insert("INSERT INTO TN_comments (idx_technicalnote, title, head, commentar)
              VALUES (?, ?, ?, ?);",
              [$id, $this->infos["title"], $this->infos["head"], $this->infos["comment"]]);


    }

    /**
     * Permet d'ajouter une piste au patch de la fiche tech
     * @param integer id de la fiche technique en question
     */
    public function addPatch($id){

      $data = DB::getDB()->insert("INSERT INTO TN_patchlists (idx_technicalnote, input, instrument, microphone, fx, monitormix)
              VALUES (?, ?, ?, ?, ?, ?);",
              [$id, $this->infos["channel"], $this->infos["instrument"], $this->infos["mic"], $this->infos["fx"], $this->infos["monmix"]]);

    }

    /**
     * Permet d'ajouter une piste au patch de la fiche tech
     * @param integer id de la fiche technique en question
     */
    public function addZicos($id){

      $data = DB::getDB()->insert("INSERT INTO TN_musicians (idx_technicalnote, name, instrument)
              VALUES (?, ?, ?);",
              [$id, $this->infos["name"], $this->infos["instrument"]]);

    }

  }
