<?php

  // Permet juste de seter la fiche technique qui va etre editée
  $session->activeEdit($_GET["id"]);

  header("Location: edit");
