<?php
  $infos = new technoteinfos($session->getUser(), $session->getUserID());
?>

    <div class="container">

      <div class="row top-40">
        <div class="col-12">
          <h1>Editer votre fiche technique</h1>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <h3><?= $infos->getTechName($session->getEdit()) ?></h3>
        </div>
      </div>

      <div class="row top-10">
        <div class="col-3">
          <a href="editinfos.php" class="btn btn-info">Editer les informations</a>
        </div>
        <div class="col-3">
          <a href="editcontacts.php" class="btn btn-info">Editer les contatcs</a>
        </div>
      </div>
      <div class="row top-10">
        <div class="col-3">
          <a href="editcomments.php" class="btn btn-info">Editer les commentaires</a>
        </div>
        <div class="col-3">
          <a href="#" class="btn btn-info">Ajouter un plan de scene</a>
        </div>
      </div>
      <div class="row top-10">
        <div class="col-3">
          <a href="editpatch.php" class="btn btn-info">Editer le patch</a>
        </div>
        <div class="col-3">
          <a href="editzicos" class="btn btn-info">Editer les musiciens</a>
        </div>
      </div>

      <div class="row top-40">
        <div class="col-12">
          <h3>Ajout du plan de scene</h3>
          <div class="form-group">
            <label for="exampleInputFile">Votre image</label>
            <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Cette image renseigne sur la position des musiciens et du matériel sur scène</small>
          </div>
          <div class="col-3">
            <button class="btn btn-info">Uploader</button>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Image du groupe</label>
            <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Choisisez une image pour illustrer votre fiche technique.</small>
          </div>
          <div class="col-3">
            <button class="btn btn-info">Uploader</button>
          </div>
        </div>
      </div>

    </div>
