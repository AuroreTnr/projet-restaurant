<?php
class panier{
    public function __construct(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array();
        }
        if (isset($_POST['panier']['quantite'])) {
            $this->recalculer();
            var_dump($_SESSION);
        }
    }

    public function recalculer(){
        // pour eviter l injection aux inputs quantité, on parcours les elements dans notre panier.
        foreach($_SESSION['panier'] as $plat_id => $quantite){
            if (isset($_POST['panier']['quantite'][$plat_id])) {
                $_SESSION['panier'][$plat_id] = $_POST['panier']['quantite'][$plat_id];
            }
        }
    }


    public function add($plat_id){
        if (isset($_SESSION['panier'][$plat_id])) {
            $_SESSION['panier'][$plat_id]++;
        }else {
            $_SESSION['panier'][$plat_id] = 1;
        }

    }

    public function del($plat_id){
        unset($_SESSION['panier'][$plat_id]);
        header("Location: panier.php");
        exit;
    }


}