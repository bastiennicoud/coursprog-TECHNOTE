<?php

// on initialise l'objet technote (qui permet d'acceder a toutes les infos d'une fiche tech)
$technote = new technote($session->getEdit());

// on vérifie que l'utilisateur connecté y a acess
$technote->verifyUser($session->getUserID());

// recupere les infos pour le header
$header = $technote->getContacts();

?>
    <div class="container">

      <div class="row top-40">
        <div class="col-12">
          <h1>Editer les contacts <small>Phill Collins</small></h1>
        </div>
      </div>

      <div class="row top-10">
        <div class="col-12">
          <h3>Vos contacts</h3>
        </div>
      </div>

      <div class="row top-10">
        <div class="col-12">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Nom</th>
                <th>Fonction</th>
                <th>E-mail</th>
                <th>Téléphone</th>
                <th>WEB</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if (!empty($header["contacts"])) {

                  foreach ($header["contacts"] as $key => $value) {
                    ?>
                    <tr>
                      <td><?= $value->name ?></td>
                      <td><?= $value->function ?></td>
                      <td><?= $value->email ?></td>
                      <td><?= $value->phone ?></td>
                      <td><a href="<?= $value->website ?>"><?= $value->website ?></a></td>
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
          <h3>Nouveau contact</h3>
        </div>
      </div>

      <div class="row">
        <div id="errors" class="col-12">

        </div>
      </div>

      <div class="row top-40">

        <div class="col-sm-6">
          <div class="input-group">
            <input type="text" class="form-control" name="name" placeholder="Nom complet">
          </div>
          <br>
          <div class="input-group">
            <input type="text" class="form-control" name="email" placeholder="E-mail">
          </div>
          <br>
          <div class="input-group">
            <input type="text" class="form-control" name="web" placeholder="Site web">
          </div>
        </div>

        <div class="col-sm-6">
          <div class="input-group">
            <input type="text" class="form-control" name="function" placeholder="Fonction">
          </div>
          <br>
          <div class="input-group">
            <input type="text" class="form-control" name="phone" placeholder="Numéro de téléphone">
          </div>
        </div>

      </div>

      <div class="row top-40">

        <div class="col-12 text-right">
          <a class="btn btn-warning btn-lg" href="edit">Revenir</a>
          <button type="button" id="submit" class="btn btn-primary btn-lg">Ajouter ce contact</button>
        </div>

      </div>

    </div>
