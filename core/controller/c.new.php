<?php

  // trate la création d'une fiche technique
  var_dump($_POST);
  // on initialise la class newtechnote -> qui nous peremttra de faire des traitements
  $newtechnote = new newtechnote($_POST, $session->getUserID());

  // validation des différents champs
  $newtechnote->writeNew();

  echo json_encode($newtechnote->getInfos());
