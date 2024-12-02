<?php 
$title = "Plats";
$baniereTitle = "Plats";
$baniereImage = "assets/img/bg3.jpeg";
require 'header.php';
require 'data.php';
?>


    <!-- PLAT -->
    <section>

      <div class="container-fluid p-4">
        <div class="row align-items-center justify-content-center container-plat">

      
        
        <?php foreach ($data as $key => $value) : ?>

          <?php foreach ($value as $food) : ?>

              <div class="col-9 col-md-6 col-lg-3" data-key="<?= $food['name']; ?>">
                <div class="card mb-3" style="max-width: 540px;">
                  <div class="row g-0">
                    <div class="col-md-2">
                      <img src="<?= $food['image']; ?>" class="img-fluid rounded-start"
                        alt="<?= $food['name']; ?>">
                    </div>
                    <div class="col-md-10">
                      <div class="card-body">
                        <div class="d-flex align-items-baseline justify-content-between align-self-end">
                          <p class="card-text"><small class="text-body-secondary"><?= $food['prix']; ?></small></p>
                          <div class="btn small border-warning text-dark border-warning text-dark">add <i
                              class="bi bi-plus"></i></div>
                        </div>
                        <h5 class="card-title fs-6"><?= $food['name']; ?></h5>
                        <p class="card-text"><?= $food['description']; ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


          <?php endforeach ?>
        <?php endforeach ?>
      



<?php require 'footer.php' ?>
