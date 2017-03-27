<?php

// controller chargé de verifier et valider l'inscription


// on initialise la classe de gestion des utilisateurs
$user = new user($_POST);

// validations
$user->validateUsername("username");
$user->validateEmail("email");
$user->validatePass("password", "passwordconfirm");

// ajoute l'utilisateur a la bd
$user->register();

// on renvoie les eventuelles erreurs a l'utilisateur
echo json_encode($user->getState());
