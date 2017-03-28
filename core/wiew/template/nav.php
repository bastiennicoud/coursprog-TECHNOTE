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
        <a class="nav-link disabled" href="#"><?= $session->getUser(); ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="dashboard">Mes fiches techniques</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="disconnect">Déconnexion</a>
      </li>
    </ul>

  </div>
</nav>
