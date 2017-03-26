<?php

  /**
  * Class de connexion a la base de données, utilisant PDO
  */
  class dbconn {

    /**
     * @var string nom de la base de donnée
     */
    private $db_name;
    /**
     * @var string nom d'utilisateur
     */
    private $db_user;
    /**
     * @var string mot de passe
     */
    private $db_pass;
    /**
     * @var string hote
     */
    private $db_host;
    /**
     * @var string pour stoquer l'instance de pdo utilisée
     */
    private $pdo;


    /**
     * constructeur, permet de passer les parametres de connexion lors de l'instanciation
     * @param string nom de la base de donnée
     * @param string nom d'utilisateur
     * @param string mot de passe
     * @param string hote
     */
    public function __construct($db_name = 'technote', $db_user = 'root', $db_pass = 'root', $db_host = 'local.dev'){

      $this->db_name = $db_name;
      $this->db_user = $db_user;
      $this->db_pass = $db_pass;
      $this->db_host = $db_host;

    }

    /**
     * fonction de connexion a la base de donnée
     */
    private function getPDO(){

      if ($this->pdo === null) {
        $pdo = new PDO("mysql:dbname=$this->db_name;host=$this->db_host", $this->db_user, $this->db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;
      }
      return $this->pdo;

    }

    /**
     * requete sql basique (non préparée), retourne un objet
     * @param string requete SQL
     */
    public function query($request){

      $stmt = $this->getPDO()->query($request);
      $datas = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $datas;

    }

    /**
     * requete préparées, retourne un objet
     * @param string requete sql
     * @param array valeurs a lier lors du bind param
     */
    public function prepare($request, $values){

        $stmt = $this->getPDO()->prepare($request);
        $stmt->execute($values);
        $datas = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $datas;

    }

    /**
     * requete d'insertions dans la bd
     * @param string requete sql
     * @param array valeurs a lier lors du bind param
     */
    public function insert($request, $values){

      $stmt = $this->getPDO()->prepare($request);
      $stmt->execute($values);
      return true;

    }
  }
