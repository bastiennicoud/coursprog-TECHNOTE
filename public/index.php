<?php

  // point d'entrée de lâpplication (le routeur)
  // je déclare ici toutes les pages a appeler en fonction de l'url demandé


  // j'initialise l'autoloader, pour charger directement les classes lors que je les instancie
  require '../core/class/AUTOLOADER.php';
  AUTOLOADER::register();


  // instancie un nouveau router et on lui passe l'url applé en paramètre
  $router = new router($_GET['url']);


  // ICI je déclare toutes les routes pour mon application
  //------------------------------------------------------

  // route vers la page d'acceuil
  $router->get('/', function(){ require '../core/wiew/v.login.php'; });

  // route lorsque lon demande le formulaire de login
  $router->post('/login', function(){ require '../core/controller/c.login.php'; });

  // route lorsque on poste le formulaire de login
  $router->post('/login', function(){ require 'core/controller/c.login.php'; });



  // lance la verification de la route
  $router->run();
