-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 08 août 2019 à 16:26
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tp2_simonjp`
--

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `prix` decimal(7,2) NOT NULL,
  `qte` int(11) NOT NULL,
  `dateParution` date NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`no`, `nom`, `description`, `prix`, `qte`, `dateParution`, `image`) VALUES
(1, 'Café Blue Moutain', 'Le Blue Mountain, café le plus réputé au monde, est cultivé en Jamaïque sur les flancs du mont Blue Mountain. Ce café est parfaitement balancé, sans amertume et d’une grande douceur. Le Blue Mountain est l’un des cafés les plus cher au monde et il est offert en quantité limitée à la Brûlerie des Cantons.', '29.99', 10, '2019-08-08', 'blue-mountain'),
(2, 'Salvador Sierra Nevada', 'Ce café d’une couleur dorée est particulièrement doux, présentant des arômes de noisette et de chocolat. Il laisse en bouche une légère note fruitée et caramel, ainsi qu’un soupçon d’acidité, subtil et agréable.', '28.99', 8, '2019-08-08', 'sierra-nevada'),
(3, 'Colombien supremo noir', 'Café corsé qui donne une sensation piquante en bouche à cause de sa torréfaction noire. Goût de café grillé neutre avec une amertume présente. Vous pouvez utiliser ce café comme passe-partout dans des mélanges afin de corser un café plus délicat.', '16.00', 15, '2019-08-08', 'supremo-noir'),
(4, 'Costa Rica Tarrazu', 'Le café du Costa Rica est un café très aromatique avec un corps soutenu. La torréfaction mi-noire permet de faire ressortir la saveur du sucre si appréciée dans ce produit. Elle rappelle même parfois le miel, selon la méthode de séchage utilisée lors de la récolte. Des saveurs d’abricot, de crème et de chocolat se combinent avec une texture onctueuse très agréable en bouche.', '16.00', 28, '2019-08-08', 'tarrazu'),
(5, 'Équitable Rythme du Monde', 'Ce mélange maison équitable de torréfaction noire est fait à partir de grains de café 100% Arabica. Son nom se veut un hommage aux multiples et riches cultures qui se croisent et s’amalgament dans la société contemporaine.', '17.20', 3, '2019-08-08', 'rythme-du-monde'),
(6, 'Bisou dodo décaféiné', 'Le Bisou dodo, notre seul mélange 100% décaféiné, est le résultat d’une recette de torréfaction unique qui a été développée pour offrir un café décaféiné, mais s’apparentant aux mélanges 7e ciel ou Saint-Germain. L’objectif était d’offrir un café mi-noir fruité, particulièrement bon en espresso.', '18.85', 7, '2019-08-08', 'bisou-dodo-decaf'),
(7, '7e ciel', 'Le premier mélange créé par les membres fondateurs de l’entreprise lors de leurs premiers pas en tant qu’artisans du café. Grâce à sa douceur et ses saveurs très subtiles, ce café figure parmi les plus consensuels de notre carte. Mélange maison de 7 grains cuits séparément.', '15.50', 12, '2019-08-08', 'sept-ciel'),
(8, 'Saveurs et Monde équitable', 'Le mélange Saveurs et monde est fait à partir de deux grains en provenance d’Amérique. On y trouvera des arômes plus bruts, rappelant la terre ou une sensation un peu plus végétale. Une acidité plus prononcée sera présente à cause de la torréfaction pâle et de la sélection des grains. ', '17.20', 4, '2019-08-08', 'saveurs-monde'),
(9, 'Honduras équitable', 'L’Honduras, pays producteur d’Arabica, est le septième producteur mondial de café. Il détient 3% de la part du marché. L’institut national du café travaille à ce que ses producteurs soient formés et soutenus. Les conditions d’agriculture du café dans ce pays font que l’on produit par défaut un produit sans pesticide.', '17.20', 8, '2019-08-08', 'honduras'),
(10, 'Moussonné Malabar', 'Ce café est caractérisé par son goût de noisettes grillées, qui vient de sa transformation. Ce café est aussi très populaire pour son faible taux de caféine et son absence d’acidité. Ses arômes de noix grillées et de beurre rappellent une pâtisserie fraîchement sortie du four. À conseiller pour ceux et celles qui sont moins tolérants à la caféine.', '16.00', 6, '2019-08-08', 'malabar');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
