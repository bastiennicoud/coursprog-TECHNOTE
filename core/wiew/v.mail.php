<?php

  // formulaire pour l'envoi du mail

  // on enregistre la fiche technique sur laquelle on travaille
  $session->activeEdit($_GET["id"]);

  // on initialise l'objet technote (qui permet d'acceder a toutes les infos d'une fiche tech)
  $technote = new technote($_GET["id"]);

  // on vérifie que l'utilisateur connecté y a acess
  $technote->verifyUser($session->getUserID());

  // recupere les infos pour le header
  $header = $technote->getInfos();

?>


    <div class="container">

      <div class="row top-40">
        <div class="col-12">
          <h1>Partager par mail la fiche <small><?= $header["band"] ?></small></h1>
        </div>
      </div>

      <div class="row">
        <div id="errors" class="col-12">

        </div>
      </div>

      <div class="row">

        <div class="col-12 top-40">
          <h3>Destinataire</h3>
          <div class="input-group">
            <input type="email" name="email" class="form-control" placeholder="email du destinataire">
          </div>
        </div>

      <div class="row top-40">

        <div class="col-12 text-right">
          <button type="button" id="submit" class="btn btn-primary btn-lg">Envoyer le mail</button>
        </div>

      </div>

    </div>
