SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `tp2`
--


DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ajouter_client`(IN `nom` varchar(50),IN `prenom` varchar(50),IN `adresse` varchar(50),IN `ville` varchar(50),IN `province` varchar(40),IN `codePostal` varchar(7),IN `login` varchar(20),IN `motPasse` varchar(40),IN `email` varchar(50))
BEGIN
	INSERT INTO clients (nom,prenom,adresse,ville,province,codePostal,login,motPasse,email) VALUES (nom,prenom,adresse,ville,province,codePostal,login,motPasse,email);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ajouter_commande`(IN `vdate` datetime,IN `vstatut` varchar(50),IN `vtypePaiement` varchar(50),IN `vnoClient` int)
BEGIN
	INSERT INTO commandes (date,statut,typePaiement,noClient) VALUES (vdate,vstatut,vtypePaiement,vnoClient);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ajouter_item_commande`(IN `vnoCommande` int,IN `vnoProduit` int,IN `vqte` int)
BEGIN
	INSERT INTO items_commande (noCommande,noProduit,qte) VALUES (vnoCommande,vnoProduit,vqte);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `chercher_client_par_login_passe`(IN `vlogin` varchar(20),IN `vmotPasse` varchar(40))
BEGIN
	SELECT * FROM clients WHERE login=vlogin AND motPasse=vmotPasse;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `chercher_client_par_login`(IN `vlogin` varchar(20))
BEGIN
	SELECT * FROM clients WHERE login=vlogin;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `chercher_client_par_no`(IN `vno` int(11))
BEGIN
	SELECT * FROM clients WHERE no=vno;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `chercher_commandes`(IN `vnoClient` int)
BEGIN
	SELECT * FROM commandes WHERE noClient=vnoClient ORDER BY no DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `chercher_items_commande`(IN `vnoCommande` int)
BEGIN
	SELECT * FROM items_commande WHERE noCommande=vnoCommande;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `chercher_produit`(IN `vno` int)
BEGIN
	SELECT * FROM produits WHERE no=vno;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `chercher_produits_par_nom`(IN `vnom` varchar(50))
BEGIN
    SET @champ := CONCAT('%',LOWER(TRIM(vnom)),'%');
	SELECT * FROM produits WHERE nom LIKE @champ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `lister_clients`()
BEGIN
SELECT * FROM clients;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `lister_commandes`()
BEGIN
SELECT * FROM commandes;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `lister_items_commande`(IN `vno` int)
BEGIN
SELECT * FROM items_commande WHERE noCommande=vno;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `lister_panier`()
BEGIN
SELECT * FROM panier;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `lister_produits`()
BEGIN
SELECT * FROM produits;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifier_client`(IN `vnom` varchar(50),IN `vprenom` varchar(50),IN `vadresse` varchar(50),IN `vville` varchar(50),IN `vprovince` varchar(40),IN `vcodePostal` varchar(7),IN `vlogin` varchar(20),IN `vmotPasse` varchar(40),IN `vemail` varchar(50))
BEGIN
	UPDATE clients SET nom = vnom,prenom = vprenom,adresse=vadresse,ville=vville,province=vprovince,codePostal=vcodePostal,motPasse=vmotPasse,email=vemail WHERE login = vlogin;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifier_client_sans_motPasse`(IN `vnom` varchar(50),IN `vprenom` varchar(50),IN `vadresse` varchar(50),IN `vville` varchar(50),IN `vprovince` varchar(40),IN `vcodePostal` varchar(7),IN `vlogin` varchar(20),IN `vemail` varchar(50))
BEGIN
	UPDATE clients SET nom = vnom,prenom = vprenom,adresse=vadresse,ville=vville,province=vprovince,codePostal=vcodePostal,email=vemail WHERE login = vlogin;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifier_commande`(IN `vno` int,IN `vdate` datetime,IN `vstatut` varchar(50),IN `vtypePaiement` varchar(50),IN `vnoClient` int)
BEGIN
	UPDATE commandes SET date = vdate,statut = vstatut,typePaiement=vtypePaiement,noClient=vnoClient WHERE no = vno;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifier_item_commande`(IN `vnoCommande` int,IN `vnoProduit` int,IN `vqte` int)
BEGIN
	UPDATE items_commandes SET qte=vqte WHERE noCommande = vnoCommande AND noProduit = vnoProduit;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifier_qte_produit`(IN `vno` int,IN `vqte` int)
BEGIN
	UPDATE produits SET qte = vqte WHERE no = vno;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `supprimer_item_commande`(IN `vnoCommande` int,IN `vnoProduit` int)
BEGIN
	DELETE FROM items_commande WHERE noCommande=vnoCommande AND noProduit=vnoProduit;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `province` varchar(40) NOT NULL,
  `codePostal` char(7) NOT NULL,
  `login` varchar(20) NOT NULL,
  `motPasse` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE IF NOT EXISTS `commandes` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `statut` varchar(50) NOT NULL,
  `typePaiement` varchar(50) NOT NULL,
  `noClient` int(11) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `items_commande`
--

CREATE TABLE IF NOT EXISTS `items_commande` (
  `noCommande` int(11) NOT NULL,
  `noProduit` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  PRIMARY KEY (`noCommande`,`noProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `prix` decimal(7,2) NOT NULL,
  `qte` int(11) NOT NULL,
  `dateParution` date NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
