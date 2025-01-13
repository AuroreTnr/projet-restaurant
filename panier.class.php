<?php
class panier{
    public function __construct(){
        if(!isset($_SESSION)){
            session_start();
        }
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array();
        }
    }

    public function add($plat_id){
        $_SESSION['panier'][$plat_id] = 1;

    }


}