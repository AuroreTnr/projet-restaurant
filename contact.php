<?php 
$title = "Contact";
$baniereTitle = "Contact";
$baniereSubtitle = "";
$baniereImage = "assets/img/bg3.jpeg";
require 'elements/header.php';
?>

<?php var_dump($_POST); ?>


  <div class="container my-5 formulaire">
    <form action="validation_contact.php" class="row g-3 justify-content-center text-light" novalidate method="POST" id="formulaire-contact">
      <div class="col-md-7">
        <label for="name" class="form-label">Entrez votre nom : * <span
            class="errorMsg errorMsg-nom text-danger"></span></label>
        <input type="text" class="form-control" id="name" name="nom" value="<?= $name = isset($name) ? htmlentities($name) : "";?>" required>
      </div>

      <div class="col-md-7">
        <label for="prenom" class="form-label">Entrez votre prénom : * <span
            class="errorMsg errorMsg-prenom text-danger"></span></label>
        <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $prenom = isset($prenom) ? htmlentities($prenom) : "";?>" required>
      </div>

      <div class="col-md-7">
        <label for="email" class="form-label">Entrez votre adresse mail: * <span
            class="errorMsg errorMsg-adresse text-danger"></span></label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $email = isset($email) ? htmlentities($email) : "";?>" required>
      </div>

      <div class="col-md-7">
        <div class="form-check">
          <input type="checkbox" id="checkbox" name="checkbox" required>
          <label for="checkbox" class="errorMsg-checkbox">
            Veuillez accepter les conditions d' utilisation. *
          </label>
        </div>
      </div>

      <div class="col-md-7 mb-3">
        <label for="commentaire" class="form-label">Votre message :</label>
        <textarea class="form-control" id="commentaire" name="commentaire" rows="3"><?= $commentaire = isset($commentaire) ? htmlentities($commentaire) : "" ?></textarea>
      </div>


      <div class="col-md-7">
        <button class="btn border-warning text-light btn-submit" name="ok" type="submit">Envoyer</button>
      </div>

    </form>
  </div>

  <?php require 'elements/footer.php'; ?>
