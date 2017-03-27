<?php

  /**
  * Class de gestion des utilisateurs
  */
  class user {

    /**
     * @var array stoque toutes les infos transmises lors de l'instanciation de la classe
     */
    private $userinfos = [];

    /**
     * @var array stoque le status des verifications (erreurs et success)
     */
    private $state = [
        "errors"  => array(),
        "success" => array()
    ];



    /**
     * constructeur de ma classe
     * @param array donnée de l'utilisateur
     */
    public function __construct($userinfos){

      $this->userinfos = $userinfos;

    }

    /**
     * Permet d'obtenir le tableau de l'utilisateur traité
     * @param string le champ a retourner
     */
    private function getField($field){

      if(!isset($this->userinfos[$field])){
        return null;
      } else {
        return $this->userinfos[$field];
      }

    }

    /**
     * Permet d'obtenir le tableau de l'utilisateur traité
     */
    public function getUser(){

      return $this->userinfos;

    }

    /**
     * Permet d'obtenir le tableau des erreurs
     */
    public function getState(){

      return $this->state;

    }



    // -------------------------------------------------------------------------
    // Methodes liées au login

    /**
     * Methode de vérification de la validité du nom d'utilisateur
     * @param string le nom du champ utilisateur
     * @param string le nom du champ de mot de passe
     */
    public function logUser($userfield, $pwdfield){

      if (strlen($this->getField($userfield)) < 1) {

        $this->state["errors"][$userfield] = "Vous n'avez pas renseigné de nom d'utilisateur";
        $this->state["success"][$userfield] = false;

      } elseif (strlen($this->getField($pwdfield)) < 1) {

        $this->state["errors"][$pwdfield] = "Vous n'avez pas renseigné de mot de passe";
        $this->state["success"][$pwdfield] = false;

      } else {

        $data = DB::getDB()->prepare("SELECT * FROM TN_users WHERE username=?", [$this->getField($userfield)]);

        if (empty($data)) {

          $this->state["errors"][$userfield . "exists"] = "Cet utilisateur n'existe pas";
          $this->state["success"][$userfield] = false;

        } else {

          $this->state["success"][$userfield] = true;

          if (password_verify($this->getField($pwdfield), $data[0]->password)) {

            $this->state["success"][$pwdfield] = true;

          } else {

            $this->state["errors"][$pwdfield . "verify"] = "Le mot de passe est erroné.";
            $this->state["success"][$pwdfield] = false;

          }

        }

      }

    }

    /**
     * Methode pour connecter l'utilisateur
     * @param object une instance de la classe de gestion des sessions
     */
    public function login($session){

    }



    // -------------------------------------------------------------------------
    // Methodes liées a l'inscription

    /**
     * Methode de vérification de la validité du nom d'utilisateur
     * @param string le champ a valider
     */
    public function validateUsername($field){

      // verifications de longeur
      if (strlen($this->getField($field)) < 1) {

        $this->state["errors"][$field] = "Vous n'avez pas renseigné de nom d'utilisateur";
        $this->state["success"][$field] = false;

      } elseif (strlen($this->getField($field)) > 120) {

        $this->state["errors"][$field . "length"] = "Le nom d'utilisateur renseigné est trop long";
        $this->state["success"][$field] = false;

      } else {

        $this->state["success"][$field] = true;

      }

      if ($this->state["success"][$field] === true){

        $data = DB::getDB()->prepare("SELECT id_users FROM TN_users WHERE $field = ?", [$this->getField($field)]);

        if ($data){

          $this->state["errors"][$field . "used"] = "Le nom d'utilisateur renseigné est déja utilisé";
          $this->state["success"][$field] = false;

        }

      }

    }

    /**
     * Methode de vérification de la validité de l'email
     * @param string le champ a valider
     */
    public function validateEmail($field){

      // verifications de longeur
      if (strlen($this->getField($field)) < 1) {

        $this->state["errors"][$field] = "Vous n'avez pas renseigné d'email";
        $this->state["success"][$field] = false;

      } elseif (strlen($this->getField($field)) > 250) {

        $this->state["errors"][$field . "length"] = "L'email renseigné est trop long";
        $this->state["success"][$field] = false;

      } elseif (filter_var($this->getField($field), FILTER_VALIDATE_EMAIL) === false) {

        $this->state["errors"][$field . "filter"] = "L'email n'est pas conforme";
        $this->state["success"][$field] = false;

      } else {

        $this->state["success"][$field] = true;

      }

    }

    /**
     * Methode de vérification de la validité du mot de passe
     * @param string le champ a valider
     * @param string le champ de confirmation de mot de passe
     */
    public function validatePass($field, $confirm){

      // verifications de longeur
      if (strlen($this->getField($field)) < 1) {

        $this->state["errors"][$field] = "Vous n'avez pas renseigné de mot de passe";
        $this->state["success"][$field] = false;

      } elseif (strlen($this->getField($field)) > 60) {

        $this->state["errors"][$field . "length"] = "Le mot de passe renseigné est trop long";
        $this->state["success"][$field] = false;

      } else {

        $this->state["success"][$field] = true;

      }

      if ($this->state["success"][$field] === true) {

        // verifications du champ de confirmation
        if (strlen($this->getField($confirm)) < 1) {

          $this->state["errors"][$confirm] = "Vous n'avez pas confirmé le mot de passe";
          $this->state["success"][$confirm] = false;

        } elseif ($this->getField($field) !== $this->getfield($confirm)) {

          $this->state["errors"][$confirm . "similar"] = "La confirmation de mot de passe n'est pas correcte";
          $this->state["success"][$confirm] = false;

        } else {

          $this->state["success"][$confirm] = true;

        }

      }

    }

    /**
     * Inscris l'utilisateur dans la bd si validation ok
     */
    public function register(){

      if (empty($this->state["errors"])) {

        $pwdhash = password_hash($this->getField("password"), PASSWORD_BCRYPT);

        $request = "INSERT INTO TN_users (username, email, password) VALUES (?, ?, ?);";

        $data = DB::getDB()->insert($request, [$this->getField("username"), $this->getField("email"), $pwdhash]);

        $this->state["success"]["database"] = "L'utilisateur a bien été crée.";

      }

    }

  }
