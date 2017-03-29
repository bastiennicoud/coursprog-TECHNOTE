<?php

  // Gestion de l'image uploadeée
  // Récuperation de l'image
  if ($_FILES['picture']['error']) {
    $errors['imageupload'] = "Un erreur lors de l'upload de l'image c'est produite";
  }
  if ($_FILES['picture']['size'] > 1048576) {
    $errors['imageupload'] = "Le fichier est trop volumineux, il depasse 1 mo";
  }

  // ici les formats valides que j'accepte
  $validformat = "jpg";
  // strtolower convertit en minuscules, substr enleve le premier caractere, strrchr renvoie l'extension et son .
  $uploadedformat = strtolower(substr(strrchr($_FILES['picture']['name'], '.'),1));
  if ($uploadedformat != $validformat) {
    $errors['imageformat'] = "Le format de fichier n'est pas valide";
  }

  // creation d'un nom pour l'image
  $imagename = "member" . $lastID . "." . $uploadedformat;
  echo $imagename;
  // emplacement
  $imagedirectory = "img/teammembers/" . $imagename;
  echo $imagedirectory;

  // je deplace le ficher dans le dossier voulu a ce effet
  $imgmove = move_uploaded_file($_FILES['picture']['tmp_name'], "../" . $imagedirectory);

  if (!$imgmove) {
    var_dump($imgmove);
    $errors['deplacementimage'] = "Erreur lors du deplacement de l'image.";
  }

  // Ajout du lien de l'image dans la bd
  if (!$req = $connexion->prepare("UPDATE TEAM SET Picture=? WHERE IdAgency=?")) {
    // Gestion des erreurs
    $errors['preparation'] = "Erreur de preparation de la requete";
  }

  // Liage des parametres
  if (!$req->bind_param("si", $imagedirectory, $lastID)) {
    // Gestion des erreurs
    $errors['liage'] = "Erreur de liage des parametres";
  }

  // execution de la requete
  if (!$req->execute()) {
    // Gestion des erreurs
    $errors['execution'] = "Erreur d'execution de la requete";
  }

  echo json_encode($data);
