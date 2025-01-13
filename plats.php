<?php 
$title = "Plats";
$baniereTitle = "Plats";
$baniereSubtitle = "";
$baniereImage = "assets/img/bg3.jpeg";
require 'header.php';

require 'SQL/DAO.php';

$db = connexionBase();

//--------------------------------------
// REQUETE ET PAGINATION

// nombre de categorie
$nombre_total_plat = (int)$db->query("SELECT COUNT(id) FROM plat")->fetch(PDO::FETCH_NUM)[0];

// nombre de categorie par page
$nombre_plat_par_page = 6;

// nombre de page
$nombre_page = ceil($nombre_total_plat/$nombre_plat_par_page);

// page courante + securité pour get
$page_courante = isset($_GET['page']) && ($_GET['page'] > 0) && ($_GET['page'] <=$nombre_page) ? (int)$_GET['page'] : (int)1;


// requete categorie
$requete_plat = get_plat($db, $nombre_plat_par_page, $page_courante);


//------------------------------------------------

// BAR RECHERCHE
$mot_rechercher = isset($_GET['search']) ? htmlentities($_GET['search']) : "";

$resultat_recherche = get_recherche_bar($db, $mot_rechercher);

?>

<!-- PLAT -->
<section>
  <div class="container-fluid p-4">
    <div class="row align-items-center justify-content-center container-plat">

      <?php if (isset($_GET['search'])) : ?>

        <a href="plats.php?afficher=touslesplats" class="link link-btn mb-4 text-warning">Voir tous les plats</a>

        <?php foreach ($resultat_recherche as $food) : ?>
          <div class="col-9 col-md-6 col-lg-3" data-key="<?=$food['libelle']; ?>">
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-2">
                  <img src="<?=$food['image']; ?>" class="img-fluid rounded-start" alt="<?=$food['libelle']; ?>">
                </div>
                <div class="col-md-10">
                  <div class="card-body">
                    <div class="d-flex align-items-baseline justify-content-between align-self-end">
                      <p class="card-text"><small class="text-body-secondary"><?=$food['prix']; ?> €</small></p>
                      <a href="addpanier.php?id=<?=$food['id'];?>" class="btn small border-warning text-dark">add <i class="bi bi-plus"></i></a>
                    </div>
                    <h5 class="card-title fs-6"><?=$food['libelle']; ?></h5>
                    <p class="card-text"><?=$food['description']; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else : ?> 

        <!-- PAGINATION -->
        <nav>
          <ul class="pagination">
            <?php
              // fleche precedante
              $class_previous = ($page_courante > 1) ? '' : 'disabled';
              
              echo "<li class='page-item $class_previous'><a class='page-link' href='plats.php?page=" . ($page_courante - 1) . "'><span aria-hidden='true'>&laquo;</span></a></li>";

              // navigation
              for ($i = 1; $i <= $nombre_page; $i++) {
                $class_active = ($i - 1 === $page_courante - 1) ? ' active' : '';

                echo "<li class='page-item $class_active'><a class='page-link' href='plats.php?page=$i'>$i</a></li>";
              }

              // fleche suivant
              $class_next = ($page_courante < $nombre_page) ? '' : 'disabled';

              echo "<li class='page-item $class_next'><a class='page-link' href='plats.php?page=" . ($page_courante + 1) . "'><span aria-hidden='true'>&raquo;</span></a></li>";


            ?>
          </ul>
        </nav>

        <!-- AFFICHAGE PLATS -->
        <?php foreach ($requete_plat as $food) : ?>
          <div class="col-9 col-md-6 col-lg-3" data-key="<?= $food['libelle']; ?>">
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-2">
                  <img src="<?= $food['image']; ?>" class="img-fluid rounded-start" alt="<?= $food['libelle']; ?>">
                </div>
                <div class="col-md-10">
                  <div class="card-body">
                    <div class="d-flex align-items-baseline justify-content-between align-self-end">
                      <p class="card-text"><small class="text-body-secondary"><?= $food['prix']; ?> €</small></p>
                      <a href="addpanier.php?id=<?=$food['id'];?>" class="btn small border-warning text-dark">add <i class="bi bi-plus"></i></a>
                    </div>
                    <h5 class="card-title fs-6"><?= $food['libelle']; ?></h5>
                    <p class="card-text"><?= $food['description']; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

      <?php endif; ?>

    </div>
  </div>
</section>



<?php require 'footer.php'; ?>
