DROP DATABASE IF EXISTS `restaurant_the_district`;

CREATE DATABASE `restaurant_the_district`;

USE `restaurant_the_district`;

-- Structure de la table `categorie`
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int AUTO_INCREMENT PRIMARY KEY,
  `libelle` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL
);

INSERT INTO `categorie` (libelle, image, active) VALUES
('Burger','./assets/img/cat_img/burger_cat.jpg','true'),
('Pizza','./assets/img/cat_img/pizza_cat.jpg','true'),
('pate','./assets/img/cat_img/pasta_cat_4.jpg','true'),
('salade','./assets/img/cat_img/salade_cat.jpg','true'),
('sandwish','./assets/img/cat_img/sandwish_cat.jpg','true'),
('veggie','./assets/img/cat_img/veggie_cat.jpg','true'),
('wrap','./assets/img/cat_img/wrap_cat.jpg','true'),
('asiatique','./assets/img/cat_img/asiatique_cat.jpg','true');

-- Structure de la table `plat`
CREATE TABLE `plat` (
  `id` int AUTO_INCREMENT PRIMARY KEY,
  `libelle` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_categorie` int NOT NULL,
  `active` varchar(10) NOT NULL,
  FOREIGN KEY (`id_categorie`) REFERENCES `categorie`(`id`)
);

INSERT INTO `plat` (libelle, description, prix, image, id_categorie, active) VALUES
('Burger charolais', 'Rustique et delicieux hamburger charolais.', 9.90, './assets/img/food_img/burger/burger-charolais.jpg', 1, 'true'),
('Cheesburger', 'Delicieux et fondant cheesburger.', 7.60, './assets/img/food_img/burger/cheesburger.jpg', 1, 'true'),
('Burger classique', 'L indémodable classique.', 6.00, './assets/img/food_img/burger/hamburger.jpg', 1, 'true'),

('Pizza chorizo', 'La classique chorizo.', 6.00, './assets/img/food_img/pizza/pizza-chorizo.jpg', 2, 'true'),
('Pizza basilic', 'Au basilic frais.', 6.20, './assets/img/food_img/pizza/pizza-fromage-basilic.jpg', 2, 'true'),
('Pizza saumon', 'Au saumon sauvage.', 8.00, './assets/img/food_img/pizza/pizza-salmon.png', 2, 'true'),

('Pâte legumes', 'Délicieuse pâte aux légumes frais.', 6.00, './assets/img/food_img/pasta/spaghetti-legumes.jpg', 3, 'true'),
('Lasagne pâte fraiche', 'Au boeuf frais.', 6.20, './assets/img/food_img/pasta/lasagnes_viande.jpg', 3, 'true'),

('Salade fraicheur', 'La salade la plus demandée.', 6.00, './assets/img/food_img/salade/salade-fraicheur.jpg', 4, 'true'),
('Salade composee', 'Délicieusement fraiche.', 6.20, './assets/img/food_img/salade/salade-composee.jpg', 4, 'true'),
('Salade du chef', 'Délicieusement salade fraiche.', 6.40, './assets/img/food_img/salade/salade-du-chef.jpg', 4, 'true'),

('Sandwish roti crudite', 'Le sandwish le plus demandé.', 4.50, './assets/img/food_img/sandwish/sandwish-roti-crudite.jpg', 5, 'true'),
('Sandwish fromage', 'Délicieusement fromage de brebis.', 6.20, './assets/img/food_img/sandwish/sandwish-fromage.jpg', 5, 'true'),
('Maxi sandwish', 'Le sandwish à emporter partout.', 3.40, './assets/img/food_img/sandwish/maxi-sandwish.jpg', 5, 'true'),

('Bouillon de legumes', 'Le bouillon aux petits légumes de notre potagé.', 4.50, './assets/img/food_img/veggie/bouillon-legume.jpg', 6, 'true'),
('Burger veggie', 'Délicieusement burger aux haricot rouge.', 6.20, './assets/img/food_img/veggie/burger-veggie.jpg', 6, 'true'),
('Poêlée du chef', 'La poêlée du chef la plus gourmande de notre carte.', 3.40, './assets/img/food_img/veggie/poelee-du-chef.jpg', 6, 'true'),

('Wrap crudite', 'Le passe partout.', 4.50, './assets/img/food_img/wrap/wrap-crudite.jpg', 7, 'true'),
('Wrap mexicain', 'Délicieusement wrap spicy.', 6.20, './assets/img/food_img/wrap/wrap-mexicain.jpg', 7, 'true'),
('Wrap poulet', 'Délicieux wrap avec du poulet  Français, élévé en libertée.', 7.40, './assets/img/food_img/wrap/wrap-poulet.jpg', 7, 'true'),

('Ravioli', 'Délicieux ravioli au boeuf.', 7.50, './assets/img/food_img/asiatique-food/ravioli.jpg', 8, 'true'),
('Riz cantonais', 'Délicieusement riz.', 5.20, './assets/img/food_img/asiatique-food/riz-cantonais.jpg', 8, 'true'),
('Soupe asiatique', 'Délicieuse soupe.', 8.40, './assets/img/food_img/asiatique-food/soupe-asiatique.jpg', 8, 'true'),
('Sushi', 'Délicieuse sushi.', 9.90, './assets/img/food_img/asiatique-food/sushi.jpg', 8, 'true');




-- Structure de la table `commande`
CREATE TABLE `commande` (
  `id` int AUTO_INCREMENT PRIMARY KEY,
  `id_plat` int NOT NULL,
  `quantite` int NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `date_commande` datetime NOT NULL,
  `etat` varchar(50) NOT NULL,
  `nom_client` varchar(150) NOT NULL,
  `telephone_client` varchar(20) NOT NULL,
  `email_client` varchar(150) NOT NULL,
  `adresse_client` varchar(255) NOT NULL,
  FOREIGN KEY (`id_plat`) REFERENCES `plat`(`id`) ON DELETE CASCADE
);


INSERT INTO `commande` (id_plat, quantite, total, date_commande, etat, nom_client, telephone_client, email_client, adresse_client) 
VALUES
(1, 3, 15.15, '2025-01-11', 'Livrée', 'Julien Lefort', '0622334455', 'julien.lefort@email.com', '10 rue des Champs Elysées, 75008 Paris'),
(2, 2, 15.20, '2025-01-10', 'En préparation', 'Claire Dupont', '0698765432', 'claire.dupont@email.com', '19 avenue Montaigne, 75008 Paris'),
(3, 4, 24.00, '2025-01-12', 'Livrée', 'David Boucher', '0656789123', 'david.boucher@email.com', '21 rue de la Paix, 75002 Paris'),
(4, 1, 6.00, '2025-01-11', 'En cours', 'Nathalie Vasseur', '0645789234', 'nathalie.vasseur@email.com', '43 rue de la Bastille, 75011 Paris'),
(5, 5, 31.50, '2025-01-12', 'Livrée', 'Michel Legrand', '0666789101', 'michel.legrand@email.com', '76 rue du Faubourg Saint-Antoine, 75012 Paris'),
(1, 2, 10.10, '2025-01-10', 'En préparation', 'Caroline Lemoine', '0681234567', 'caroline.lemoine@email.com', '30 rue de la République, 75003 Paris'),
(3, 3, 18.00, '2025-01-07', 'Livrée', 'Xavier Martin', '0623345567', 'xavier.martin@email.com', '7 avenue de la Concorde, 75008 Paris'),
(4, 1, 6.00, '2025-01-11', 'En préparation', 'François Guérin', '0654321098', 'francois.guerin@email.com', '25 rue de la Tour, 75007 Paris'),
(5, 3, 18.60, '2025-01-06', 'Livrée', 'Amandine Lefevre', '0776543210', 'amandine.lefevre@email.com', '10 rue des Lilas, 75012 Paris');






-- Structure de la table `utilisateur`
CREATE TABLE `utilisateur` (
  `id` int AUTO_INCREMENT PRIMARY KEY,
  `nom_prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
);

