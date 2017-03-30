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
        <div class="col-6">
          <a href="editinfos" class="btn btn-info">Editer les informations</a>
        </div>
        <div class="col-6">
          <a href="editcontacts" class="btn btn-info">Editer les contatcs</a>
        </div>
      </div>
      <div class="row top-10">
        <div class="col-6">
          <a href="editcomments" class="btn btn-info">Editer les commentaires</a>
        </div>
      </div>
      <div class="row top-10">
        <div class="col-6">
          <a href="editpatch" class="btn btn-info">Editer le patch</a>
        </div>
        <div class="col-6">
          <a href="editzicos" class="btn btn-info">Editer les musiciens</a>
        </div>
      </div>

      <div class="row top-40">
        <div class="col-sm-6">

          <h3>Ajout du plan de scene</h3>
          <div id="stageplanerrors">

          </div>

          <form id="stageplan" class="form-group" method="post" action="uploadstageplan" enctype="multipart/form-data">
            <label for="satgeplan">Votre image</label>
            <input type="file" class="form-control-file" name="image" accept="image/*">
            <small id="fileHelp1" class="form-text text-muted">Cette image renseigne sur la position des musiciens et du matériel sur scène</small>
            <button class="btn btn-info" type="submit">Upload</button>
          </form>

        </div>
        <div class="col-sm-6">

          <h3>Ajout d'une image de groupe</h3>
          <div id="bandimageerrors">

          </div>

          <form id="bandimage" class="form-group" method="post" action="uploadbandimage" enctype="multipart/form-data">
            <label for="bandimage">Votre image</label>
            <input type="file" class="form-control-file" name="image" accept="image/*">
            <small id="fileHelp2" class="form-text text-muted">Cette image renseigne sur la position des musiciens et du matériel sur scène</small>
            <button class="btn btn-info" type="submit">Upload</button>
          </form>

        </div>
      </div>

    </div>
