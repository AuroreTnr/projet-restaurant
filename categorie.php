<?php 
$title = "Catégorie";
$baniereTitle = "Catégorie";
$baniereSubtitle = "";
$baniereImage = "assets/img/bg3.jpeg";
require 'header.php';

require 'SQL/DAO.php';

$db = connexionBase();


// REQUETE ET PAGINATION

// nombre de categorie
$nombre_total_categorie = (int)$db->query("SELECT COUNT(id) FROM categorie")->fetch(PDO::FETCH_NUM)[0];

// nombre de categorie par page
$nombre_categorie_par_page = 6;

// nombre de page
$nombre_page = ceil($nombre_total_categorie/$nombre_categorie_par_page);

// page courante + securité pour get
$page_courante = isset($_GET['page']) && ($_GET['page'] > 0) && ($_GET['page'] <=$nombre_page) ? (int)$_GET['page'] : (int)1;

// requete categorie
$requete_categories = get_categorie($db, $nombre_categorie_par_page, $page_courante);

?>



    <!-- CATEGORIE -->
    <section>
      <div class="container-fluid p-4 container-categorie">
        <div class="row align-items-center justify-content-center">

          <!-- PAGINATION -->
          <nav>
            <ul class="pagination">
              <?php
                // fleche precedante
                $class_previous = ($page_courante > 1) ? '' : 'disabled';
                
                echo "<li class='page-item $class_previous'><a class='page-link' href='categorie.php?page=" . ($page_courante - 1) . "'><span aria-hidden='true'>&laquo;</span></a></li>";

                // navigation
                for ($i = 1; $i <= $nombre_page; $i++) {
                  $class_active = ($i - 1 === $page_courante - 1) ? ' active' : '';

                  echo "<li class='page-item $class_active'><a class='page-link' href='categorie.php?page=$i'>$i</a></li>";
                }

                // fleche suivant
                $class_next = ($page_courante < $nombre_page) ? '' : 'disabled';

                echo "<li class='page-item $class_next'><a class='page-link' href='categorie.php?page=" . ($page_courante + 1) . "'><span aria-hidden='true'>&raquo;</span></a></li>";


              ?>
          </ul>
        </nav>

          <!-- AFFICHAGE CATEGORIE -->
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
                      <a href="./categorie.php?search=<?= urlencode($value['libelle']); ?>" class="stretched-link" data-key="<?= $value['libelle']; ?>"></a>

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


