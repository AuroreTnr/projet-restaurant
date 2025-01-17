<?php 
$title = "Contact";
$baniereTitle = "Contact";
$baniereSubtitle = "";
$baniereImage = "assets/img/bg3.jpeg";
require 'elements/header.php';
?>


<?php
if (isset($_SESSION['error_message']) && $_SESSION['error_message'] != "") :?>
    <div class="alert <?= $_SESSION['attributes'] ?> my-3 ">
      <?= $_SESSION['error_message'] ?>
    </div>
    <?php unset($_SESSION['error_message']); ?>
<?php endif; ?>

<div class="container my-5 formulaire">
    <form action="script_contact.php" class="row g-3 justify-content-center text-light" novalidate method="POST" id="formulaire-contact">
        <div class="col-md-7">
            <label for="name" class="form-label">Entrez votre nom : * </label>
            <input type="text" class="form-control" id="name" name="nom" value="<?php echo isset($_SESSION['nom']) ? htmlentities($_SESSION['nom']) : ""; ?>" required>
        </div>

        <div class="col-md-7">
            <label for="prenom" class="form-label">Entrez votre prénom : * </label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo isset($_SESSION['prenom']) ? htmlentities($_SESSION['prenom']) : ''; ?>" required>
        </div>

        <div class="col-md-7">
            <label for="email" class="form-label">Entrez votre adresse mail: * </label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($_SESSION['email']) ? htmlentities($_SESSION['email']) : ''; ?>" required>
        </div>

        <div class="col-md-7">
            <label for="commentaire" class="form-label">Votre message :</label>
            <textarea class="form-control" id="commentaire" name="commentaire" rows="3"><?php echo isset($_SESSION['commentaire']) ? htmlentities($_SESSION['commentaire']) : ''; ?></textarea>
        </div>

        <div class="col-md-7">
            <button class="btn border-warning text-light btn-submit" name="ok" type="submit">Envoyer</button>
        </div>
    </form>
</div>

<?php require 'elements/footer.php'; ?>