INSERT INTO `utilisateur` (nom_prenom, email, password)
VALUES
('Alice Martin', 'alice.martin@email.com', 'hashedpassword1'),
('Pierre Dupuis', 'pierre.dupuis@email.com', 'hashedpassword2'),
('Marie Lefevre', 'marie.lefevre@email.com', 'hashedpassword3'),
('Lucas Bernard', 'lucas.bernard@email.com', 'hashedpassword4'),
('Sophie Dubois', 'sophie.dubois@email.com', 'hashedpassword5'),
('Julien Lefevre', 'julien.lefevre@email.com', 'hashedpassword6'),
('Chloé Dupont', 'chloe.dupont@email.com', 'hashedpassword7'),
('Thibault Moreau', 'thibault.moreau@email.com', 'hashedpassword8');




-- exercice 1 : Afficher la liste des commandes ( la liste doit faire apparaitre la date, les informations du client, le plat et le prix )--
SELECT commande.date_commande, commande.nom_client, commande.telephone_client, commande.email_client, commande.adresse_client, plat.libelle, commande.total
FROM commande
JOIN plat ON commande.id_plat = plat.id;
 

-- exercice 2 : Afficher la liste des plats en spécifiant la catégorie --
SELECT plat.*, categorie.libelle
FROM plat
JOIN categorie ON plat.id_categorie = categorie.id;


