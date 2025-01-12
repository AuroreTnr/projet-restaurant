<?php 
$title = "Plats";
$baniereTitle = "Plats";
$baniereSubtitle = "";
$baniereImage = "assets/img/bg3.jpeg";
require 'header.php';

require 'SQL/DAO.php';

$db = connexionBase();

$requete_plat = get_plat($db);

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
          <div class="col-9 col-md-6 col-lg-3" data-key="<?= htmlspecialchars($food['libelle']); ?>">
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-2">
                  <img src="<?= htmlspecialchars($food['image']); ?>" class="img-fluid rounded-start" alt="<?= htmlspecialchars($food['libelle']); ?>">
                </div>
                <div class="col-md-10">
                  <div class="card-body">
                    <div class="d-flex align-items-baseline justify-content-between align-self-end">
                      <p class="card-text"><small class="text-body-secondary"><?= htmlspecialchars($food['prix']); ?> €</small></p>
                      <div class="btn small border-warning text-dark">add <i class="bi bi-plus"></i></div>
                    </div>
                    <h5 class="card-title fs-6"><?= htmlspecialchars($food['libelle']); ?></h5>
                    <p class="card-text"><?= htmlspecialchars($food['description']); ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

      <?php else : ?> 

        <?php foreach ($requete_plat as $food) : ?>
          <div class="col-9 col-md-6 col-lg-3" data-key="<?= htmlspecialchars($food['libelle']); ?>">
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-2">
                  <img src="<?= htmlspecialchars($food['image']); ?>" class="img-fluid rounded-start" alt="<?= htmlspecialchars($food['libelle']); ?>">
                </div>
                <div class="col-md-10">
                  <div class="card-body">
                    <div class="d-flex align-items-baseline justify-content-between align-self-end">
                      <p class="card-text"><small class="text-body-secondary"><?= htmlspecialchars($food['prix']); ?> €</small></p>
                      <div class="btn small border-warning text-dark">add <i class="bi bi-plus"></i></div>
                    </div>
                    <h5 class="card-title fs-6"><?= htmlspecialchars($food['libelle']); ?></h5>
                    <p class="card-text"><?= htmlspecialchars($food['description']); ?></p>
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
