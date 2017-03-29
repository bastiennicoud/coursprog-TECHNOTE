<?php

  // trate la création d'une fiche technique

  // on initialise la class newtechnote -> qui nous peremttra de faire des traitements
  $newtechnote = new newtechnote($_POST, $session->getUserID());

  // cette fonction vérifie que les champ ont été remplis
  $newtechnote->verifyContent();

  // methode spécifique pour vérifier que le pin est numérique
  $newtechnote->verifyPin();

  // si le statut de verification est OK
  if ($newtechnote->getState()) {

    // ecriture dans la bd
    $newtechnote->updateInfos();

    // redirection
    echo json_encode($newtechnote->state);

  } else {

    // renvoir ajax des erreurs
    echo json_encode($newtechnote->state);

  }
