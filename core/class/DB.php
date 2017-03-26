<?php

  /**
   * class statique pour un acces plus simple a la class dbconn (moins a ecrire)
   */
  class DB {

    // ici presiser les parametres de connexion a la base de donnée
    const DB_NAME = '7a';
    const DB_USER = 'root';
    const DB_PASS = 'root';
    const DB_HOST = 'local.dev';

    /**
     * @var object pour stoquer la connexion a la bd
     */
    private static $dbconn;

    /**
     * fonction pour instancier l'objet dbconn et donc la class de connexion a la base de données
     */
    public static function getDB(){
      if (self::$dbconn === null) {
        self::$dbconn = new dbconn(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
      }
      return self::$dbconn;
    }
  }
