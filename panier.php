<?php 
$title = "Panier";
$baniereTitle = "Panier";
$baniereSubtitle = "";
$baniereImage = "assets/img/bg3.jpeg";
require 'header.php';
require 'SQL/DAO.php';

$db = connexionBase();

// AFFICHER LE PANIER
$ids = array_keys($_SESSION['panier']);
$plats = display_plat_panier($db, $ids);


// SUPPRIMER PANIER
if (isset($_GET['del'])) {
  $panier->del($_GET['del']);
}

// TOTAL
$total_du_panier = 0;
$result_total_panier = result_total_panier($db, $ids, $total_du_panier);
// var_dump($result_total_panier);
foreach ($result_total_panier as $plat) {
  $total_du_panier += $plat->prix * $_SESSION['panier'][$plat->id];
}




?>

<form action="panier.php" method="post">
  <table class="table m-5">
    <thead>
      <tr>
        <th scope="col">Nom du produit</th>
        <th scope="col">Prix</th>
        <th scope="col">Quantité</th>
        <th scope="col">Total</th>
        <th scope="col">Supprimer</th>
      </tr>
    </thead>
    <tbody>
      <?php if (isset($plats)) :?>
        <?php foreach ($plats as $plat) :?>
  
          <tr>
            <th scope="row" class="name"><?=$plat->libelle;?></th>
  
            <td class="prix"><?=$plat->prix;?></td>
  
            <td class="quantite"><input type="text" value="<?= $_SESSION['panier'][$plat->id]; ?>" name="panier[quantite][<?= $plat->id ;?>]" style="width:40px;"></td>
  
            <td class="total"><?= number_format($plat->prix * htmlentities($_SESSION['panier'][$plat->id]),2,',', ' ') ;?></td>
  
            <td class="action"><a href="panier.php?del=<?= $plat->id ?>" class="supprimer"><i class="bi bi-trash3"></i></a></td>
          </tr>
        <?php endforeach; ?>
  
        <tfoot>
          <tr>
            <td colspan="4" style="text-align: right;">Total : </td>
            <td class="total"><?= number_format($total_du_panier, 2, ',', ' '); ?> €</td>
          </tr>
        </tfoot>
  
      <?php endif; ?>
    </tbody>
  </table>

  <input type="submit" value="recalculer" class="btn btn-sm btn-primary m-3">


</form>






























<?php require 'footer.php'; ?>

