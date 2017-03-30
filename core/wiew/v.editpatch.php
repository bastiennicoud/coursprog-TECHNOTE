<?php

// on initialise l'objet technote (qui permet d'acceder a toutes les infos d'une fiche tech)
$technote = new technote($session->getEdit());

// on vérifie que l'utilisateur connecté y a acess
$technote->verifyUser($session->getUserID());

// recupere les infos pour le header
$patch = $technote->getPatch();

?>
    <div class="container-fluid">

      <div class="row top-40">
        <div class="col-12">
          <h1>Editer le patch <small><?= $technote->getName() ?></small></h1>
        </div>
      </div>

      <div class="row top-10">
        <div class="col-12">
          <h3>Patchlist</h3>
        </div>
      </div>

      <div class="row top-10">
        <div class="col-12">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>channel</th>
                <th>Instrument</th>
                <th>Microphone</th>
                <th>FX / insert</th>
                <th>Monnitor mix</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if (!empty($patch)) {

                  foreach ($patch as $key => $value) {
                    ?>
                    <tr>
                      <td><?= $value->input ?></td>
                      <td><?= $value->instrument ?></td>
                      <td><?= $value->microphone ?></td>
                      <td><?= $value->fx ?></td>
                      <td><?= $value->monitormix ?></td>
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

        <div class="col-sm-1">
          <div class="input-group">
            <input type="text" class="form-control" name="channel" placeholder="channel">
          </div>
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="form-control" name="instrument" placeholder="Instrument">
          </div>
        </div>

        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="form-control" name="mic" placeholder="Microphone">
          </div>
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="form-control" name="fx" placeholder="FX / insert">
          </div>
        </div>
        <div class="col-sm-2">
          <div class="input-group">
            <input type="text" class="form-control" name="monmix" placeholder="Monitor mix">
          </div>
        </div>
      </div>

      <div class="row top-40">

        <div class="col-12 text-right">
          <a class="btn btn-warning btn-lg" href="edit">Revenir</a>
          <button type="button" id="submit" class="btn btn-primary btn-lg">Ajouter cette piste</button>
        </div>

      </div>

    </div>
