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

  // route vers la page d'acceuil = formulaire de login
  $router->get('/', function(){ require '../core/wiew/v.login.php'; });

  // route vers le formulaire de login
  $router->get('/login', function(){ require '../core/wiew/v.login.php'; });

  // route lorsque l'on demande un verification du formulaire de login
  $router->post('/login', function(){ require '../core/controller/c.login.php'; });

  // route lorsque on demande le formulaire d'inscription
  $router->get('/register', function(){ require '../core/wiew/v.register.php'; });

  // route lorsque lon demande la verification de l'inscription
  $router->post('/register', function(){ require '../core/controller/c.register.php'; });


  // lance la verification de la route
  $router->run();
