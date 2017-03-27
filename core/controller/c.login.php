<?php

// controller de login (verification et initialisation de session)






/*
// tableau pour stoquer les erreurs
$registering = array(
  "errors"  => array(),
  "success" => array()
);

// tableau pour les données de l'utilisateur
$user = array();

// recuperation des données d'inscription
$user["username"] = filter_input(INPUT_POST, 'username');
$user["password"] = filter_input(INPUT_POST, 'password');

// validation des données
// username
if (strlen($user["username"]) < 1) {
  $registering["errors"]["username"] = "Vous n'avez pas renseigné de nom d'utilisateur";
  $registering["success"]["username"] = false;
} elseif (strlen($user["username"]) > 60) {
  $registering["errors"]["usernamelength"] = "Le nom d'utilisateur renseigné est trop long";
  $registering["success"]["username"] = false;
} else {
  $registering["success"]["username"] = true;
}

// password
if (strlen($user["password"]) < 1) {
  $registering["errors"]["password"] = "Vous n'avez pas renseigné de mot de passe";
  $registering["success"]["password"] = false;
} elseif (strlen($user["password"]) > 60) {
  $registering["errors"]["passwordlength"] = "Le mot de passe renseigné est trop long";
  $registering["success"]["password"] = false;
} else {
  $registering["success"]["password"] = true;
}



// ici l'ecriture dans la bas de données
// appele le modele de login
require 'core/model/m.login.php';



// si il n'y a pas d'erreur on peut démarrer une session
if (empty($registering['errors'])) {

  session_start();

  // et j'y stoque quelques infos sur l'utilisateur
  $_SESSION['id'] = $data[0]->id_user;
  $_SESSION['username'] = $data[0]->username;
  $_SESSION['email'] = $data[0]->email;

}

// on renvoie un json avec les infos nessaisaires a javascript pour faire evoluer la page
echo json_encode($registering);

*/
