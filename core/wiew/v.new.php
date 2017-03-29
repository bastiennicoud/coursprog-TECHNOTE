    <div class="container">

      <div class="row top-40">
        <div class="col-12">
          <h1>Nouvelle fiche technique</h1>
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
            <input type="text" name="name" class="form-control" placeholder="Nom de la fiche tech">
            <span class="input-group-btn">
              <button type="button" class="btn btn-info" data-toggle="name" title="Nom" data-content="Ce nom sérvira uniquement pour l'organisation des fiches techniques, il n'aparaitra pas sur la fiche technique.">i</button>
            </span>
          </div>
          <br>
          <div class="form-group">
            <textarea class="form-control" name="techdescription" rows="3" placeholder="Description"></textarea>
          </div>
          <div class="input-group">
            <input type="text" name="pin" class="form-control" placeholder="Pin">
            <span class="input-group-btn">
              <button type="button" class="btn btn-info" data-toggle="pin" title="Pin" data-content="Entrez un code pin a 4 chiffres, les personnes voulant visualiser votre fiche technique devront rentrer ce code.">i</button>
            </span>
          </div>
        </div>

        <div class="col-sm-6 top-40">
          <h3>Informations du groupe</h3>
          <div class="input-group">
            <input type="text" name="bandname" class="form-control" placeholder="Nom du groupe">
            <span class="input-group-btn">
              <button type="button" class="btn btn-info" data-toggle="bandname" data-placement="left" title="Nom du groupe" data-content="Précisez le nom du groupe concérné par la fiche technique.">i</button>
            </span>
          </div>
          <br>
          <div class="form-group">
            <input type="date" name="date" class="form-control">
          </div>
          <br>
          <div class="form-group">
            <textarea class="form-control" name="banddescription" rows="3" placeholder="Descriptif du style du groupe."></textarea>
          </div>
          <br>
          <div class="form-group">
            <label for="exampleInputFile">Image du groupe</label>
            <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Choisisez une image pour illustrer votre fiche technique.</small>
          </div>
        </div>

      </div>

      <div class="row top-40">

        <div class="col-12 text-right">
          <button id="submit" type="button" name="submit" class="btn btn-primary btn-lg">Créer la fiche</button>
        </div>

      </div>

    </div>
