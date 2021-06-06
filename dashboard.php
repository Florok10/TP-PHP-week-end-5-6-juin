<?php require_once('./controller/Dashboard.php'); //requiert Dashboard.php une fois ?>
<?php
  $Dashboard = new Dashboard(); //on définit la variable $Dashboard comme étant un nouvel objet Dashboard donc on instancie l'objet Dashboard
  $Response = []; //on définit la variable $Response comme étant un tableau vide
  $active = $Dashboard->active; //on définit la variable $active comme étant $Dashboard->active
  $News = $Dashboard->getNews(); //on définit la variable
?>
<?php require('./nav.php'); ?>
<main role="main" class="container">
  <div class="container">
    <div class="row mt-5">
      <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12">
        <h2>News</h2>
        <hr>
      </div>
    </div>
    <div class="row">
      <?php if ($News['status']) : ?>
        <?php foreach ($News['data'] as $new) :  ?>
          <div class="col-xs-12 col-sm-12 col-md-12 col-xl-4 col-lg-4">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
              <div class="news_title">
                <h3><?php echo ucwords($new['title']); ?></h3>
              </div>
              <div class="news_body">
                <p><?php echo $new['content']; ?> <a href="javascript:void(0)">Read More</a></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif;  ?>
    </div>
  </div>
</main>
</body>
</html>
