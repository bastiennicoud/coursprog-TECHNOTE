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
          <a href="editinfos" class="btn btn-info">Editer les informations</a>
        </div>
        <div class="col-3">
          <a href="editcontacts" class="btn btn-info">Editer les contatcs</a>
        </div>
      </div>
      <div class="row top-10">
        <div class="col-3">
          <a href="editcomments" class="btn btn-info">Editer les commentaires</a>
        </div>
        <div class="col-3">
          <a href="#" class="btn btn-info">Ajouter un plan de scene</a>
        </div>
      </div>
      <div class="row top-10">
        <div class="col-3">
          <a href="editpatch" class="btn btn-info">Editer le patch</a>
        </div>
        <div class="col-3">
          <a href="editzicos" class="btn btn-info">Editer les musiciens</a>
        </div>
      </div>

      <div class="row top-40">
        <div class="col-12">
          <h3>Ajout du plan de scene</h3>

          <form id="stageplan" class="form-group" method="post" action="uploadstageplan" enctype="multipart/form-data">
            <label for="exampleInputFile">Votre image</label>
            <input type="file" class="form-control-file" name="image" accept="image/*">
            <small id="fileHelp1" class="form-text text-muted">Cette image renseigne sur la position des musiciens et du matériel sur scène</small>
            <button class="btn btn-info" type="submit">Upload</button>
          </form>


          <div class="form-group">
            <label for="exampleInputFile">Votre image</label>
            <input type="file" class="form-control-file" id="stageplan" aria-describedby="fileHelp">
            <small id="fileHelp1" class="form-text text-muted">Cette image renseigne sur la position des musiciens et du matériel sur scène</small>
          </div>
          <div class="col-3">
            <button id="upload1" class="btn btn-info">Uploader</button>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Image du groupe</label>
            <input type="file" class="form-control-file" id="bandimage" aria-describedby="fileHelp">
            <small id="fileHelp2" class="form-text text-muted">Choisisez une image pour illustrer votre fiche technique.</small>
          </div>
          <div class="col-3">
            <button id="upload2" class="btn btn-info">Uploader</button>
          </div>
        </div>
      </div>

    </div>
