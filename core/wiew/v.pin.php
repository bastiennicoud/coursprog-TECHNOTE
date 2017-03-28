<div id="home-background">

  <div class="container max-height">

    <div class="row justify-content-center max-height">

      <div id="login-box" class="col-12 col-sm-8 col-md-6 col-xl-4 align-self-center">

        <img src="img/logo.svg" alt="logo">

        <div class="row">
          <div class="col-12">
            <h3 class="text-center">Afficher la fiche-technique</h3>
          </div>
        </div>

        <div class="row">
          <div id="errors" class="col-12">

          </div>
        </div>

        <form action="technote" method="post">
          <input style="display: none;" type="text" name="id" value="<?= $_GET['id'] ?>">
          <div class="row">
            <div class="input-group input-group-lg">
              <input type="password" name="pin" class="form-control" placeholder="Code PIN">
              <span class="input-group-btn">
                <button id="submit" class="btn btn-primary" type="submit">Go!</button>
              </span>
            </div>
          </div>
        </form>

        <div class="row top-10">
          <div id="success" class="col-12">

          </div>
        </div>

        <div class="row">
          <div class="col-12">
           <p class="text-center">Créez vos propres fiches techniques : <a href="register">inscrivez-vous</a></p>
          </div>
        </div>

      </div>

    </div>

  </div>

</div>
