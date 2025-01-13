<?php 
$title = "Panier";
$baniereTitle = "Panier";
$baniereSubtitle = "";
$baniereImage = "assets/img/bg3.jpeg";
require 'header.php';
require 'SQL/DAO.php';

$db = connexionBase();

$ids = array_keys($_SESSION['panier']);

$plats = display_plat_panier($db, $ids);

?>

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
  <?php foreach ($plats as $plat) :?>

    <tr>
      <th scope="row" class="name"><?=$plat->libelle;?></th>
      <td class="prix"><?=$plat->prix;?></td>
      <td class="quantite">Quantité</td>
      <td class="total">total</td>
      <td class="action"><a href="#" class="supprimer"><i class="bi bi-trash3"></i></a></td>
    </tr>

    <?php endforeach; ?>


  </tbody>
</table>






























<?php require 'footer.php'; ?>

