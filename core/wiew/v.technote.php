<?php

  // on initialise l'objet technote (qui permet d'acceder a toutes les infos d'une fiche tech)
  $technote = new technote($_POST["id"]);

  // on vérifie que l'utilisateur connecté y a acess
  $check = $technote->verifyPin($_POST["pin"]);

  if ($check !== true) {
    header("Location: technote?id=" . $_POST["id"]);
  }

  // recupere les infos pour le header
  $header = $technote->getHeader();

?>

    <!-- Header de la page -->
    <div id="tech-background" style="background-image: url(img/cover/<?= $header["image"] ?>);">
      <div class="container centred">
        <div class="row">
          <h2 class="text-center max-width fff">Fiche technique</h2>
        </div>
        <div class="row">
          <h1 class="text-center max-width fff big"><?= $header["name"] ?></h1>
        </div>
        <div class="row">
          <h2 class="text-center max-width fff"><?= $header["date"] ?></h2>
        </div>
      </div>
    </div>

<?php

  $description = $technote->getDescription();

?>

    <!-- description du groupe -->
    <div class="bg-dark">
      <div class="container padd-40">

        <div class="row">
          <div class="col-12">
            <h2>Descriptif du groupe</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <p><?= $description["description"] ?></p>
          </div>
        </div>

      </div>
    </div>

<?php

  $contacts = $technote->getContacts();

?>

    <!-- Personnes de contact -->
    <div class="container padd-40">

      <div class="row">
        <div class="col-12">
          <h2>Personnes de contact</h2>
        </div>
      </div>

      <div class="row top-10">


<?php foreach ($contacts["contacts"] as $key => $value) { ?>

          <div class="col-sm-4">
            <div class="box">
              <h4><?= $value->name ?></h4>
              <p><?= $value->function ?></p>
              <p><?= $value->email ?></p>
              <p><?= $value->phone ?></p>
              <p><?= $value->website ?></p>
            </div>
          </div>

<?php } ?>

      </div>

    </div>

<?php

  $comments = $technote->getComments();

?>
    <!-- Partie commentaires -->
    <div class="bg-dark">
      <div class="container padd-40">

        <div class="row">
          <div class="col-12">
            <h2>Informations</h2>
          </div>
        </div>

        <div class="row top-10">

<?php foreach ($comments["comments"] as $key => $value) { ?>

          <div class="col-sm-6 top-20">
            <div class="box inverse">
              <h4><?= $value->title ?></h4>
              <p class="font-weight-bold"><?= $value->head ?></p>
              <p><?= $value->commentar ?></p>
            </div>
          </div>

<?php } ?>

        </div>

      </div>
    </div>

<?php

  $patch = $technote->getPatch();

?>

    <!-- Patchlist -->
    <div class="container padd-40">

      <div class="row">
        <div class="col-12">
          <h2>Patchlist</h2>
        </div>
      </div>

      <div class="row top-10">
        <div class="col-12">

          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Instrument</th>
                <th>Microphone</th>
                <th>FX / insert</th>
                <th>monitor MIX</th>
              </tr>
            </thead>
            <tbody>

<?php foreach ($patch as $key => $value) { ?>

              <tr>
                <th scope="row"><?= $value->input ?></th>
                <td><?= $value->instrument ?></td>
                <td><?= $value->microphone ?></td>
                <td><?= $value->fx ?></td>
                <td><?= $value->monitormix ?></td>
              </tr>

<?php } ?>

            </tbody>
          </table>

        </div>
      </div>

    </div>

<?php

  $musicians = $technote->getMusicians();

?>

    <!-- Musiciens et plan de scene -->
    <div class="bg-dark">
      <div class="container padd-40">

        <div class="row">
          <div class="col-12">
            <h2>Musiciens et Plateau</h2>
          </div>
        </div>

        <div class="row top-10">

          <div class="col-md-8">
            <img src="img/plan/<?= $technote->getPlan() ?>" width="100%" alt="Plan de scene">
          </div>

          <div class="col-md-4">

            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Instrument</th>
                </tr>
              </thead>
              <tbody>

<?php foreach ($musicians as $key => $value) { ?>

              <tr>
                <td><?= $value->name ?></td>
                <td><?= $value->instrument ?></td>
              </tr>

<?php } ?>

              </tbody>
            </table>

          </div>

        </div>

      </div>
    </div>

    <footer>
      <div class="container">
        <div class="row top-10 bot-10">

          <div class="col-sm-4">
            <img src="img/logo.svg" height="40px" alt="Logo TECHNOTE">
          </div>

          <div class="col-sm-4 top-10">
            <p class="text-center"></p>
          </div>

          <div class="col-sm-4 top-10">
            <p class="text-right"><a href="login">Editer</a></p>
          </div>

        </div>
      </div>
    </footer>
