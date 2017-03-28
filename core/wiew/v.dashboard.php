<div class="container">

  <div class="row top-40">
    <div class="col-10">
      <h1>Vos fiches techniques</h1>
    </div>
    <div class="col-2">
      <a class="btn btn-primary float-right" href="new">Nouvelle</a>
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

        <?php
          $technotes = new technoteinfos($session->getUser(), $session->getUserID());

          echo $technotes->getCard();
        ?>

      </div>
    </div>
  </div>

</div>
