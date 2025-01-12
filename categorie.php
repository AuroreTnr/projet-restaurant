<?php 
$title = "Catégorie";
$baniereTitle = "Catégorie";
$baniereSubtitle = "";
$baniereImage = "assets/img/bg3.jpeg";
require 'header.php';

require 'SQL/DAO.php';

$db = connexionBase();

$requete_categories = get_categorie($db);
?>


    <!-- CATEGORIE -->
    <section>

      <div class="container-fluid p-4 container-categorie">
        <div class="row align-items-center justify-content-center">
              <?php foreach ($requete_categories as $categorie => $value) :?>

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
                          <a href="./plats.php?search=<?= urlencode($value['libelle']); ?>" class="stretched-link" data-key="<?= $value['libelle']; ?>"></a>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              <?php endforeach; ?>

        </div>
      </div>
    </section>




<?php
require 'footer.php';
?>


