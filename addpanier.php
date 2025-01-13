<?php
$title = "Panier";
$baniereTitle = "Panier";
$baniereSubtitle = "";
$baniereImage = "assets/img/bg3.jpeg";


require 'header.php';
require 'SQL/DAO.php';

$db = connexionBase();


if (isset($_GET['id'])) {
    $plat = get_produit_add_session($db);
    if (empty($plat)) {
        die("Ce produit n' existe pas");
    }
    $panier->add($plat->id);
    die("Le produit a bien ete ajouté au panier <a href='javascript:history.back()'>retourner sur le catalogue</a>");

}else {
    die("Pas d id au panier");
}



?>
