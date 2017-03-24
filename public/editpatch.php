<!doctype html>
<html lang="fr">
<html>
  <head>

    <!-- Charset et wiewport -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Mots clefs et description -->
    <meta name="keywords" content="technical, note, stage, plan, patch, list">
    <meta name="description" content="App de gestion en ligne de fiches téchniques.">

    <!-- Titre et favicon -->
    <title>TECHNOTE</title>
    <link rel="icon" type="image/png" href="img/icon.png">

    <!-- Styles CSS (normalize + grille bootstrap) -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/app.css">

  </head>
  <body>

    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img src="img/logo.svg" height="30" class="d-inline-block align-top" alt="">
      </a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">

          <li class="nav-item">
            <a class="nav-link disabled" href="#">ADMIN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Mes fiches techniques</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Déconnexion</a>
          </li>
        </ul>

        <form class="form-inline my-2 my-lg-0">
          <div class="input-group">
            <input class="form-control" type="text" placeholder="Rechercher">
            <span class="input-group-btn">
              <button class="btn btn-primary" type="button">Go!</button>
            </span>
          </div>

        </form>

      </div>
    </nav>



    <div class="container-fluid">

      <div class="row top-40">
        <div class="col-12">
          <h1>Editer le patch <small>Phill Collins</small></h1>
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
                <th>Controls</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>1</th>
                <td>Kick in</td>
                <td>Beta 91a</td>
                <td>Comp/gate</td>
                <td>1 drum</td>
                <td>
                  <button type="button" name="edit" class="btn btn-info btn-sm">Editer</button>
                  <button type="button" name="edit" class="btn btn-danger btn-sm">Suppr</button>
                </td>
              </tr>
              <tr>
                <th>2</th>
                <td>Kick out</td>
                <td>AUDIX D6</td>
                <td>Comp/gate</td>
                <td>1 drum</td>
                <td>
                  <button type="button" name="edit" class="btn btn-info btn-sm">Editer</button>
                  <button type="button" name="edit" class="btn btn-danger btn-sm">Suppr</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="row top-40">
        <div class="col-12">
          <h3>Nouvelle piste</h3>
        </div>
      </div>

      <div class="row top-10">

        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="form-control" name="channel" placeholder="channel">
          </div>
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="form-control" name="mic" placeholder="Microphone">
          </div>
        </div>

        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="form-control" name="instrument" placeholder="Instrument">
          </div>
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="form-control" name="fx" placeholder="FX / insert">
          </div>
        </div>

      </div>

      <div class="row top-10">
        <div class="col-12">
          <div class="input-group">
            <input type="text" class="form-control" name="web" placeholder="Site web">
          </div>
        </div>
      </div>

      <div class="row top-10">

        <div class="col-12 text-right">
          <button type="button" name="clear" class="btn btn-warning btn-lg">Vider</button>
          <button type="button" name="send" class="btn btn-primary btn-lg">Ajouter cette piste</button>
        </div>

      </div>

    </div>

    <!-- Diférents scripts -->
    <script src="js/jquery.js"></script>
    <script src="js/tether/js/tether.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="js/new.js"></script>
  </body>
</html>
