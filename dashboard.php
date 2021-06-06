<?php require_once('./controller/Dashboard.php'); //requiert Dashboard.php une fois ?>
<?php
  $Dashboard = new Dashboard(); //on définit la variable $Dashboard comme étant un nouvel objet Dashboard donc on instancie l'objet Dashboard
  $Response = []; //on définit la variable $Response comme étant un tableau vide
  $active = $Dashboard->active; //on définit la variable $active comme étant $Dashboard qui utilise la variable $active
  $News = $Dashboard->getNews(); //on définit la variable $News comme étant $Dasbord qui utilise la fonction getNews()
?>
<?php require('./nav.php'); //requiert nav.php ?>
<main role="main" class="container">
  <div class="container">
    <div class="row mt-5">
      <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12">
        <h2>News</h2>
        <hr>
      </div>
    </div>
    <div class="row">
      <?php if ($News['status']) //condition si $News a dans son tableau un string pour 'status' : ?>
        <?php foreach ($News['data'] as $new) : // une boucle pour trouver dans le tableau de $News 'data' en temps que $new ?>
          <div class="col-xs-12 col-sm-12 col-md-12 col-xl-4 col-lg-4">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
              <div class="news_title">
                <h3><?php echo ucwords($new['title']); //on affiche la fonction ucwords avec pour param $new et dans son tableau 'title'  ?></h3>
              </div>
              <div class="news_body">
                <p><?php echo $new['content']; //on affiche 'content' dans le tableau de la variable $new  ?> <a href="javascript:void(0)">Read More</a></p>
              </div>
            </div>
          </div>
        <?php endforeach; //on arrête d'utiliser une boucle  ?>
      <?php endif; //on termine notre condition  ?>
    </div>
  </div>
</main>
</body>
</html>
