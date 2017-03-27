<?php

// controller de login (verification et initialisation de session)

// on initialise la classe de gestion des utilisateurs
$user = new user($_POST);

// validations
$user->logUser("username", "password");

// crée la session PHP si le login est ok
$user->login("username");

// on renvoie les eventuelles erreurs a l'utilisateur
echo json_encode($user->getState());
