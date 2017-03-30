<?php

  // classe pa recuperation de touts les infos d'une fiche tchnique
  class technote{

    /**
     * @var string id de la fiche tedchnique
     */
    private $technoteid = "";

    /**
     * @var array pour stoquer les infos de la fiche technique
     */
    private $technote;

    /**
     * constructeur, initialise les 2 parametres de la classe
     * @param string id de la fiche technique
     */
    public function __construct($technoteid){

      // on initialise le champ avec l'id de la fiche technique
      $this->technoteid = $technoteid;

    }


    // -------------------------------------------------------------------------
    // methodes de vérification que l'on peut consulter la fiche concernée

    /**
     * verification des droit de l'utilisateur
     * @param string id de l'utilisateur
     */
    public function verifyUser($userid){

      $data = DB::getDB()->prepare("SELECT id_users FROM TN_users INNER JOIN TN_technicalnotes ON id_users=idx_user WHERE id_technicalnote=?", [$this->technoteid]);

      if ($data[0]->id_users !== $userid) {

        session_destroy();

        header("Location: login");

        exit();

      } else {

        return true;

      }

    }

    /**
     * verification des droit de consultation avec PIN
     * @param string pin renseigné
     */
    public function verifyPin($pin){

      $data = DB::getDB()->prepare("SELECT pincode FROM TN_technicalnotes WHERE id_technicalnote=?", [$this->technoteid]);

      if ($data[0]->pincode !== $pin) {

        return false;

      } else {

        return true;

      }

    }

    // -------------------------------------------------------------------------
    // methodes de récuperation des infos

    /**
     * récupere toutes les données dans la bd
     */
    private function getTechnote(){

      if (empty($this->technote)) {

        $this->technote["technote"] = DB::getDB()->prepare("SELECT name, description, lastedit, pincode FROM TN_technicalnotes WHERE id_technicalnote=?", [$this->technoteid]);
        $this->technote["infos"] = DB::getDB()->prepare("SELECT band, descriptio, date, image, stageplan FROM TN_informations WHERE idx_technicalnote=?", [$this->technoteid]);
        $this->technote["contacts"] = DB::getDB()->prepare("SELECT id_contact, name, email, phone, website, function FROM TN_contacts WHERE idx_technicalnote=?", [$this->technoteid]);
        $this->technote["comments"] = DB::getDB()->prepare("SELECT title, head, commentar FROM TN_comments WHERE idx_technicalnote=?", [$this->technoteid]);
        $this->technote["patch"] = DB::getDB()->prepare("SELECT input, instrument, microphone, fx, monitormix FROM TN_patchlists WHERE idx_technicalnote=?", [$this->technoteid]);
        $this->technote["musicians"] = DB::getDB()->prepare("SELECT name, instrument FROM TN_musicians WHERE idx_technicalnote=?", [$this->technoteid]);

      }

    }

    /**
     * renvoie les infos pour générer un header
     */
    public function getInfos(){

      $this->getTechnote();

      $date = explode(" ", $this->technote["infos"][0]->date);

      return array(
        "name" => $this->technote["technote"][0]->name,
        "description" => $this->technote["technote"][0]->description,
        "pincode" => $this->technote["technote"][0]->pincode,
        "band" => $this->technote["infos"][0]->band,
        "date" => $date[0],
        "descriptio" => $this->technote["infos"][0]->descriptio
      );

    }

    // permet d'obtenir juste le nom
    public function getName(){

      $this->getTechnote();

      return $this->technote["technote"][0]->name;

    }

    /**
     * renvoie les infos pour générer un header
     */
    public function getHeader(){

      $this->getTechnote();

      $date = explode(" ", $this->technote["infos"][0]->date);

      return array(
        "name" => $this->technote["infos"][0]->band,
        "date" => $date[0],
        "image" => $this->technote["infos"][0]->image
      );

    }

    /**
     * renvoie les infos pour générer la description
     */
    public function getDescription(){

      $this->getTechnote();

      return array(
        "description" => $this->technote["infos"][0]->descriptio
      );

    }

    /**
     * renvoie les infos pour générer les contacts
     */
    public function getContacts(){

      $this->getTechnote();

      return array(
        "contacts" => $this->technote["contacts"]
      );

    }

    /**
     * renvoie les infos pour générer les commentaires
     */
    public function getComments(){

      $this->getTechnote();

      return array(
        "comments" => $this->technote["comments"]
      );

    }

    /**
     * renvoie le patch complet
     */
    public function getPatch(){

      $this->getTechnote();

      return $this->technote["patch"];

    }

    /**
     * renvoie tous les musiciens
     */
    public function getMusicians(){

      $this->getTechnote();

      return $this->technote["musicians"];

    }

    /**
     * renvoie le nom du plan de scene
     */
    public function getPlan(){

      $this->getTechnote();

      return $this->technote["infos"][0]->stageplan;

    }

    /**
     * Pour supprimer une fiche technique
     */
    public function delete(){

      $id = $this->technoteid;

      $data = DB::getDB()->delete("DELETE * FROM TN_comments WHERE idx_technicalnote = ?", [$id]);
      $data = DB::getDB()->delete("DELETE * FROM TN_contacts WHERE idx_technicalnote = ?", [$id]);
      $data = DB::getDB()->delete("DELETE * FROM TN_informations WHERE idx_technicalnote = ?", [$id]);
      $data = DB::getDB()->delete("DELETE * FROM TN_musicians WHERE idx_technicalnote = ?", [$id]);
      $data = DB::getDB()->delete("DELETE * FROM TN_patchlists WHERE idx_technicalnote = ?", [$id]);

      $data = DB::getDB()->delete("DELETE * FROM TN_technicalnotes WHERE id_technicalnote = ?", [$id]);

    }

  }
