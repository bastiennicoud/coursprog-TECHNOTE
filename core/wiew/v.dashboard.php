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
            <a class="nav-link active" href="dashboard">Mes fiches techniques</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="disconnect">Déconnexion</a>
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
        <div class="col-10">
          <h1>Vos fiches techniques</h1>
        </div>
        <div class="col-2">
          <a class="btn btn-primary float-right" href="new.php">Nouvelle</a>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <p>Voici la liste de toutes vos fiches techniques!</p>
        </div>
      </div>

      <div class="row top-40">
        <div class="col-12">
          <div class="card-columns">

            <div class="card">
              <img class="card-img-top img-fluid" src="img/live.JPG" alt="Card image cap">
              <div class="card-block">
                <h4 class="card-title">Phill Collins</h4>
                <p class="card-text">Une brève description de quelques mots</p>
                <p class="card-text">Code pin <span class="badge badge-default">5674</span></p>
                <p class="card-text">Lien de partage : <a href="#" class="card-link">link</a></p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>

              <div class="card-block">
                  <a href="#" class="btn btn-info">Prévisualiser</a>
              </div>

              <div class="card-footer">
                <a href="#" class="btn btn-primary">Editer</a>
                <a href="#" class="btn btn-danger">Supprimer</a>
              </div>
            </div>

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
