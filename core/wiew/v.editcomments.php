<?php

// on initialise l'objet technote (qui permet d'acceder a toutes les infos d'une fiche tech)
$technote = new technote($session->getEdit());

// on vérifie que l'utilisateur connecté y a acess
$technote->verifyUser($session->getUserID());

// recupere les infos pour le header
$header = $technote->getComments();

?>
    <div class="container">

      <div class="row top-40">
        <div class="col-12">
          <h1>Editer les informations complémentaires <small><?= $technote->getName() ?></small></h1>
        </div>
      </div>

      <div class="row top-10">
        <div class="col-12">
          <h3>Vos commentaires</h3>
        </div>
      </div>

      <div class="row top-10">
        <div class="col-12">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Titre</th>
                <th>Chapeau</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if (!empty($header["comments"])) {

                  foreach ($header["comments"] as $key => $value) {
                    ?>
                    <tr>
                      <td><?= $value->title ?></td>
                      <td><?= $value->head ?></td>
                    </tr>
                    <?php
                  }
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <h3>Nouveau commentaire</h3>
        </div>
      </div>

      <div class="row">
        <div id="errors" class="col-12">

        </div>
      </div>

      <div class="row top-40">

        <div class="col-sm-6">
          <div class="input-group">
            <input type="text" class="form-control" name="title" placeholder="Titre">
          </div>
        </div>

        <div class="col-sm-6">
          <div class="input-group">
            <input type="text" class="form-control" name="head" placeholder="Chapeau">
          </div>
        </div>

      </div>

      <div class="row top-10">
        <div class="col-12">
          <div class="form-group">
            <textarea class="form-control" name="comment" rows="10" placeholder="Commentaire"></textarea>
          </div>
        </div>
      </div>

      <div class="row top-40">

        <div class="col-12 text-right">
          <a class="btn btn-warning btn-lg" href="edit">Revenir</a>
          <button type="button" id="submit" class="btn btn-primary btn-lg">Ajouter ce commentaire</button>
        </div>

      </div>

    </div>
