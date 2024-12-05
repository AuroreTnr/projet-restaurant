<?php 
$title = "Panier";
$baniereTitle = "Panier";
$baniereImage = "assets/img/bg3.jpeg";
require 'header.php';

$error = null;
$success = null;

$name = null;
$prenom = null;
$adresse = null;
$postal = null;

$regexChar = '/^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-\'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/';
$regexAdresse = '/^[0-9]+[\s][a-zA-ZéèîïÉÈÎÏ]+([\s][a-zA-ZéèîïÉÈÎÏ]+)*([-\'\s][a-zA-ZéèîïÉÈÎÏ]+([\s][a-zéèêàçîï ]+)*)?$/';
$regexPostal = '/^[0-9]{5}$/';


if (!empty($_POST['name'] && $_POST['prenom'] && $_POST['adresse'] && $_POST['postal'])) {
  $name = $_POST['name'];
  $prenom = $_POST['prenom'];
  $adresse = $_POST['adresse'];
  $postal = $_POST['postal'];

    if (preg_match($regexChar, $name) && preg_match($regexChar, $prenom) && preg_match($regexAdresse, $adresse) && preg_match($regexPostal, $postal)){
      $file = __DIR__ . DIRECTORY_SEPARATOR . 'commandes' . DIRECTORY_SEPARATOR . 'commande du client ' . $name . ' le : ' . date('d-m-y') . '.txt';

      file_put_contents($file, 'Nom : '. $name . PHP_EOL, FILE_APPEND);
      $name = null;

      file_put_contents($file, 'Prenom : ' . $prenom . PHP_EOL, FILE_APPEND);
      $prenom = null;

      file_put_contents($file, 'Adresse : ' . $adresse . PHP_EOL, FILE_APPEND);
      $adresse = null;

      file_put_contents($file, 'Code postal : ' . $postal . PHP_EOL, FILE_APPEND);
      $postal = null;

      $success = "Votre commande a bien été enregistrée.";
    }else {
      $error = "Le format est incorrect, veuillez vérifier vos coordonnées";
    }

}elseif (empty($_POST['name'] && $_POST['prenom'] && $_POST['adresse'] && $_POST['postal'])) {
  $error = "Le formulaire est vide, veuillez le remplir";
}
?>
<pre>
  <?php print_r($_POST); ?>
</pre>


    <?php if ($success) : ?>
      <div class="alert alert-success">
        <?= $success ?>
      </div>
    <?php endif; ?>

    <?php if ($error) : ?>
      <div class="alert alert-danger">
        <?= $error ?>
      </div>
    <?php endif; ?>


    

  <div class="container my-5 formulaire text-light">

    <form class="row g-3 justify-content-center" novalidate action="/panier.php" method="POST" id="formulaire-panier">
      <div class="col-md-7">
        <label for="validationCustom01" class="form-label">Entrez votre nom : * <span
            class="errorMsg errorMsg-nom text-danger"></span></label>
        <input type="text" class="form-control" name="name" id="name" value="<?= htmlentities($name) ?>" required>
      </div>

      <div class="col-md-7">
        <label for="validationCustom02" class="form-label">Entrez votre prénom : * <span
            class="errorMsg errorMsg-prenom text-danger"></span></label>
        <input type="text" class="form-control" name="prenom" id="prenom" value="<?= htmlentities($prenom) ?>" required>
      </div>

      <div class="col-md-7">
        <label for="validationCustom03" class="form-label">Entrez votre adresse : * <span
            class="errorMsg errorMsg-adresse text-danger"></span></label>
        <input type="text" class="form-control" name="adresse" id="adresse" value="<?= htmlentities($adresse) ?>" required>
      </div>

      <div class="col-md-7">
        <label for="validationCustom03" class="form-label">Entrez votre code Postal : *<span
            class="errorMsg errorMsg-postal text-danger"></span></label>
        <input type="number" class="form-control" name="postal" id="postal" value="<?= htmlentities($postal) ?>" required>
      </div>

      <div class="col-md-7">
        <button class="btn border-warning text-light btn-submit" type="submit">Envoyer</button>
      </div>

    </form>
  </div>
 <?php require 'footer.php'; ?>