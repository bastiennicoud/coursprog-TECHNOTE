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
                <th>#</th>
                <th>Nom</th>
                <th>Fonction</th>
                <th>E-mail</th>
                <th>Téléphone</th>
                <th>WEB</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Jean edouard</td>
                <td>Ingénieur facade</td>
                <td>jean@events.com</td>
                <td>0793234556</td>
                <td><a href="#">LINK</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <h3>Nouveau contact</h3>
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
          <button type="button" name="clear" class="btn btn-warning btn-lg">Vider</button>
          <button type="button" name="send" class="btn btn-primary btn-lg">Ajouter ce contact</button>
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
