<?php require_once('./config.php'); //requiert une fois config.php ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="application-name" content="LD Talent Login Project">
    <meta name="author" content="Ilori Stephen A">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LD Talent | <?php echo ucfirst($active); ?></title>
    <!-- Css Styles... -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- Script -->
    <script src="./assets/js/jquery.js" charset="utf-8"></script>
    <script src="./assets/js/bootstrap.min.js" charset="utf-8"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">LD Talent</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav ml-auto">
            <?php if (!isset($_SESSION['auth_status'])) : //condition qui vérifie si la session n'est pas encore établie?>
              <li class="nav-item">
                <a class="nav-link <?php if (strtolower($active) === 'login') echo 'active'; //condition qui retourne en minuscule grâce à la fonction strtolower() la variable $active
                                                                                             // et la rend égale à 'login' ?>"
                 href="<?php echo BASE_URL; //définit le lien href en affichant grâce à un echo le chemin grâce à la variable php BASE_URL ?>index.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if (strtolower($active) === 'register') echo 'active'; //condition qui retourne en minuscule grâce à la fonction strtolower() la variable $active
                                                                                             // et la rend égale à 'register'  ?>
                    " href="<?php echo BASE_URL; ?>register.php" tabindex="-1" aria-disabled="true">Register</a>
              </li>
            <?php elseif (isset($_SESSION['auth_status'])) : ?>
              <li class="nav-item">
                <a href="<?php echo BASE_URL; //définit le lien href en affichant grâce à un echo le chemin grâce à la variable php BASE_URL?>dashboard.php" class="nav-link <?php if (strtolower($active) === 'dashboard') echo 'active'; ?>">Dashboard</a>
              </li>
            <?php endif; //fini notre if?>
            <?php if (isset($_SESSION['auth_status'])) : //condition qui vérifie si la session a un auth_status?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL; //définit le lien href en affichant grâce à un echo le chemin grâce à la variable php BASE_URL?>logout.php">Logout</a>
              </li>
            <?php endif; //fini notre if?>
          </ul>
        </div>
      </div>
    </nav>
