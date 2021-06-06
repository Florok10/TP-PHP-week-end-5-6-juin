<?php require_once('./controller/Login.php');  //requiert une fois Login.php ?>
<?php
  $Login = new Login(); //on définit la var $Login comme étant un nouvel objet Login
  $Response = []; //$ on définit la var $Response comme étant un tableau vide
  $active = $Login->active; // on définit la var $active comme étant : $Login (nouvel objet Login)qui utilise la variable active
  if (isset($_POST) && count($_POST) > 0) $Response = $Login->login($_POST); //condition qui vérifie si une méthode POST a été utilisé et en comptant si c'est supérieur
                                                                                //à ensuite définit la var $Response comme étant $Login qui utulise la fonction
                                                                                // login() qui a pour param $_POST
?>
  <?php require('./nav.php'); //requiert nav.php ?>
    <main role="main" class="container">
      <div class="container">
        <div class="row justify-content-center mt-10">
          <div class="col-xs-12 col-sm-12 col-md-12 col-xl-4 col-lg-4 center-align center-block">
            <?php if (isset($Response['status']) && !$Response['status']) : //une condition qui vérifie que $Response est établi et a dans son tableau 'status' et que
                                                                            // ceest différent de 'status' dans la variable $Response, là j'ai pas compris le code
                                                                            // mais je voir plus ou moins ce que ça veut dire ?>
            <div class="alert alert-danger" role="alert">
              <span><B>Oops!</B> Invalid Credentials Used.</span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" class="text-danger">&times;</span>
              </button>
            </div>
            <?php endif; //fin de la condition ?>
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
              <form method="post" action="<?php echo $_SERVER['PHP_SELF']; //on définit l'endroit où va être traiter le form, echo pour afficher le chemin
                                                                            //contenue dans la variable php $_SERVER et dans son tableau qui se cible elle même
                                                                             ?>" class="form-signin">
              <h4 class="h3 mb-3 font-weight-normal text-center">Sign in</h4>
              <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                <div class="form-group">
                  <label for="inputEmail" class="sr-only">Email address</label>
                  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12">
                <div class="form-group">
                  <label for="inputPassword" class="sr-only">Password</label>
                  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12">
                <button class="btn btn-md btn-primary btn-block" type="submit">Sign in</button>
              </div>
              <p class="mt-5 text-center mb-3 text-muted">&copy; Ilori Stephen A <?php echo date('Y'); //affiche la date 'y' doit correspondre à l'année ?></p>
            </form>
            </div>
          </div>
        </div>
      </div>
    </main>
  </body>
  </html>
