<?php 
$title = "Panier";
$baniereTitle = "Panier";
$baniereImage = "assets/img/bg3.jpeg";
require 'header.php';
?>

  <div class="container my-5 formulaire text-light">
    <form class="row g-3 justify-content-center" novalidate action="donnees-panier.php" method="POST" id="formulaire-panier">
      <div class="col-md-7">
        <label for="validationCustom01" class="form-label">Entrez votre nom : * <span
            class="errorMsg errorMsg-nom text-danger"></span></label>
        <input type="text" class="form-control" id="name" required>
      </div>

      <div class="col-md-7">
        <label for="validationCustom02" class="form-label">Entrez votre prénom : * <span
            class="errorMsg errorMsg-prenom text-danger"></span></label>
        <input type="text" class="form-control" id="prenom" required>
      </div>

      <div class="col-md-7">
        <label for="validationCustom03" class="form-label">Entrez votre adresse : * <span
            class="errorMsg errorMsg-adresse text-danger"></span></label>
        <input type="text" class="form-control" id="adresse" required>
      </div>

      <div class="col-md-7">
        <label for="validationCustom03" class="form-label">Entrez votre code Postal : *<span
            class="errorMsg errorMsg-postal text-danger"></span></label>
        <input type="number" class="form-control" id="postal" required>
      </div>

      <div class="col-md-7">
        <button class="btn border-warning text-light btn-submit" type="submit">Envoyer</button>
      </div>

    </form>
  </div>

 <?php require 'footer.php'; ?>