-- exercice 3 : Afficher les catégories et le nombre de plats actifs dans chaque catégorie --
SELECT categorie.libelle, COUNT(plat.id) AS nombre_plats
FROM categorie
JOIN plat ON categorie.id = plat.id_categorie
WHERE plat.active = "true"
GROUP BY categorie.id;

-- exercice 4 : Liste des plats les plus vendus par ordre décroissant --
SELECT plat.libelle, commande.quantite
FROM commande
JOIN plat ON commande.id_plat = plat.id
ORDER BY commande.quantite DESC;


-- exercice 5 : Le plat le plus rémunérateur --
SELECT libelle, prix
FROM plat
WHERE prix = (SELECT MAX(prix) FROM plat);


-- Liste des clients et le chiffre d'affaires généré par client (par ordre décroissant) --
SELECT nom_client, total AS chiffre_affaires_genere
FROM commande
ORDER BY chiffre_affaires_genere DESC;


-- rajouter un plat --
INSERT INTO plat (libelle, description, prix, image, id_categorie, active) VALUES
('Burger sauce chocolat', 'Un burger hors du commun', 20, './assets/img/food_img/burger/burger-chocolat.jpg', 1, 'false');

-- rajouter une commande --
INSERT INTO commande (id_plat, quantite, total, date_commande, etat, nom_client, telephone_client, email_client, adresse_client) VALUES 
(26, 2, 40.00, '2025-01-10', 'Livréeee', 'Alex Dupond', '0636598635', 'alexdupond@email.com', '58 rue du chemin, 75018 Paris');



-- Ecrivez une requête permettant de supprimer les plats non actif de la base de données --

-- SI CONTAINTE SUR CLEF ETRANGERE 'ON DELETE CASCADE'  --
DELETE FROM plat
WHERE active = "false";

-- SI PAS LA CONTAINTE 'ON DELETE CASCADE' SUR CLEF ETRANGERE --
DELETE FROM commande
WHERE id_plat IN (SELECT id FROM plat WHERE active = 'false');

DELETE FROM plat
WHERE active = 'false';




-- Ecrivez une requête permettant de supprimer les commandes avec le statut livré --
DELETE FROM commande
WHERE etat = "Livréeee";



-- Ecrivez un script sql permettant d'ajouter une nouvelle catégorie et un plat dans cette nouvelle catégorie. --

INSERT INTO `categorie` (libelle, image, active) VALUES
('Indienne','./assets/img/cat_img/indienne_cat.jpg','true');

INSERT INTO plat (libelle, description, prix, image, id_categorie, active) VALUES
('Plat indien', 'Ce plat est traditionnel', 15.10, './assets/img/food_img/burger/plat_indien.jpg', 1, 'false');

-- Ecrivez une requête permettant d'augmenter de 10% le prix des plats de la catégorie 'Pizza' --

UPDATE plat
SET prix = (prix + (prix * 10 / 100))
WHERE id_categorie = (SELECT id FROM categorie WHERE libelle = "Pizza"); 


-- donner les plats les plus populaire

-- donner les catégories les plus populaires


-- 1 semaine pour finir le fil rouge

-- 3 semaine pour php object et initiation a mvc