<?php
/**
 * connextion a la base de donnée
 * @return PDO
 */
function connexionBase(){

    try {
        $db = new PDO('mysql:host=localhost;dbname=restaurant_the_district;charset=utf8','admin','Afpa1234');

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage() . "<br>";
        echo "N° : " . $e->getcode();
        die("Fin du script");
    }
};



/**
 * donne les categorie active avec une limit à 6
 * @param mixed $db
 * @return mixed
 */
function get_categorie($db, $nombre_categorie_par_page, $page_courante) {
    $offset = ($page_courante - 1) * $nombre_categorie_par_page;
    $requete = $db->query("SELECT * FROM categorie LIMIT $nombre_categorie_par_page OFFSET $offset");

    $tableau = $requete->fetchAll(PDO::FETCH_ASSOC);
    $requete->closeCursor();

    return $tableau;
}


/**
 * donne les plats avec une limite à 6
 * @param mixed $db
 * @return mixed
 */
function get_plat($db, $nombre_plat_par_page, $page_courante) {
    $offset = ($page_courante - 1) * $nombre_plat_par_page;
    $requete = $db->query("SELECT * FROM plat LIMIT $nombre_plat_par_page OFFSET $offset");

    $tableau = $requete->fetchAll(PDO::FETCH_ASSOC);
    $requete->closeCursor();

    return $tableau;
}




/**
 * donne les plats les plus populaire
 * @param mixed $db
 * @return mixed
 */
function get_populaire_plat($db) {
    $requete = $db->query("SELECT plat.*, SUM(commande.quantite) AS total_quantite
    FROM commande
    JOIN plat ON commande.id_plat = plat.id
    GROUP BY plat.id
    ORDER BY total_quantite DESC
    LIMIT 6;");
    $tableau = $requete->fetchAll(PDO::FETCH_ASSOC);
    $requete->closeCursor();

    return $tableau;
}


/**
 * donne les categories populaire avec une limite à 6
 * @param mixed $db
 * @return mixed
 */
function get_populaire_categorie($db) {
    $requete = $db->query("SELECT categorie.*, SUM(commande.quantite) AS total_quantite
    FROM commande
    JOIN plat ON commande.id_plat = plat.id
    JOIN categorie ON plat.id_categorie = categorie.id
    GROUP BY categorie.id
    ORDER BY commande.quantite DESC
    LIMIT 6;");
    $tableau = $requete->fetchAll(PDO::FETCH_ASSOC);
    $requete->closeCursor();

    return $tableau;
}

function get_recherche_bar($db, $mot_rechercher){

    $requete = $db->prepare("SELECT * FROM plat WHERE libelle LIKE :libelle");

    $requete->bindValue(':libelle', '%' . $mot_rechercher . '%');

    $requete->execute();

    $tableau = $requete->fetchAll(PDO::FETCH_ASSOC);
    
    $requete->closeCursor();

    return $tableau;

}

function get_produit_add_session($db){
    $requete = $db->prepare("SELECT id FROM plat WHERE id=?");

    $requete->execute(array($_GET["id"]));

    $resultat = $requete->fetch(PDO::FETCH_OBJ);

    $requete->closeCursor();

    return $resultat;

}

function display_plat_panier($db, $ids){
    if (empty($ids)) {
        $requete = array();
    }else {
        $requete = $db->query('SELECT * FROM plat WHERE id IN ('.implode(',',$ids).')');

        $resultat = $requete->fetchAll(PDO::FETCH_OBJ);
    
        $requete->closeCursor();

        return $resultat;
        }
        
}

function result_total_panier($db, $ids, $total){
    $total = 0;

    if (empty($ids)) {
        $requete = array();
    } else {
        $requete = $db->query('SELECT id, prix FROM plat WHERE id IN ('.implode(',',$ids).')');
    
        $resultat = $requete->fetchAll(PDO::FETCH_OBJ);
        
        $requete->closeCursor();
    
        return $resultat;
    
    }
}





// Page plats -> faire un cours sur la pagination



// Page Panier -> à faire
// Page panier -> cours panier a faire
// Page accueil (après page panier) -> ajout d' un point si object dans panier


// FONCTION COMMANDE + FONCTION MAIL


?>
















