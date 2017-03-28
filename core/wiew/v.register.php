<!-- Appel du header -->
<?php require '../core/wiew/template/header.php'; ?>


    <div id="home-background">

      <div class="container max-height">

        <div class="row justify-content-center max-height">

          <div id="login-box" class="col-12 col-sm-8 col-md-6 col-xl-4 align-self-center">

            <img src="img/logo.svg" alt="logo">

            <div class="row">
              <div class="col-12">
                <h3 class="text-center">Inscription</h3>
              </div>
            </div>

            <div class="row">
              <div id="errors" class="col-12">

              </div>
            </div>

            <div class="row">
              <div class="input-group input-group-lg">
                <input type="text" name="username" class="form-control" placeholder="Nom d'utilisateur">
              </div>
            </div>

            <div class="row">
              <div class="input-group input-group-lg">
                <input type="text" name="email" class="form-control" placeholder="E-mail">
              </div>
            </div>

            <div class="row">
              <div class="input-group input-group-lg">
                <input type="password" name="password" class="form-control" placeholder="Mot de passe">
              </div>
            </div>

            <div class="row">
              <div class="input-group input-group-lg">
                <input type="password" name="passwordconfirm" class="form-control" placeholder="Confirmez le mot de passe">
                <span class="input-group-btn">
                  <button id="submit" class="btn btn-primary" type="button">Go!</button>
                </span>
              </div>
            </div>

            <div class="row top-10">
              <div id="success" class="col-12">

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
    <script src="js/register.js"></script>
  </body>
</html>
