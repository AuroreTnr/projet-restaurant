<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHMailer\Exception;
$title = "Panier";
$baniereTitle = "Panier";
$baniereSubtitle = "";
$baniereImage = "assets/img/bg3.jpeg";
require 'elements/header.php';
require 'SQL/DAO.php';




// CONNEXION A LA BASE DE DONNEES
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
if (isset($result_total_panier)) {
  foreach ($result_total_panier as $plat) {
    $total_du_panier += $plat->prix * $_SESSION['panier'][$plat->id];
  }
}else {
  echo "<p class='text-light m-4'>Votre panier est vide.</p>";
}

// COMMANDER
if (isset($_POST['commander']) && isset($_SESSION['panier'])) {

  if (filter_var(htmlentities($_POST['user_email']), FILTER_VALIDATE_EMAIL)) {
  
    require 'vendor/autoload.php';
    
    $mail = new PHPMailer(true);
    $adresse_restaurant = 'http://127.0.0.1:8000/index.php';
    $pdf_facture = 'http://127.0.0.1:8000/facture.php';
    
    try {
        $mail->isSMTP();
        $mail->Host = 'localhost';
        $mail->Port = 1025;
        $mail->SMTPAuth = false;
    
        // Expéditeur et destinataire
        $mail->setFrom('thedistrict@restaurant.com', 'The district');
        $mail->addAddress(htmlentities($_POST["user_email"]), 'Nom du destinataire');
    
        // Contenu du message
        $mail->isHTML(true);
        $mail->Subject = 'Confirmation de votre commande';
        $mail->Body = '<h1> Merci pour votre commande</h1> <p>Notre équipe prépare votre commande. Voici un récapitulatif</p>';
        if (isset($plats)) {
          foreach ($plats as $plat) {
          $mail->Body .='
          <p>
              <span>Plat : ' . htmlspecialchars($plat->libelle) . '</span><br>
              <span>Quantité : ' . htmlspecialchars($_SESSION['panier'][$plat->id]) . '</span><br>
              <span>Prix : ' . number_format($plat->prix, 2, ',', ' ') . ' €</span><br>
              <span>Total : ' . number_format($plat->prix * htmlentities($_SESSION['panier'][$plat->id]),2,',', ' ') . ' €</span><br>
          </p>';
          }
        };
        $mail->Body .= '
        <span>Total : ' . number_format($total_du_panier, 2, ',', ' ') . ' €</span>
        ';
        $mail->Body .= '<p>Votre facture est en piece jointe : <a href="' . $pdf_facture . '">ma facture</a></p>
        ';
        $mail->Body .= '<br><a href=' . $adresse_restaurant . '>The District</a>';
    

        // Envoi du message
        $mail->send();

        if ($mail) {
          unset($_SESSION["panier"]);

          if (ini_get("session.use_cookies")) 
          {
              setcookie(session_name(), '', time()-42000);
          }
      
          session_destroy();      
          $error = "<div class='alert alert-success'>Message envoyé avec succès</div>";
        }


        

    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>L'envoi de mail a échoué. L'erreur suivante s'est produite : {$mail->ErrorInfo}</div>";
    }

  }else {
    $error = "<div class='alert alert-danger'>Votre email n' est pas valide</div>";
  }
}

?>


<form action="panier.php" method="post">
  <table class="table mt-2">
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
      <?php if (isset($plats) && isset($_SESSION['panier'])) :?>
        <?php foreach ($plats as $plat) :?>
  
          <tr>
            <th scope="row" class="name"><?= $plat->libelle;?></th>
  
            <td class="prix"><?=$plat->prix;?></td>
  
            <td class="quantite"><input type="text" value="<?= $_SESSION['panier'][$plat->id]; ?>" name="panier[quantite][<?= $plat->id ;?>]" style="width:40px;"></td>
  
            <td class="total"><?= number_format($plat->prix * htmlentities($_SESSION['panier'][$plat->id]),2,',', ' ') ;?></td>
  
            <td class="action"><a href="panier.php?del=<?= $plat->id ?>" class="supprimer"><i class="bi bi-trash3"></i></a></td>
          </tr>
        <?php endforeach; ?>       
      </tbody>
      <tfoot>
        <tr>
          <td colspan="4" style="text-align: right;">Total : </td>
          <td class="total"><?= number_format($total_du_panier, 2, ',', ' '); ?> €</td>
        </tr>
      </tfoot>
      <?php endif; ?>
  </table>


  <input type="submit" value="Recalculer" class="btn btn-sm btn-primary m-3">


</form>


<form action="panier.php" method="post" class="mt-4 bg-light p-4">
  <span><?= $error = isset($error) ? $error : ""; ?></span>

  <input type="email" value="" class="form-control" name="user_email" placeholder="Entrez votre email" required>

  <input type="submit" value="Commander" class="btn btn-sm btn-primary m-3" name="commander">
</form>




<?php require 'elements/footer.php'; ?>

