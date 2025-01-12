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
function get_categorie($db) {
    $requete = $db->query("SELECT * FROM categorie WHERE active = 'true' LIMIT 6 ");
    $tableau = $requete->fetchAll(PDO::FETCH_ASSOC);
    $requete->closeCursor();

    return $tableau;
}



/**
 * donne les plats avec une limite à 6
 * @param mixed $db
 * @return mixed
 */
function get_plat($db) {
    $requete = $db->query("SELECT * FROM plat LIMIT 6");
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


// Page accueil -> trouver comment quand on recherche "burger" ça nous amene à la page plat avec le mot burger dans input plus le resultat qui s'affiche.

// Page categorie -> Fonction qui quand on clique sur categorie "burger" ca ammene aux burgers

// Page accueil -> Fonction qui quand on clique une categorie "burger" à la une ça va sur plat deja filtrer sur "burger

// Page accueil (après page panier)-> Fonction qui quand on clique sur un plat sur add + ça l' ajouter au panier

// Page accueil (après page panier) -> ajout d' un point si object dans panier

// Page Panier à faire

// FONCTION COMMANDE + FONCTION MAIL






















