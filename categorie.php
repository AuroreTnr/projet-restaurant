<?php 
$title = "Catégorie";
$baniereTitle = "Catégorie";
$baniereImage = "assets/img/bg3.jpeg";
require 'header.php';
require 'data.php';
?>


    <!-- CATEGORIE -->
    <section>

      <div class="container-fluid p-4 container-categorie">
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
                      <h5 class="card-title"><?= $key; ?></h5>
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
    </section>




<?php
require 'footer.php';
?>