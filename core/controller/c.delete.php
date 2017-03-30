<?php

  // pour la suppresion d'une fiche technique

  $technote = new technote($_GET["id"]);

  $technote->verifyUser($session->getUserID());

  $technote->delete();

  header("Location: dashboard");
