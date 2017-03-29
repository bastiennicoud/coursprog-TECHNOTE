<?php

  // on initialise l'objet technote (qui permet d'acceder a toutes les infos d'une fiche tech)
  $technote = new technote($session->getEdit());

  // on vérifie que l'utilisateur connecté y a acess
  $technote->verifyUser($session->getUserID());

  // recupere les infos pour le header
  $header = $technote->getInfos();

?>

    <div class="container">

      <div class="row top-40">
        <div class="col-12">
          <h1>Editer les informations <small><?= $header["band"] ?></small></h1>
        </div>
      </div>

      <div class="row">
        <div id="errors" class="col-12">

        </div>
      </div>

      <div class="row">

        <div class="col-sm-6 top-40">
          <h3>Informations générales</h3>
          <div class="input-group">
            <input type="text" name="name" class="form-control" placeholder="Nom de la fiche tech" value="<?= $header["name"] ?>">
            <span class="input-group-btn">
              <button type="button" class="btn btn-info" data-toggle="name" title="Nom" data-content="Ce nom sérvira uniquement pour l'organisation des fiches techniques, il n'aparaitra pas sur la fiche technique.">i</button>
            </span>
          </div>
          <br>
          <div class="form-group">
            <textarea class="form-control" name="techdescription" rows="3" placeholder="Description"><?= $header["description"] ?></textarea>
          </div>
          <div class="input-group">
            <input type="text" class="form-control" name="pin" placeholder="Pin" value="<?= $header["pincode"] ?>">
            <span class="input-group-btn">
              <button type="button" class="btn btn-info" data-toggle="pin" title="Pin" data-content="Entrez un code pin a 4 chiffres, les personnes voulant visualiser votre fiche technique devront rentrer ce code.">i</button>
            </span>
          </div>
        </div>

        <div class="col-sm-6 top-40">
          <h3>Informations du groupe</h3>
          <div class="input-group">
            <input type="text" class="form-control" name="bandname" placeholder="Nom du groupe" value="<?= $header["band"] ?>">
            <span class="input-group-btn">
              <button type="button" class="btn btn-info" data-toggle="bandname" data-placement="left" title="Nom du groupe" data-content="Précisez le nom du groupe concérné par la fiche technique.">i</button>
            </span>
          </div>
          <br>
          <div class="form-group">
            <input type="date" class="form-control" name="date" value="<?= $header["date"] ?>">
          </div>
          <br>
          <div class="form-group">
            <textarea class="form-control" name="banddescription" rows="3" placeholder="Descriptif du style du groupe."><?= $header["descriptio"] ?></textarea>
          </div>
        </div>

      </div>

      <div class="row top-40">

        <div class="col-12 text-right">
          <a class="btn btn-warning btn-lg" href="edit">Revenir</a>
          <button type="button" id="submit" class="btn btn-primary btn-lg">Modifier la fiche</button>
        </div>

      </div>

    </div>
