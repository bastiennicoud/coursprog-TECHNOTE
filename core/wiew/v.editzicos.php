<?php

// on initialise l'objet technote (qui permet d'acceder a toutes les infos d'une fiche tech)
$technote = new technote($session->getEdit());

// on vérifie que l'utilisateur connecté y a acess
$technote->verifyUser($session->getUserID());

// recupere les infos pour le header
$musicians = $technote->getMusicians();

?>
    <div class="container-fluid">

      <div class="row top-40">
        <div class="col-12">
          <h1>Editer les musiciens <small><?= $technote->getName() ?></small></h1>
        </div>
      </div>

      <div class="row top-10">
        <div class="col-12">
          <h3>Liste des musiciens</h3>
        </div>
      </div>

      <div class="row top-10">
        <div class="col-12">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Nom complet</th>
                <th>Instrument</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if (!empty($musicians)) {

                  foreach ($musicians as $key => $value) {
                    ?>
                    <tr>
                      <td><?= $value->name ?></td>
                      <td><?= $value->instrument ?></td>
                    </tr>
                    <?php
                  }
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="row top-40">
        <div class="col-12">
          <h3>Nouvelle piste</h3>
        </div>
      </div>

      <div class="row">
        <div id="errors" class="col-12">

        </div>
      </div>

      <div class="row top-10">

        <div class="col-sm-6">
          <div class="input-group">
            <input type="text" class="form-control" name="name" placeholder="Nom complet">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="input-group">
            <input type="text" class="form-control" name="instrument" placeholder="Instrument">
          </div>
        </div>

      </div>

      <div class="row top-10">

        <div class="col-12 text-right">
          <a class="btn btn-warning btn-lg" href="edit">Revenir</a>
          <button type="button" id="submit" class="btn btn-primary btn-lg">Ajouter ce musicien</button>
        </div>

      </div>

    </div>
