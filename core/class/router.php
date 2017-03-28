<?php

  /**
   * Classe contenant les methodes untilisées pour router les requetes (utilisé dans le fichier index)
   */
  class router{

    private $url;
    private $routes = [];

    // constructeur
    public function __construct($url){

      $this->url = $url;

    }

    // gere les appels en get
    public function get($path, $callable){

      $route = new route($path, $callable);
      $this->routes['GET'][] = $route;

    }

    // gere les appels en post
    public function post($path, $callable){

      $route = new route($path, $callable);
      $this->routes['POST'][] = $route;

    }

    public function run(){

      // ici on renvoie une exeption si la methode demandée n'est pas existante
      if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])){

        throw new routerexception('Methode appelée inéxistante');

      }

      // verification de la route
      foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route){

        if ($route->match($this->url)){

          return $route->call();

        }

      }

      throw new routerexception('Aucunnes route ne correspond');

    }

  }
