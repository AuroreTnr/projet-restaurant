<?php 
$title = "Restaurant the district";
$baniereTitle = "Restaurant le district";
$baniereSubtitle = "“Bien manger, un plaisir à partager ”";
$baniereImage = "assets/img/banniere_1920.jpg";
require 'elements/header.php';

require 'SQL/DAO.php';

$db = connexionBase();

$categories_populaire = get_populaire_categorie($db);

$plats_populaire = get_populaire_plat($db);



?>



    <!-- AFFICHAGE PLATS POPULAIRE -->

    <h2 class="text-center mt-5 text-decoration-underline" >Plats Populaires</h2>

      <div class="container-fluid p-4">
        <div class="row align-items-center justify-content-center container-plat">

      
        

            <?php foreach ($plats_populaire as $plat) : ?>

                <div class="col-9 col-md-6 col-lg-3" data-key="<?= $plat['libelle']; ?>">
                  <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                      <div class="col-md-2">
                        <img src="<?= $plat['image']; ?>" class="img-fluid rounded-start" alt="<?= $plat['libelle']; ?>">
                      </div>
                      <div class="col-md-10">
                        <div class="card-body">
                          <div class="d-flex align-items-baseline justify-content-between align-self-end">
                            <p class="card-text"><small class="text-body-secondary"><?= $plat['prix'] . ' '. '€'; ?></small></p>
                            <a href="addpanier.php?id=<?=$plat['id'];?>" class="btn small border-warning text-dark">add <i class="bi bi-plus"></i></a>
                            </div>
                          <h5 class="card-title fs-6"><?= $plat['libelle']; ?></h5>
                          <p class="card-text"><?= $plat['description']; ?></p>
                        </div>
                    </div>
                    </div>
                  </div>
                </div>
                
            <?php endforeach ?>

        </div>
      </div>

          <!-- AFFICHAGE CATEGORIE POPULAIRE -->

    <section>
    <h2 class="text-center mt-5 text-decoration-underline">Catégories Populaires</h2>

      <div class="container-fluid p-4 container-plat">
        <div class="row align-items-center justify-content-center">
          
            <?php foreach ($categories_populaire as $categorie => $value) : ?>

                <div class="col-9 col-md-6 col-lg-3 card-categorie" data-key="<?= $value['libelle']; ?>">
                  <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="<?= $value['image']; ?>" class="img-fluid rounded-start" alt="pizza">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title fs-6"><?= $value['libelle']; ?></h5>
                          <p class="card-text">Lorem ipsum dolor sit amet.</p>
                          <a href="./plats.php?search=<?=urlencode($value['libelle']); ?>" class="stretched-link" data-key=<?= $value['libelle']; ?>></a>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
            <?php endforeach ?>
      
        </div>
      </div>

    </section>



      <!-- AFFICHAGE CAROUSEL -->
<div class="container container-fluid my-5">
  <div id="carouselExampleAutoplaying" class="carousel slide container-fluid" data-bs-ride="carousel" style="width: 100%;">

    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
  

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/img/food_img/veggie/poelee-du-chef.jpg" class="d-block img-carousel" alt="cuisine veggie">
        <div class="carousel-caption text-start">
          <h2>Cuisine Veggie.</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, aliquid!.</p>
          <p><a class="btn btn-lg btn-dark" href="/plats.php">Plats</a></p>
        </div>
      </div>
  
      <div class="carousel-item">
        <img src="assets/img/food_img/pizza/pizza-margherita.jpg" class="d-block img-carousel" alt="pizza margherita">
        <div class="carousel-caption text-start">
          <h2>Cuisine Italienne.</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, culpa!.</p>
          <p><a class="btn btn-lg btn-dark" href="/plats.php">Plats</a></p>
        </div>
      </div>
  
      <div class="carousel-item">
        <img src="assets/img/food_img/asiatique-food/sushi.jpg" class="d-block img-carousel" alt="sushi">
        <div class="carousel-caption text-start">
          <h2>Cuisine Asiatique.</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, inventore?</p>
          <p><a class="btn btn-lg btn-dark" href="/plats.php">Plats</a></p>
        </div>
      </div>
    </div>
  

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>




<?php require 'elements/footer.php' ?>