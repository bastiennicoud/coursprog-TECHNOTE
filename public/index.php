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

  // route lorsque lon demande la prévisualisation de la fiche technique
  $router->get('/prewiew', function(){ WIEW::getwiew("prewiew", false, true); });

  // route lorsque lon demande a acceder a une fiche technique -> demande le pin
  $router->get('/technote', function(){ WIEW::getwiew("pin", false, false); });

  // route lorsque lon demande a acceder a une fiche technique -> verifie le pin et affiche la fiche
  $router->post('/technote', function(){ WIEW::getwiew("technote", false, false); });

  // route lorsque lon demande la page pour ajouter une nouvelle fiche tech
  $router->get('/new', function(){ WIEW::getwiew("new", true, true); });

  // route lorsque lon soummet les infos pour la création d'une nouvelle fiche tech
  $router->post('/new', function(){ WIEW::getCtrl("new", true); });

  // permet juste de definir la fiche technique qui est actuellement en cours d'édition
  $router->get('/setedit', function(){ WIEW::getCtrl("setedit", true); });

  // route lorsque lon demande la page d'edition
  $router->get('/edit', function(){ WIEW::getwiew("edit", true, true); });

  // script pour suvegarder l'image
  $router->post('/uploadstageplan', function(){ WIEW::getCtrl("uploadstageplan", true); });

  // script pour suvegarder l'image
  $router->post('/uploadbandimage', function(){ WIEW::getCtrl("uploadbandimage", true); });


  // route lorsque lon demande la page d'edition des infos
  $router->get('/editinfos', function(){ WIEW::getwiew("editinfos", true, true); });

  // route lorsque lon soummet les infos editées
  $router->post('/editinfos', function(){ WIEW::getCtrl("editinfos", true); });


  // route lorsque lon demande la page d'edition des contacts
  $router->get('/editcontacts', function(){ WIEW::getwiew("editcontacts", true, true); });

  // route lorsque lon soummet les nouveau contacts
  $router->post('/editcontacts', function(){ WIEW::getCtrl("editcontacts", true); });


  // route lorsque lon demande la page d'edition des commentaires
  $router->get('/editcomments', function(){ WIEW::getwiew("editcomments", true, true); });

  // route lorsque lon soummet les nouveau commentaires
  $router->post('/editcomments', function(){ WIEW::getCtrl("editcomments", true); });


  // route lorsque lon demande la page d'edition des commentaires
  $router->get('/editpatch', function(){ WIEW::getwiew("editpatch", true, true); });

  // route lorsque lon soummet les nouveau commentaires
  $router->post('/editpatch', function(){ WIEW::getCtrl("editpatch", true); });


  // route lorsque lon demande la page d'edition des commentaires
  $router->get('/editzicos', function(){ WIEW::getwiew("editzicos", true, true); });

  // route lorsque lon soummet les nouveau commentaires
  $router->post('/editzicos', function(){ WIEW::getCtrl("editzicos", true); });

  // route pour envoyer un mail
  $router->get('/sendmail', function(){ WIEW::getCtrl("mail", true); });


  // route lorsque lon demande la page d'edition des commentaires
  //$router->get('/delete', function(){ WIEW::getCtrl("delete", true); });


  // lance la verification de la route
  $router->run();
