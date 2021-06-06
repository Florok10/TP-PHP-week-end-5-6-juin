<?php require_once('./controller/Register.php'); //requiert une fois Register.php ?>
<?php
  $Register = new Register(); //on instancie l'objet Register
  $Response = []; //on définit $Response comme étant un tableau vide
  $active = $Register->active; // on définit $active comme étant $Register qui utilise $active
  if (isset($_POST) && count($_POST) > 0) $Response = $Register->register($_POST); //condition qui vérifie qu'un post a été utilisé et si supérieur à 0, définit $Response comme étant
                                                                                              //$Register qui utilise la fonction register() avec pour param $_POST
?>
<?php require('./nav.php'); // requiert nav.php ?>
  <main role="main" class="container">
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-4 col-lg-4 center-align center-block">
          <?php if (isset($Response['status']) && !$Response['status']) : //une condition qui vérifie si $Reponse 'status' est établi et que $Response est différent de
                                                                                          //status?>
          <br>
          <div class="alert alert-danger" role="alert">
            <span><B>Oops!</B> Some errors occurred in your form.</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true" class="text-danger">&times;</span>
            </button>
          </div>
          <?php endif; // fin de if?>
          <div class="card shadow-lg p-3 mb-5 bg-white rounded">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-signin">
            <h4 class="h3 mb-3 font-weight-normal text-center">Register</h4>
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
              <div class="form-group">
                <label for="inputName" class="sr-only">Names</label>
                <input type="text" id="inputName" class="form-control" placeholder="Enter Full Name" name="name" required autofocus value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>">
                <?php if (isset($Response['name']) && !empty($Response['name'])): //une condition qui vérifie si $Reponse 'name' est établi et que $Response est différent de
                                                                                          //vide?>
                  <small class="text-danger"><?php echo $Response['name']; //affiche le 'nom' contenu dans le tableau de la var $Response?></small>
                <?php endif; //fin de if?>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
              <div class="form-group">
                <label for="inputEmail" class="sr-only">Email</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Enter Email Address" name="email" required autofocus value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
                <?php if (isset($Response['email']) && !empty($Response['email'])): //une condition qui vérifie si $Reponse 'email' est établi et que $Response est différent de
                                                                                          //vide?>
                  <small class="text-danger"><?php echo $Response['email']; //affiche le 'email' contenu dans le tableau de la var $Response?></small>
                <?php endif; //fin de if?>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
              <div class="form-group">
                <label for="inputPhone" class="sr-only">Phone Number</label>
                <input type="text" id="inputPhone" class="form-control" placeholder="Enter Phone" name="phone" required autofocus value="<?php if (isset($_POST['phone'])) echo $_POST['phone'] ?>">
                <?php if (isset($Response['phone']) && !empty($Response['phone'])): //une condition qui vérifie si $Reponse 'phone' est établi et que $Response est différent de
                                                                                          //vide?>
                  <small class="text-danger"><?php echo $Response['phone'];//affiche le 'phone' contenu dans le tableau de la var $Response ?></small>
                <?php endif; //fin de if?>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12">
              <div class="form-group">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <?php if (isset($Response['password']) && !empty($Response['password'])): //une condition qui vérifie si $Reponse 'password' est établi et que $Response est différent de
                                                                                          //vide?>
                  <small class="text-danger"><?php echo $Response['password']; //affiche le 'password' contenu dans le tableau de la var $Response?></small>
                <?php endif; //fin de if?>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12">
              <button class="btn btn-md btn-primary btn-block" type="submit">Register</button>
            </div>
            <p class="mt-5 text-center mb-3 text-muted">&copy; Ilori Stephen A <?php echo date('Y'); //affiche la date 'y' donc l'année y pour year?></p>
          </form>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
