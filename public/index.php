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
  $router->get('/', function(){ WIEW::getwiew("login", false, false); });

  // route vers le formulaire de login
  $router->get('/login', function(){ WIEW::getwiew("login", false, false); });

  // route lorsque l'on demande un verification du formulaire de login
  $router->post('/login', function(){ WIEW::getCtrl("login", false); });

  // route vers la page d'acceuil = formulaire de login
  $router->get('/disconnect', function(){
    $session = new session();
    $session->destroySession();
  });

  // route lorsque on demande le formulaire d'inscription
  $router->get('/register', function(){ WIEW::getwiew("register", false, false); });

  // route lorsque lon demande la verification de l'inscription
  $router->post('/register', function(){ WIEW::getCtrl("register", false); });

  // route lorsque lon demande la page de tableau de bord
  $router->get('/dashboard', function(){ WIEW::getwiew("dashboard", true, true); });

  // route lorsque lon demande la page de tableau de bord
  $router->get('/new', function(){ WIEW::getwiew("new", true, true); });

  // route lorsque lon demande la prévisualisation de la fiche technique
  $router->get('/prewiew', function(){ WIEW::getwiew("prewiew", false, true); });

  // route lorsque lon demande a acceder a une fiche technique -> demande le pin
  $router->get('/technote', function(){ WIEW::getwiew("pin", false, false); });

  // route lorsque lon demande a acceder a une fiche technique -> verifie le pin et affiche la fiche
  $router->post('/technote', function(){ WIEW::getwiew("technote", false, false); });


  // lance la verification de la route
  $router->run();
