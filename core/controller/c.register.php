<?php

// controller chargé de verifier et valider l'inscription


// on initialise la classe de gestion des utilisateurs
$user = new user($_POST);

// validations
$user->validateUsername("username");
$user->validateEmail("email");
$user->validatePass("password", "passwordconfirm");

$user->register();

echo json_encode($user->getState());



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
$user["email"]    = filter_input(INPUT_POST, 'email');
$user["password"] = filter_input(INPUT_POST, 'password');
$user["passconf"] = filter_input(INPUT_POST, 'passwordconfirm');

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

// email
if (strlen($user["email"]) < 1) {
  $registering["errors"]["email"] = "Vous n'avez pas renseigné d'e-mail";
  $registering["success"]["email"] = false;
} elseif (strlen($user["email"]) > 60) {
  $registering["errors"]["emaillength"] = "L'e-mail renseigné est trop long";
  $registering["success"]["email"] = false;
} else {
  $registering["success"]["email"] = true;
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

// password confirm
if (strlen($user["passconf"]) < 1) {
  $registering["errors"]["passconf"] = "Vous n'avez pas confirmé de mot de passe";
  $registering["success"]["passconf"] = false;
} elseif ($user["passconf"] != $user["password"]) {
  $registering["errors"]["passconfexact"] = "Vous n'avez pas confirmé correctement le mot de passe";
  $registering["success"]["passconf"] = false;
} else {
  $registering["success"]["passconf"] = true;
}

// si il n'y a pas d'erreurs on peu générer les hash du mot de passe
if (empty($registering['errors'])) {

  // création du hash
  $user['passwordhash'] = password_hash($user['password'], PASSWORD_BCRYPT);
  // je vide le mot de passe en clair du tableau pour empecher d'obtenir le mdp en clair
  $user['password'] = "";
  $user['passconf'] = "";

}

// appele le modele pour inscrire l'utilisateur dans la bd
require 'core/model/m.registered.php';

// renvoi du json au client
echo json_encode($register);
*/
