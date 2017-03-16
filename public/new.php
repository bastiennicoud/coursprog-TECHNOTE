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



    <div class="container">

      <div class="row top-40">
        <div class="col-12">
          <h1>Nouvelle fiche technique</h1>
        </div>
      </div>

      <div class="row">

        <div class="col-sm-6">
          <h3>Informations générales</h3>
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Nom de la fiche tech">
            <span class="input-group-btn">
              <button type="button" class="btn btn-info" data-toggle="name" title="Nom" data-content="Ce nom sérvira uniquement pour l'organisation des fiches techniques, il n'aparaitra pas sur la fiche technique.">i</button>
            </span>
          </div>
          <br>
          <div class="form-group">
            <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Description"></textarea>
          </div>
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Pin">
            <span class="input-group-btn">
              <button type="button" class="btn btn-info" data-toggle="pin" title="Pin" data-content="Entrez un code pin a 4 chiffres, les personnes voulant visualiser votre fiche technique devront rentrer ce code.">i</button>
            </span>
          </div>
        </div>

        <div class="col-sm-6">
          <h3>Informations du groupe</h3>
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Nom du groupe">
            <span class="input-group-btn">
              <button type="button" class="btn btn-info" data-toggle="bandname" data-placement="left" title="Nom du groupe" data-content="Précisez le nom du groupe concérné par la fiche technique.">i</button>
            </span>
          </div>
          <br>
          <div class="form-group">
            <input type="date" class="form-control" placeholder="Nom du groupe">
          </div>
          <br>
          <div class="form-group">
            <label for="exampleInputFile">Image du groupe</label>
            <input type="file" class="form-control-file btn" id="exampleInputFile" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Choisisez une image pour illustrer votre fiche technique.</small>
          </div>
        </div>

      </div>

    </div>

    <!-- Diférents scripts -->
    <script src="js/jquery.js"></script>
    <script src="js/tether/js/tether.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
