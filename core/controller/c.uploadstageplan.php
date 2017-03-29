<?php

  $errors = array();

  // Gestion de l'image uploadeée
  // Récuperation de l'image
  if ($_FILES['image']['error']) {
    $errors['imageupload'] = "Un erreur lors de l'upload de l'image c'est produite";
  }
  if ($_FILES['image']['size'] > 1048576) {
    $errors['imageupload'] = "Le fichier est trop volumineux, il depasse 1 mo";
  }

  // ici les formats valides que j'accepte
  $validformat = "jpg";
  // strtolower convertit en minuscules, substr enleve le premier caractere, strrchr renvoie l'extension et son .
  $uploadedformat = strtolower(substr(strrchr($_FILES['image']['name'], '.'),1));
  if ($uploadedformat != $validformat) {
    $errors['imageformat'] = "Le format de fichier n'est pas valide";
  }

  // classe qui me permet davoir des infos sur une fiche technique
  $technoteinfos = new technoteinfos($session->getUser(), $session->getUserID());

  // création du nom pour l'image
  $name = $session->getEdit() . $technoteinfos->getTechName($session->getEdit());
  // creation d'un nom pour l'image
  $imagename = $name . "." . $uploadedformat;

  // emplacement
  $imagedirectory = "img/plan/" . $imagename;

  // je deplace le ficher dans le dossier voulu a ce effet
  $imgmove = move_uploaded_file($_FILES['image']['tmp_name'], $imagedirectory);

  if (!$imgmove) {
    var_dump($imgmove);
    $errors['deplacementimage'] = "Erreur lors du deplacement de l'image.";
  }

  if(empty($errors)){
    $errors["success"] = "upload ok";
  }

  echo json_encode($errors);
