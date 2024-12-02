<?php 
$title = "Restaurant the district";
$baniereTitle = "Restaurant le district";
$baniereSubtitle = "“Bien manger, un plaisir à partager ”";
$baniereImage = "assets/img/banniere_1920.jpg";
require 'header.php';
require 'data.php';
?>

    <!-- PLAT -->
  <section>

      <div class="container-fluid p-4 container-plat">
        <div class="row align-items-center justify-content-center">
          
            <?php foreach ($data as $key => $value) : ?>

                <div class="col-9 col-md-6 col-lg-3 card-categorie" data-key="<?= $key; ?>">
                  <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="<?= $value[0]['imageCategorie']; ?>" class="img-fluid rounded-start" alt="pizza">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title fs-6"><?= $key; ?></h5>
                          <p class="card-text">Lorem ipsum dolor sit amet.</p>
                          <a href="./plats.php" class="stretched-link" data-key=<?= $key; ?>></a>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
            <?php endforeach ?>
      
        </div>
      </div>

  <section>


      <!-- CAROUSEL -->
      <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

        <div class="carousel-inner">
          <div class="carousel-item active">
          <div class="carousel-caption text-start">
            <h1>Cuisine Asiatique.</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, inventore?.</p>
            <p><a class="btn btn-lg btn-dark" href="/plats.php">Plats</a></p>
          </div>
            <img src="assets/img/food_img/burger/hamburger.jpg" class="d-block w-100" alt="hamburger">
          </div>

          <div class="carousel-item">
          <div class="carousel-caption text-start">
            <h1>Cuisine Italienne.</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, culpa!.</p>
            <p><a class="btn btn-lg btn-dark" href="/plats.php">Plats</a></p>
          </div>
            <img src="assets/img/food_img/pizza/pizza-margherita.jpg" class="d-block w-100" alt="pizza margherita">
          </div>

          <div class="carousel-item">
          <div class="carousel-caption text-start">
            <h1>Cuisine Veggie.</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, aliquid!.</p>
            <p><a class="btn btn-lg btn-dark" href="/plats.php">Plats</a></p>
          </div>
            <img src="assets/img/food_img/burger/cheesburger.jpg" class="d-block w-100 img-carousel" alt="cheeseburger">
          </div>
        </div>
      </div>
    </section>



<?php require 'footer.php' ?>