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

INSERT INTO `plat` (libelle, description, prix, image, active, id_categorie) VALUES
('Burger charolais', 'Rustique et delicieux hamburger charolais. Viande Française', 9.90, './assets/img/food_img/burger/burger-charolais.jpg', 'true', 1),
('Cheesburger', 'Delicieux et fondant cheesburger.', 7.60, './assets/img/food_img/burger/cheesburger.jpg', 'true', 1),
('Le classique', 'L indémodable classique.', 6.00, './assets/img/food_img/burger/hamburger.jpg', 'true', 1),

('Pizza chorizo', 'La classique chorizo.', 6.00, './assets/img/food_img/pizza/pizza-chorizo.jpg', 'true', 2),
('Pizza basilic', 'Au basilic frais.', 6.20, './assets/img/food_img/pizza/pizza-fromage-basilic.jpg', 'true', 2),
('Pizza saumon', 'Au saumon sauvage.', 8.00, './assets/img/food_img/pizza/pizza-salmon.png', 'true', 2),

('Spaghetti legumes', 'Délicieuse pâte aux légumes frais.', 6.00, './assets/img/food_img/pasta/spaghetti-legumes.jpg', 'true', 3),
('Lasagne', 'Au boeuf frais.', 6.20, './assets/img/food_img/pasta/lasagnes_viande.jpg', 'true', 3),

('Salade fraicheur', 'La salade la plus demandée.', 6.00, './assets/img/food_img/salade/salade-fraicheur.jpg', 'true', 4),
('Salade composee', 'Délicieusement fraiche.', 6.20, './assets/img/food_img/salade/salade-composee.jpg', 'true', 4),
('Salade du chef', 'Délicieusement salade fraiche.', 6.40, './assets/img/food_img/salade/salade-du-chef.jpg', 'true', 4),

('Sandwish roti crudite', 'Le sandwish le plus demandé.', 4.50, './assets/img/food_img/sandwish/sandwish-roti-crudite.jpg', 'true', 5),
('sandwish fromage', 'Délicieusement fromage de brebis.', 6.20, './assets/img/food_img/sandwish/sandwish-fromage.jpg', 'true', 5),
('Maxi sandwish', 'Le sandwish à emporter partout.', 3.40, './assets/img/food_img/sandwish/maxi-sandwish.jpg', 'true', 5),

('bouillon de legumes', 'Le bouillon aux petits légumes de notre potagé.', 4.50, './assets/img/food_img/veggie/bouillon-legume.jpg', 'true', 6),
('Burger veggie', 'Délicieusement burger aux haricot rouge.', 6.20, './assets/img/food_img/veggie/burger-veggie.jpg', 'true', 6),
('Poêlée du chef', 'La poêlée du chef la plus gourmande de notre carte.', 3.40, './assets/img/food_img/veggie/poelee-du-chef.jpg', 'true', 6),

('Wrap crudite', 'Le passe partout.', 4.50, './assets/img/food_img/wrap/wrap-crudite.jpg', 'true', 7),
('Wrap mexicain', 'Délicieusement wrap spicy.', 6.20, './assets/img/food_img/wrap/wrap-mexicain.jpg', 'true', 7),
('Wrap poulet', 'Délicieux wrap avec du poulet  Français, élévé en libertée.', 7.40, './assets/img/food_img/wrap/wrap-poulet.jpg', 'true', 7),

('Ravioli', 'Délicieux ravioli au boeuf.', 7.50, './assets/img/food_img/asiatique-food/ravioli.jpg', 'true', 8),
('Riz cantonais', 'Délicieusement riz.', 5.20, './assets/img/food_img/asiatique-food/riz-cantonais.jpg', 'true', 8),
('Soupe asiatique', 'Délicieuse soupe.', 8.40, './assets/img/food_img/asiatique-food/soupe-asiatique.jpg', 'true', 8),
('Sushi', 'Délicieuse sushi.', 9.90, './assets/img/food_img/asiatique-food/sushi.jpg', 'true', 8);



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
  FOREIGN KEY (`id_plat`) REFERENCES `plat`(`id`)
);

-- Structure de la table `utilisateur`
CREATE TABLE `utilisateur` (
  `id` int AUTO_INCREMENT PRIMARY KEY,
  `nom_prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
);
