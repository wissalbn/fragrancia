-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 12 fév. 2024 à 19:41
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `parfumerie`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `IDCAT` int(11) NOT NULL,
  `NOMCAT` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`IDCAT`, `NOMCAT`) VALUES
(1, 'Parfum femme'),
(2, 'Parfum homme'),
(3, 'Coprs et bain');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `IDCOMMANDE` int(11) NOT NULL,
  `IDCLIENT` int(11) NOT NULL,
  `TOTAUX` float DEFAULT NULL,
  `DATECOMMANDE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE `marque` (
  `NOMMARQ` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`NOMMARQ`) VALUES
('Annayake'),
('Armani'),
('Azzaro'),
('Berdoues'),
('Biotherm'),
('Biotherm Homme'),
('Cacharel'),
('Calvin Klein'),
('Caron'),
('Cerruti'),
('Chloé'),
('Clarins'),
('ClarinsMen'),
('Clinique'),
('Coach'),
('Decléor'),
('Diesel'),
('DIOR'),
('Dolce & Gabbana'),
('Emanuel Ungaro'),
('Givenchy'),
('Guerlain'),
('HERMÈS'),
('Hérôme'),
('hh'),
('Hugo Boss'),
('Issey Miyake'),
('Jean Paul Gaultier'),
('Kenzo'),
('Lancôme'),
('Lolita Lempicka'),
('MONCLER'),
('Montblanc'),
('Mugler'),
('Nina Ricci'),
('Paco Rabanne'),
('Shiseido'),
('SISLEY'),
('Valentino'),
('Valmont'),
('Viktor & Rolf'),
('Yves Saint Laurent'),
('Zadig & Voltaire');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `IDPANIER` int(11) NOT NULL,
  `QUANTITE` int(11) DEFAULT NULL,
  `TOTAL` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `privilege`
--

CREATE TABLE `privilege` (
  `IDPRIVILEGE` int(11) NOT NULL,
  `NOMPRIVLG` varchar(20) DEFAULT NULL,
  `DESC` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `privilege`
--

INSERT INTO `privilege` (`IDPRIVILEGE`, `NOMPRIVLG`, `DESC`) VALUES
(1, 'admin', 'accès au système complet'),
(2, 'client', 'accès limité');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `IDPROD` int(11) NOT NULL,
  `IDCAT` int(11) DEFAULT NULL,
  `NOMMARQ` varchar(50) NOT NULL,
  `NOMPROD` varchar(100) NOT NULL,
  `PRIXPROD` decimal(10,2) NOT NULL,
  `TYPEPROD` varchar(50) NOT NULL,
  `URLIMAGE` varchar(500) DEFAULT NULL,
  `DESCPROD` varchar(500) DEFAULT NULL,
  `STOCK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`IDPROD`, `IDCAT`, `NOMMARQ`, `NOMPROD`, `PRIXPROD`, `TYPEPROD`, `URLIMAGE`, `DESCPROD`, `STOCK`) VALUES
(169, 3, 'Armani', 'Acqua Di Gio Homme', 26.50, 'Déodorant', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/g/i/giorgio-armani-deodorant-spray_1.jpg', 'Déodorant vaporisateur', 0),
(170, 3, 'DIOR', 'Eau Sauvage', 30.00, 'Déodorant', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/e/a/eau-sauvage-deodorant-spray_1.jpg', 'Déodorant vaporisateur. Une formule parfumée qui assure protection, fraîcheur et douceur à la peau, pour une sensation de confort et de bien être tout au long de la journée.', 10),
(171, 3, 'Hugo Boss', 'Boss Bottled', 21.50, 'Déodorant', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/b/o/boss-bottled-deodorant-spray_2_1.jpg', 'Déodorant vaporisateur. Une formule parfumée qui assure protection, fraîcheur et douceur à la peau, pour une sensation de confort et de bien être tout au long de la journée.', 10),
(172, 3, 'Caron', 'Pour Un Homme', 24.00, 'Déodorant', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/3/3/3387952008078_1_1.jpg', 'Déodorant vaporisateur. Une formule parfumée qui assure protection, fraîcheur et douceur à la peau, pour une sensation de confort et de bien être tout au long de la journée.', 10),
(173, 3, 'HERMÈS', 'Terre d\'Hermès', 29.50, 'Déodorant', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/t/e/terre-d-hermes-deodorant-spray_2.jpg', 'Déodorant vaporisateur. Une formule parfumée qui assure protection, fraîcheur et douceur à la peau, pour une sensation de confort et de bien être tout au long de la journée.', 10),
(174, 3, 'Caron', 'Pour un Homme', 26.00, 'Dédorant', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/3/3/3387952005206_1_1.jpg', 'Déodorant vaporisateur. Une formule parfumée qui assure protection, fraîcheur et douceur à la peau, pour une sensation de confort et de bien être tout au long de la journée.', 10),
(175, 3, 'HERMÈS', 'Eau d\'Orange Verte', 29.50, 'Déodorant', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/h/e/hermes-eau-d-orange-verte-deodorant-vapo_2.jpg', 'Déodorant vaporisateur. Une formule parfumée qui assure protection, fraîcheur et douceur à la peau, pour une sensation de confort et de bien être tout au long de la journée.', 10),
(176, 3, 'Jean Paul Gaultier', 'Le Male', 24.50, 'Déodorant', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/l/e/le-male-deodorant-spray-gaultier_1.jpg', 'Déodorant vaporisateur. Une formule parfumée qui assure protection, fraîcheur et douceur à la peau, pour une sensation de confort et de bien être tout au long de la journée.', 10),
(200, 3, 'Mugler', 'Alien Déodorant d\'Eclat', 30.50, 'Déodorant', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/t/h/thierry-mugler-alien-deodorant-d-eclat-en-spray_1.jpg', 'Déodorant vaporisateur. Une formule parfumée qui assure protection, fraîcheur et douceur à la peau, pour une sensation de confort et de bien être tout au long de la journée.', 12),
(201, 3, 'Paco Rabanne', 'Fame', 26.00, 'Déodorant', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/f/a/fame-deodorant-spray-paco-rabanne-150-ml_1.jpg', 'Déodorant vaporisateur. Une formule parfumée qui assure protection, fraîcheur et douceur à la peau, pour une sensation de confort et de bien être tout au long de la journée.', 12),
(202, 3, 'Nina Ricci', 'Nina', 23.50, 'Déodorant', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/n/i/nina-ricci-nina-deodorant_1.jpg', 'Déodorant vaporisateur. Une formule parfumée qui assure protection, fraîcheur et douceur à la peau, pour une sensation de confort et de bien être tout au long de la journée.', 12),
(203, 3, 'SISLEY', 'Eau du Soir', 34.50, 'Déodorant', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/s/i/sisley-eau-du-soir-deodorant-parfume-vaporisateur_2.jpg', 'Déodorant vaporisateur. Une formule parfumée qui assure protection, fraîcheur et douceur à la peau, pour une sensation de confort et de bien être tout au long de la journée.', 12),
(204, 3, 'HERMÈS', 'Twilly d\'Hermès', 38.50, 'Déodorant', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/t/w/twilly-hermes-deodorant_2.jpg', 'Déodorant vaporisateur. Une formule parfumée qui assure protection, fraîcheur et douceur à la peau, pour une sensation de confort et de bien être tout au long de la journée.', 12),
(205, 3, 'Calvin Klein', 'CK One', 16.50, 'Déodorant', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/c/a/calvin-klein-ck-one-deodorant-stick_2.jpg', 'Déodorant vaporisateur. Une formule parfumée qui assure protection, fraîcheur et douceur à la peau, pour une sensation de confort et de bien être tout au long de la journée.', 12),
(206, 3, 'Clinique', 'Aromatics Elixir', 23.00, 'Déodorant', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/c/l/clinique-armotics-elixir-deodorant_1.jpg', 'Déodorant vaporisateur. Une formule parfumée qui assure protection, fraîcheur et douceur à la peau, pour une sensation de confort et de bien être tout au long de la journée.', 12),
(207, 3, 'Chloé', 'Chloé', 29.00, 'Déodorant', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/d/e/deodorant-parfum-chloe_1.jpg', 'Déodorant vaporisateur. Une formule parfumée qui assure protection, fraîcheur et douceur à la peau, pour une sensation de confort et de bien être tout au long de la journée.', 12),
(215, 3, 'Clarins', 'Bain aux Plantes \"Tonic\"', 17.00, 'Bain et douche', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/b/a/bain-aux-plantes-tonic-clarins_2.jpg', 'Pour le bain, versez un peu de produit dans la baignoire et faites couler leau. Se masser dabord avec la mousse en respirant les vapeurs aromatiques bienfaisantes. Pour la douche, utiliser le bain aux plantes sur une éponge. La température idéale dun bain ou d une douche est de 37°C. Leau trop chaude favorise les distensions cutannées. Terminez par une douche fraîche de 20°C pour tonifier la peau.', 100),
(216, 3, 'Decléor', 'Gel Douche & Bain', 6.00, 'Bain et douche', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/g/e/gel-douche-et-bain-lavande-fine-decleor-250-ml_1.jpg', 'Pour le bain, versez un peu de produit dans la baignoire et faites couler leau. Se masser dabord avec la mousse en respirant les vapeurs aromatiques bienfaisantes. Pour la douche, utiliser le bain aux plantes sur une éponge. La température idéale dun bain ou d une douche est de 37°C. Leau trop chaude favorise les distensions cutannées. Terminez par une douche fraîche de 20°C pour tonifier la peau.', 100),
(217, 3, 'Berdoues', '1902 Mille Fleurs', 8.00, 'Bain et douche', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/g/e/gel-douche-mille-fleurs_1.jpg', 'Pour le bain, versez un peu de produit dans la baignoire et faites couler leau. Se masser dabord avec la mousse en respirant les vapeurs aromatiques bienfaisantes. Pour la douche, utiliser le bain aux plantes sur une éponge. La température idéale dun bain ou d une douche est de 37°C. Leau trop chaude favorise les distensions cutannées. Terminez par une douche fraîche de 20°C pour tonifier la peau.', 100),
(218, 3, 'Decléor', 'Gel Douche', 6.00, 'Bain et douche', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/g/e/gel-douche-eclat-vitamine-mandarine-verte-decleor-tube-250-ml_1.jpg', 'Pour le bain, versez un peu de produit dans la baignoire et faites couler leau. Se masser dabord avec la mousse en respirant les vapeurs aromatiques bienfaisantes. Pour la douche, utiliser le bain aux plantes sur une éponge. La température idéale dun bain ou d une douche est de 37°C. Leau trop chaude favorise les distensions cutannées. Terminez par une douche fraîche de 20°C pour tonifier la peau.', 100),
(222, 3, 'Valmont', 'Hand 24 Hour', 69.00, 'Main et ongles', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/h/a/hand-24-hour-valmont_1.jpg', 'Avec une formulation experte conçue pour protéger la peau et verrouiller l action anti-âge, Hand 24 Hour hydrate, répare, réconforte et protège la peau pour lutter contre les signes visibles du temps.', 50),
(223, 3, 'Biotherm', 'Bio Mains Jeunesse', 12.00, 'Main et ongles', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/b/i/biotherm-biomains_3_2.jpg', 'Avec une formulation experte conçue pour protéger la peau et verrouiller l action anti-âge, Hand 24 Hour hydrate, répare, réconforte et protège la peau pour lutter contre les signes visibles du temps.', 50),
(224, 3, 'Lancôme', 'Hydrazen', 14.50, 'Main et ongles', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/c/o/confort-creme-mains_1.jpg', 'Avec une formulation experte conçue pour protéger la peau et verrouiller l action anti-âge, Hand 24 Hour hydrate, répare, réconforte et protège la peau pour lutter contre les signes visibles du temps.', 50),
(225, 3, 'Clarins', 'Crème Jeunesse des Mains', 9.50, 'Main et ongles', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/c/r/creme-jeunesse-des-mains_1.jpg', 'Avec une formulation experte conçue pour protéger la peau et verrouiller l action anti-âge, Hand 24 Hour hydrate, répare, réconforte et protège la peau pour lutter contre les signes visibles du temps.', 50),
(226, 3, 'Hérôme', 'Stylo Magique', 19.50, 'Main et ongles', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/h/e/herome-stylo-magique-reparateur-ongles_1.jpg', 'Avec une formulation experte conçue pour protéger la peau et verrouiller l action anti-âge, Hand 24 Hour hydrate, répare, réconforte et protège la peau pour lutter contre les signes visibles du temps.', 50),
(227, 3, 'Clarins', 'Baume Jeunesse des Mains', 17.50, 'Main et ongles', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/3/6/3666057024948_1.jpg', 'Avec une formulation experte conçue pour protéger la peau et verrouiller l action anti-âge, Hand 24 Hour hydrate, répare, réconforte et protège la peau pour lutter contre les signes visibles du temps.', 50),
(228, 3, 'DIOR', 'Dior Le Baume', 39.00, 'Main et ongles', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/d/i/dior-le-baume-multiusage-revitalisant_1.jpg', 'Avec une formulation experte conçue pour protéger la peau et verrouiller l action anti-âge, Hand 24 Hour hydrate, répare, réconforte et protège la peau pour lutter contre les signes visibles du temps.', 50),
(229, 3, 'Hérôme', 'Durcisseur Doux', 19.50, 'Main et ongles', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/h/e/herome-durcisseur-doux_1.jpg', 'Avec une formulation experte conçue pour protéger la peau et verrouiller l action anti-âge, Hand 24 Hour hydrate, répare, réconforte et protège la peau pour lutter contre les signes visibles du temps.', 50),
(230, 3, 'Hérôme', 'Huile Nourissante', 16.50, 'Main et ongles', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/h/e/herome-huile-nourissante_2_1.jpg', 'Avec une formulation experte conçue pour protéger la peau et verrouiller l action anti-âge, Hand 24 Hour hydrate, répare, réconforte et protège la peau pour lutter contre les signes visibles du temps.', 50),
(231, 3, 'SISLEY', 'Sisleÿa L\'Intégral Anti-Âge', 87.00, 'Main et ongles', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/s/i/sisleya-concentre-anti-age-mains-sisley_1.jpg', 'Avec une formulation experte conçue pour protéger la peau et verrouiller l action anti-âge, Hand 24 Hour hydrate, répare, réconforte et protège la peau pour lutter contre les signes visibles du temps.', 50),
(232, 3, 'SISLEY', 'Crème Réparatrice Mains', 54.50, 'Main et ongles', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/c/r/creme-reparatrice-creme-hydratante-mains-ongles-sisley_1.jpg', 'Avec une formulation experte conçue pour protéger la peau et verrouiller l action anti-âge, Hand 24 Hour hydrate, répare, réconforte et protège la peau pour lutter contre les signes visibles du temps.', 50),
(233, 3, 'Guerlain', 'Abeille Royale', 18.00, 'Main et ongles', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/a/b/abeille-royale-gel-hygiene-douceur-des-mains-hydratant-au-concentre-de-miels_1.jpg', 'Avec une formulation experte conçue pour protéger la peau et verrouiller l action anti-âge, Hand 24 Hour hydrate, répare, réconforte et protège la peau pour lutter contre les signes visibles du temps.', 50),
(234, 3, 'Hérôme', 'Blanchisseur Ongles', 17.50, 'Main et ongles', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/h/e/herome-blanchisseur_1.jpg', 'Avec une formulation experte conçue pour protéger la peau et verrouiller l action anti-âge, Hand 24 Hour hydrate, répare, réconforte et protège la peau pour lutter contre les signes visibles du temps.', 50),
(235, 3, 'Hérôme', 'Base Coat Lissante', 16.00, 'Main et ongles', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/h/e/herome-base-lisante_1.jpg', 'Avec une formulation experte conçue pour protéger la peau et verrouiller l action anti-âge, Hand 24 Hour hydrate, répare, réconforte et protège la peau pour lutter contre les signes visibles du temps.', 50),
(237, 3, 'ClarinsMen', 'Gel Apaisant Après Rasage', 26.50, 'Soin homme', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/c/l/clarinsmen-fluide-apres-rassage_3_1.jpg', 'Ce gel frais non gras et non collant, réconforte et apaise la peau après le rasage et adoucit et revitalise le poil. Un soin après-rasage 2-en-1 qui hydrate la peau et prend soin de la barbe. Une combinaison idéale pour un quotidien facile et qui répond aux besoins des hommes exigeants.', 26),
(238, 3, 'Clarins', 'Gel Moussant Rasage Idéal', 15.50, 'Soin homme', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/g/e/gel-moussant-rasage-ideal-clarinsmen_1.jpg', 'Ce gel frais non gras et non collant, réconforte et apaise la peau après le rasage et adoucit et revitalise le poil. Un soin après-rasage 2-en-1 qui hydrate la peau et prend soin de la barbe. Une combinaison idéale pour un quotidien facile et qui répond aux besoins des hommes exigeants.', 26),
(239, 3, 'Annayake', 'Gel Hydratant Apaisant', 38.00, 'Soin homme', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/a/n/annayake-men-gel-hydratant-apaisant_1.jpg', 'Ce gel frais non gras et non collant, réconforte et apaise la peau après le rasage et adoucit et revitalise le poil. Un soin après-rasage 2-en-1 qui hydrate la peau et prend soin de la barbe. Une combinaison idéale pour un quotidien facile et qui répond aux besoins des hommes exigeants.', 26),
(240, 3, 'Biotherm Homme', 'Force Supreme Youth', 60.50, 'Soin homme', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/b/i/biotherm-homme-force-supreme-youth-architect_1.jpg', 'Ce gel frais non gras et non collant, réconforte et apaise la peau après le rasage et adoucit et revitalise le poil. Un soin après-rasage 2-en-1 qui hydrate la peau et prend soin de la barbe. Une combinaison idéale pour un quotidien facile et qui répond aux besoins des hommes exigeants.', 26),
(241, 3, 'Biotherm', 'Aquapower Shower Gel', 19.00, 'Soin homme', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/a/q/aquapower-shower-gel-douche-cheveux-revigirant-hydrtant_1.jpg', 'Ce gel frais non gras et non collant, réconforte et apaise la peau après le rasage et adoucit et revitalise le poil. Un soin après-rasage 2-en-1 qui hydrate la peau et prend soin de la barbe. Une combinaison idéale pour un quotidien facile et qui répond aux besoins des hommes exigeants.', 26),
(242, 3, 'Biotherm Homme', 'Day Control Natural Protect', 15.00, 'Soin homme', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/b/i/biotherm-homme-day-control-protection-naturelle_1.jpg', 'Ce gel frais non gras et non collant, réconforte et apaise la peau après le rasage et adoucit et revitalise le poil. Un soin après-rasage 2-en-1 qui hydrate la peau et prend soin de la barbe. Une combinaison idéale pour un quotidien facile et qui répond aux besoins des hommes exigeants.', 26),
(243, 3, 'Clarins', 'Gel Super Hydratant', 30.00, 'Soin homme', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/c/l/clarinsmen-gel-super-hydratant_3_1.jpg', 'Ce gel frais non gras et non collant, réconforte et apaise la peau après le rasage et adoucit et revitalise le poil. Un soin après-rasage 2-en-1 qui hydrate la peau et prend soin de la barbe. Une combinaison idéale pour un quotidien facile et qui répond aux besoins des hommes exigeants.', 26),
(244, 3, 'Clarins', 'Baume Super Hydratant', 30.00, 'Soin homme', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/c/l/clarinsmen-baume-super-hydratant_2_1_1_1.jpg', 'Ce gel frais non gras et non collant, réconforte et apaise la peau après le rasage et adoucit et revitalise le poil. Un soin après-rasage 2-en-1 qui hydrate la peau et prend soin de la barbe. Une combinaison idéale pour un quotidien facile et qui répond aux besoins des hommes exigeants.', 26),
(245, 3, 'Clarins', 'Huile Rasage + Barbe', 25.50, 'Soin homme', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/h/u/huile-rasage-barbe-clarins-men_1.jpg', 'Ce gel frais non gras et non collant, réconforte et apaise la peau après le rasage et adoucit et revitalise le poil. Un soin après-rasage 2-en-1 qui hydrate la peau et prend soin de la barbe. Une combinaison idéale pour un quotidien facile et qui répond aux besoins des hommes exigeants.', 26),
(246, 3, 'ClarinsMen', 'Shampoing Douche', 20.00, 'Soin homme', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/c/l/clarinsmen-shampoing-douche-cheveux-et-corps_1.jpg', 'Ce gel frais non gras et non collant, réconforte et apaise la peau après le rasage et adoucit et revitalise le poil. Un soin après-rasage 2-en-1 qui hydrate la peau et prend soin de la barbe. Une combinaison idéale pour un quotidien facile et qui répond aux besoins des hommes exigeants.', 26),
(247, 3, 'Clinique', 'Roll On Anti-Perspirant', 16.00, 'Soin homme', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/c/l/clinique-for-men-deo-roll-on_1.jpg', 'Ce gel frais non gras et non collant, réconforte et apaise la peau après le rasage et adoucit et revitalise le poil. Un soin après-rasage 2-en-1 qui hydrate la peau et prend soin de la barbe. Une combinaison idéale pour un quotidien facile et qui répond aux besoins des hommes exigeants.', 26),
(248, 3, 'Biotherm Homme', 'Force Suprême Blue Serum', 65.50, 'Soin homme', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/f/o/force-supreme-blue-serum-anti-age-reparateur_1.jpg', 'Ce gel frais non gras et non collant, réconforte et apaise la peau après le rasage et adoucit et revitalise le poil. Un soin après-rasage 2-en-1 qui hydrate la peau et prend soin de la barbe. Une combinaison idéale pour un quotidien facile et qui répond aux besoins des hommes exigeants.', 26),
(249, 3, 'Biotherm Homme', 'Day Control Déodorant 72 h', 15.00, 'Soin homme', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/b/i/biotherm-homme-day-control-protection-extreme-roll-on_1.jpg', 'Ce gel frais non gras et non collant, réconforte et apaise la peau après le rasage et adoucit et revitalise le poil. Un soin après-rasage 2-en-1 qui hydrate la peau et prend soin de la barbe. Une combinaison idéale pour un quotidien facile et qui répond aux besoins des hommes exigeants.', 26),
(250, 3, 'Biotherm Homme', 'Gel de Rasage', 15.50, 'Soin homme', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/b/i/biotherm-homme-gel-de-rasage_2_1.jpg', 'Ce gel frais non gras et non collant, réconforte et apaise la peau après le rasage et adoucit et revitalise le poil. Un soin après-rasage 2-en-1 qui hydrate la peau et prend soin de la barbe. Une combinaison idéale pour un quotidien facile et qui répond aux besoins des hommes exigeants.', 26),
(251, 3, 'ClarinsMen', 'Nettoyant Visage', 19.50, 'Soin homme', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/c/l/clarinsmen-nettoyant-visage_2_1.jpg', 'Ce gel frais non gras et non collant, réconforte et apaise la peau après le rasage et adoucit et revitalise le poil. Un soin après-rasage 2-en-1 qui hydrate la peau et prend soin de la barbe. Une combinaison idéale pour un quotidien facile et qui répond aux besoins des hommes exigeants.', 26),
(252, 3, 'Annayake', 'Soin Anti-Rides', 46.50, 'Soin homme', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/a/n/annayake-men-soin-anti-rides_1.jpg', 'Ce gel frais non gras et non collant, réconforte et apaise la peau après le rasage et adoucit et revitalise le poil. Un soin après-rasage 2-en-1 qui hydrate la peau et prend soin de la barbe. Une combinaison idéale pour un quotidien facile et qui répond aux besoins des hommes exigeants.', 26),
(253, 3, 'Biotherm Homme', 'Aquapower Eye De-Puffer', 17.00, 'Soin homme', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/b/i/biotherm-homme-aquapower-eye-de-puffer_1.jpg', 'Ce gel frais non gras et non collant, réconforte et apaise la peau après le rasage et adoucit et revitalise le poil. Un soin après-rasage 2-en-1 qui hydrate la peau et prend soin de la barbe. Une combinaison idéale pour un quotidien facile et qui répond aux besoins des hommes exigeants.', 26),
(254, 3, 'Clarins', 'Gel Energisant', 36.50, 'Soin homme', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/g/e/gel-energisant-visage-clarinsmen_1.jpg', 'Ce gel frais non gras et non collant, réconforte et apaise la peau après le rasage et adoucit et revitalise le poil. Un soin après-rasage 2-en-1 qui hydrate la peau et prend soin de la barbe. Une combinaison idéale pour un quotidien facile et qui répond aux besoins des hommes exigeants.', 26),
(255, 3, 'Biotherm Homme', 'Basic Line', 33.50, 'Soin homme', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/b/a/basic-line-emulsion-sans-alcool-apisant-reconfortant-biotherm-homme-75-ml_1.jpg', 'Ce gel frais non gras et non collant, réconforte et apaise la peau après le rasage et adoucit et revitalise le poil. Un soin après-rasage 2-en-1 qui hydrate la peau et prend soin de la barbe. Une combinaison idéale pour un quotidien facile et qui répond aux besoins des hommes exigeants.', 26),
(256, 3, 'Clarins', 'Anti-Rides Fermeté', 46.50, 'Soin homme', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/c/l/clarinsmen-anti-rides-fermete-peaux-seches_1.jpg', 'Ce gel frais non gras et non collant, réconforte et apaise la peau après le rasage et adoucit et revitalise le poil. Un soin après-rasage 2-en-1 qui hydrate la peau et prend soin de la barbe. Une combinaison idéale pour un quotidien facile et qui répond aux besoins des hommes exigeants.', 26),
(257, 3, 'Annayake', 'Mousse Nettoyante et de Rasage', 20.50, 'Soin homme', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/a/n/annayake-men-mousse-nettoyante-et-de-rasage_1.jpg', 'Ce gel frais non gras et non collant, réconforte et apaise la peau après le rasage et adoucit et revitalise le poil. Un soin après-rasage 2-en-1 qui hydrate la peau et prend soin de la barbe. Une combinaison idéale pour un quotidien facile et qui répond aux besoins des hommes exigeants.', 26),
(258, 3, 'Biotherm Homme', 'Day Control', 15.00, 'Soin homme', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/b/i/biotherm-homme-day-control-72h-spray_1.jpg', 'Ce gel frais non gras et non collant, réconforte et apaise la peau après le rasage et adoucit et revitalise le poil. Un soin après-rasage 2-en-1 qui hydrate la peau et prend soin de la barbe. Une combinaison idéale pour un quotidien facile et qui répond aux besoins des hommes exigeants.', 26),
(259, 3, 'Clinique', 'Post Shave Soother', 22.00, 'Soin homme', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/c/l/clinique-post-shave-soother_2.jpg', 'Ce gel frais non gras et non collant, réconforte et apaise la peau après le rasage et adoucit et revitalise le poil. Un soin après-rasage 2-en-1 qui hydrate la peau et prend soin de la barbe. Une combinaison idéale pour un quotidien facile et qui répond aux besoins des hommes exigeants.', 26),
(260, 3, 'ClarinsMen', 'Hydra-Sculpt', 50.00, 'Soin homme', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/c/l/clarinsmen-hydra-sculpt-soin-restructurant_2_1.jpg', 'Ce gel frais non gras et non collant, réconforte et apaise la peau après le rasage et adoucit et revitalise le poil. Un soin après-rasage 2-en-1 qui hydrate la peau et prend soin de la barbe. Une combinaison idéale pour un quotidien facile et qui répond aux besoins des hommes exigeants.', 26),
(276, 2, 'Caron', 'Pour Un Homme', 39.00, 'Eau de Toilette', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/3/3/3387952003752_1.jpg', 'L\'eau de toilette Pour Un Homme de Caron est un classique intemporel masculin. Lanc?e en 1934, cette fragrance marie la lavande, la vanille et le musc pour une senteur fra?che et raffin?e, parfaite pour l\'homme moderne en qu?te de sophistication.', 21),
(277, 2, 'Azzaro', 'Chrome', 30.50, 'Eau de Toilette', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/c/h/chrome-parfum-azzaro_3_1.jpg', 'Azzaro Chrome est une fragrance masculine embl?matique de la maison Azzaro. Lanc?e en 1996, cette eau de toilette allie fra?cheur et ?l?gance avec ses notes d\'agrumes, de musc et de bois pr?cieux. Son flacon au design ?pur? refl?te parfaitement la modernit? et la masculinit? de cette fragrance, en faisant un choix intemporel pour l\'homme contemporain.', 18),
(278, 2, 'Azzaro', 'Azzaro Pour Homme', 27.50, 'Eau de Toilette', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/a/z/azzaro-pour-homme_5_1.jpg', 'Azzaro Pour Homme est un parfum classique de la maison Azzaro, lanc? en 1978. Cette fragrance embl?matique incarne la virilit? et l\'?l?gance masculine avec ses notes de lavande, de bois de santal et de patchouli. Son flacon intemporel et raffin? en fait un choix parfait pour l\'homme sophistiqu? en qu?te de charisme et de distinction.', 14),
(279, 2, 'Diesel', 'Only the Brave', 37.00, 'Eau de Toilette', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/d/i/diesel-only-the-brave_1.jpg', 'Diesel Only the Brave est un parfum embl?matique de la marque, lanc? en 2009. Cette fragrance incarne la force et le courage avec ses notes de cuir, de citron et de bois de c?dre, tandis que son flacon en forme de poing ferm? symbolise la virilit? et l\'audace.', 12),
(280, 2, 'HERMÈS', 'H24 Herbes Vives', 65.50, 'Eau de Parfum', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/d/i/diesel-only-the-brave-tattoo_1.jpg', 'H24 Herbes Vives est une fragrance moderne de Herm?s, lanc?e en 2021. Avec ses notes v?g?tales de sauge, de narcisse et de bois de santal, elle incarne fra?cheur et vitalit?. Son flacon ?pur? refl?te l\'?l?gance caract?ristique de la marque, en faisant un choix parfait pour l\'homme contemporain en qu?te de sophistication.', 15),
(281, 2, 'DIOR', 'Sauvage', 52.00, 'Eau de Toilette', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/c/o/coffret-d-by-diesel-100-ml-2-gels-douches_1.jpg', 'Dior Sauvage est une fragrance embl?matique de Dior, lanc?e en 2015. Elle incarne la virilit? et l\'aventure avec ses notes fra?ches de bergamote, de poivre de Sichuan et de patchouli. Son flacon ?l?gant refl?te le caract?re indomptable de cette fragrance, en faisant un choix intemporel pour l\'homme moderne.', 32),
(282, 2, 'Diesel', 'Only The Brave Tattoo', 43.50, 'Eau de Toilette', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/a/z/azzaro-the-most-wanted-parfum-100-ml_1.jpg', 'Diesel Only The Brave Tattoo est une fragrance audacieuse de Diesel, lanc?e en 2012. Avec ses notes de pomme, de sauge et de tabac, elle incarne la force et l\'individualit?. Son flacon orn? de tatouages refl?te l\'esprit rebelle et distinctif de cette fragrance, en faisant un choix parfait pour l\'homme moderne en qu?te de caract?re et d\'originalit?.', 20),
(283, 2, 'Diesel', 'Coffret Parfum', 47.50, 'D by Diesel', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/f/u/fuel-for-life-homme-eau-de-toilette-50-ml_1.jpg', 'Le Coffret Parfum Diesel offre une s?lection de fragrances embl?matiques de la marque, pr?sent?es dans un ensemble ?l?gant et pratique. Combinant les parfums distinctifs de Diesel avec des produits de soin assortis, ce coffret est le cadeau parfait pour ceux qui recherchent un style audacieux et une exp?rience olfactive inoubliable.', 22),
(284, 2, 'Azzaro', 'The Most Wanted', 53.00, 'Parfum', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/k/e/kenzo-homme-eau-de-toilette-60-ml_1.jpg', 'Azzaro The Most Wanted est une fragrance envo?tante sortie en 2020. Avec ses notes vibrantes de citron, de cardamome et de v?tiver, elle incarne la s?duction et l\'audace. Son flacon en forme de pistolet symbolise la virilit? et l\'ambition de celui qui le porte.', 6),
(285, 2, 'Diesel', 'Fuel For Life Il', 30.00, 'Eau de Toilette', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/3/3/3348901368247_5.jpg', 'Diesel Fuel For Life Il, une fragrance dynamique de Diesel lanc?e en 2007, offre des notes de lavande, de v?tiver et de c?dre, exprimant ?nergie et vitalit?. Son flacon incarne l\'esprit rebelle de la marque, parfait pour l\'homme contemporain en qu?te d\'aventure.', 10),
(286, 2, 'Kenzo', 'Kenzo Homme', 36.50, 'Eau de Toilette', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/d/-/d-by-diesel-eau-de-toilette-30-ml_1.jpg', 'Kenzo Homme, une fragrance embl?matique de Kenzo lanc?e en 1991, m?le des notes fra?ches de bergamote, de menthe et de bois de c?dre, incarnant la vitalit? et la modernit?. Son flacon ?pur? refl?te l\'?l?gance discr?te de cette fragrance, en faisant un choix intemporel pour l\'homme contemporain en qu?te de fra?cheur et d\'authenticit?.', 13),
(287, 2, 'DIOR', 'Sauvage', 59.00, 'Eau de Parfum', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/t/h/the-most-wanted-azzaro-50-ml_1.jpg', 'Dior Sauvage, un classique de la maison Dior depuis 2015, s?duit avec ses notes vibrantes de bergamote, de poivre de Sichuan et de patchouli, exprimant la virilit? et l\'audace. Son flacon ?l?gant incarne parfaitement l\'esprit libre et indomptable de cette fragrance, en faisant un choix essentiel pour l\'homme contemporain en qu?te d\'aventure et de charisme.', 7),
(288, 2, 'Diesel', 'D by Diesel', 29.50, 'Eau de Toilette', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/3/6/3614273924443_6.jpg', 'D by Diesel est une fragrance captivante de la marque Diesel, lanc?e en 2009. Avec ses notes de citron, de coriandre et de vanille, elle incarne l\'audace et l\'individualit?. Son flacon distinctif refl?te le style rebelle de la marque, en faisant un choix parfait pour l\'homme moderne ? la recherche d\'une expression unique de sa personnalit?.', 4),
(289, 2, 'Azzaro', 'The Most Wanted', 51.00, 'Eau de Parfum Intense', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/3/3/3348901567572_1_1.jpg', 'Azzaro The Most Wanted est une fragrance captivante de la marque, lanc?e en 2020. Avec ses notes enivrantes de citron vert, de girofle et de f?ve tonka, elle incarne l\'audace et la s?duction. Son flacon en forme de pistolet symbolise l\'?nergie et la puissance, en faisant un choix parfait pour l\'homme moderne ? la recherche de distinction et de charisme.', 8),
(290, 2, 'Diesel', 'D Red', 33.00, 'Eau de Parfum', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/3/3/3348900838185_5.jpg', 'Diesel D Red est une fragrance unique de Diesel. Avec ses notes envo?tantes de pamplemousse, de tabac et de cuir, elle incarne l\'audace et la passion. Son flacon moderne et sophistiqu? refl?te parfaitement le caract?re rebelle de cette fragrance, id?ale pour l\'homme contemporain en qu?te d\'originalit? et de s?duction.', 16),
(291, 2, 'DIOR', 'Sauvage Elixir', 114.50, 'Parfum', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/t/e/terre-d-hermes-eau-de-toilette-vapo-100-ml_1.jpg', 'DIOR Sauvage Elixir offre une exp?rience olfactive intense et envo?tante, o? les notes vibrantes de mandarine et de cardamome se m?lent ? la chaleur du santal et de la vanille. Lanc?e en 2020, cette fragrance incarne la force et la s?duction dans un flacon ?l?gant et moderne, offrant un choix parfait pour l\'homme moderne en qu?te d\'aventure et d\'audace.', 9),
(292, 2, 'DIOR', 'Dior Homme Intense', 67.50, 'Eau de Parfum Intense', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/a/c/acqua-di-gio-armani-eau-de-toilette-100-ml_1.jpg', 'DIOR Homme Intense est Une fragrance iconique de Dior, lanc?e en 2007, m?lant les notes chaudes du cuir et de l\'ambre ? la douceur de l\'iris, pour une exp?rience olfactive captivante. Son flacon ?l?gant refl?te l\'esprit raffin? de cette fragrance, en faisant un choix parfait pour l\'homme moderne en qu?te de distinction.', 18),
(293, 2, 'HERMÈS', 'Terre d\'Hermès', 58.50, 'Eau de Toilette', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/l/-/l-eau-kenzo-pour-homme-100_1.jpg', 'HERM?S Terre d\'Herm?s est Une fragrance embl?matique de la maison Herm?s, lanc?e en 2006, m?lant les notes de pamplemousse, de poivre et de v?tiver pour une exp?rience olfactive terreuse et rafra?chissante. Son flacon minimaliste incarne l\'esprit sophistiqu? de cette fragrance, id?al pour l\'homme moderne en qu?te d\'authenticit?.', 10),
(294, 2, 'Armani', 'Acqua Di Gio Homme', 45.50, 'Eau de Toilette', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/3/3/3348901486385_1.jpg', 'Armani Acqua Di Gio Homme est une fragrance embl?matique d\'Armani, lanc?e en 1996, avec des notes rafra?chissantes de bergamote, de n?roli et de bois de c?dre, incarnant la fra?cheur et la virilit?. Son flacon ?pur? refl?te l\'esprit sophistiqu? de cette fragrance, id?al pour l\'homme moderne en qu?te de raffinement.', 19),
(295, 2, 'Kenzo', 'L\'Eau Kenzo pour Homme', 31.00, 'Eau de Toilette', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/c/a/calvin-klein-euphoria-eau-de-toilette-100-ml_1.jpg', 'Kenzo L\'Eau Kenzo pour Homme est une fragrance fra?che et dynamique, lanc?e en 1999, avec des notes aquatiques de citron vert, de gingembre et de c?dre, pour une exp?rience olfactive ?nergisante et rafra?chissante. Son flacon minimaliste refl?te l\'esprit contemporain de cette fragrance, id?ale pour l\'homme moderne en qu?te de vitalit?.', 24),
(296, 2, 'Calvin Klein', 'Euphoria', 45.00, 'Eau de Toilette', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/d/i/dior-homme-parfum-2020_1.jpg', 'Calvin Klein Euphoria est une fragrance envo?tante, lanc?e en 2006, avec des notes fruit?es de grenade et de gingembre, associ?es ? des notes chaleureuses de patchouli et de musc, pour une exp?rience olfactive sensuelle et captivante. Son flacon moderne et sophistiqu? refl?te l\'esprit luxueux de cette fragrance, id?ale pour l\'homme moderne en qu?te de s?duction.', 30),
(297, 2, 'DIOR', 'Dior Homme', 48.50, 'Eau de Parfum', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/h/2/h24-parfum-hermes-100-ml_1.jpg', 'DIOR Dior Homme est Une fragrance embl?matique de Dior, lanc?e en 2005, avec des notes ?l?gantes de v?tiver, de cuir et d\'iris, pour une exp?rience olfactive sophistiqu?e et raffin?e. Son flacon ?pur? refl?te l\'esprit minimaliste de cette fragrance, id?ale pour l\'homme moderne en qu?te d\'?l?gance et de charisme.', 25),
(298, 2, 'HERMÈS', 'H24', 74.50, 'Eau de Toilette', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/a/r/armani-acqua-di-gio_1.jpg', 'HERM?S H24 est Une fragrance moderne de la maison Herm?s, lanc?e en 2021, avec des notes de sclar?e, de rose et de bois de santal, pour une exp?rience olfactive fra?che et raffin?e. Son flacon ?pur? et minimaliste refl?te l\'esprit sophistiqu? de cette fragrance, id?ale pour l\'homme contemporain en qu?te d\'authenticit? et d\'?l?gance.', 17),
(307, 1, 'Cacharel', 'Yes I Am', 14.00, 'Eau de Parfum', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/y/e/yes-i-am-parfum-cacharel-50_5.jpg', 'Une fragrance moderne et audacieuse qui incarne la féminité et l\'audace. Avec ses notes de framboise, de jasmin et de vanille, Yes I Am séduit par sa sensualité et son caractère affirmé.', 50),
(308, 1, 'Lancôme', 'La Vie est Belle', 32.00, 'Eau de Parfum', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/l/a/lancome-la-vie-est-belle_1_5_1.jpg', 'Un parfum iconique qui célèbre la joie de vivre et la liberté. La Vie est Belle mêle des notes florales de jasmin et d\'iris à des notes gourmandes de praline, offrant une fragrance envoûtante et élégante.', 50),
(309, 1, 'Kenzo', 'Flower By Kenzo', 22.50, 'Eau de Parfum', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/f/l/flower-by-kenzo-eau-de-parfum-30-ml_1.jpg', 'Une fragrance florale délicate inspirée de la coquelicot. Avec ses notes de rose bulgare, de violette et de vanille, Flower By Kenzo offre une expérience olfactive poétique et sensuelle.', 50),
(310, 1, 'Givenchy', 'L\'Interdit', 53.50, 'Eau de Parfum', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/3/2/3274872372146_1_1.jpg', 'Une fragrance élégante et sophistiquée qui célèbre l\'interdit. L\'Interdit mêle des notes florales de jasmin et de tubéreuse à des notes boisées de vétiver, offrant une expérience olfactive envoûtante et captivante.', 50),
(311, 1, 'Givenchy', 'Irrésistible Givenchy', 53.50, 'Eau de Parfum Very Floral', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/3/2/3274872469006_1_1.jpg', 'Une fragrance vibrante et pétillante qui incarne la joie de vivre. Irrésistible Givenchy mêle des notes fruitées de poire et de prune à des notes florales de rose et de jasmin, offrant une expérience olfactive irrésistible et séduisante.', 50),
(312, 1, 'Mugler', 'Angel', 20.50, 'Eau de Parfum', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/3/4/3439600056525_6.jpg', 'Une fragrance iconique et envoûtante qui célèbre la gourmandise et la sensualité. Angel mêle des notes sucrées de caramel et de chocolat à des notes boisées de patchouli, offrant une expérience olfactive unique et captivante.', 50),
(313, 1, 'Issey Miyake', 'L\'Eau d\'Issey', 38.50, 'Eau de Toilette', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/i/s/issey-miyake-l-eau-d-issey-edt_3.jpg', 'Une fragrance fraîche et intemporelle qui célèbre la pureté et la simplicité. L\'Eau d\'Issey mêle des notes aquatiques de lotus et de rose à des notes boisées de cèdre, offrant une expérience olfactive rafraîchissante et apaisante.', 50),
(314, 1, 'Cacharel', 'Amor Amor', 32.50, 'Eau de Toilette', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/a/m/amor-amor-parfum-cacharel_6.jpg', 'Une fragrance passionnée et envoûtante qui célèbre l\'amour et la séduction. Amor Amor mêle des notes fruitées de mandarine et de cassis à des notes florales de jasmin et de muguet, offrant une expérience olfactive vibrante et sensuelle.', 50),
(315, 1, 'Jean Paul Gaultier', 'Gaultier Divine', 49.00, 'Eau de Parfum', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/8/4/8435415076821_1_1.jpg', 'Une fragrance divine et envoûtante qui célèbre la féminité et la sensualité. Gaultier Divine mêle des notes florales de rose et de fleur d\'oranger à des notes sucrées de vanille et de caramel, offrant une expérience olfactive captivante et irrésistible.', 50),
(316, 1, 'Guerlain', 'La Petite Robe Noire', 57.00, 'Eau de Parfum Absolue', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/3/3/3346470147386_6.jpg', 'Une fragrance élégante et sophistiquée qui célèbre la féminité et l\'élégance. La Petite Robe Noire mêle des notes florales de rose et de jasmin à des notes sucrées de cerise et de vanille, offrant une expérience olfactive glamour et raffinée.', 50),
(317, 1, 'DIOR', 'J\'adore Parfum d\'eau', 57.00, 'Eau de Parfum sans alcool', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/3/3/3348901597715_5.jpg', 'Une fragrance fraîche et légère qui célèbre la féminité et la liberté. J\'adore Parfum d\'eau mêle des notes florales de rose et de muguet à des notes fruitées de pêche et de melon, offrant une expérience olfactive délicate et raffinée.', 50),
(318, 1, 'Armani', 'My Way Nectar', 53.50, 'Eau de Parfum', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/3/6/3614273947770_6.jpg', 'Une fragrance envoûtante et sensuelle qui célèbre la féminité et la sophistication. My Way Nectar mêle des notes florales de jasmin et de tubéreuse à des notes sucrées de vanille et de caramel, offrant une expérience olfactive captivante et élégante.', 50),
(319, 1, 'DIOR', 'J’adore', 57.00, 'Eau de Parfum', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/3/3/3348900417885_5.jpg', 'Une fragrance iconique et envoûtante qui célèbre la féminité et la sophistication. J’adore mêle des notes florales de rose et de jasmin à des notes fruitées d\'abricot et de pêche, offrant une expérience olfactive élégante et captivante.', 50),
(320, 1, 'Issey Miyake', 'Pleats Please', 33.00, 'Eau de Toilette', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/i/s/issey-miyake-pleats-please_1.jpg', 'Une fragrance lumineuse et pétillante qui célèbre la joie de vivre et la légèreté. Pleats Please mêle des notes fruitées de nashi et de poire à des notes florales de pivoine et de patchouli, offrant une expérience olfactive joyeuse et enjouée.', 50),
(321, 1, 'DIOR', 'Miss Dior', 57.00, 'Eau de Parfum', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/3/3/3348901571449_6_1.jpg', 'Une fragrance élégante et sophistiquée qui célèbre la féminité et la romance. Miss Dior mêle des notes florales de rose et de jasmin à des notes sucrées de mandarine et de vanille, offrant une expérience olfactive envoûtante et captivante.', 50),
(322, 1, 'Lolita Lempicka', 'Mon Premier Parfum', 43.50, 'Eau de Parfum', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/m/o/mon-premier-parfum-eau-de-parfum-lolita-lempicka_2_1.jpg', 'Une fragrance envoûtante et mystérieuse qui célèbre la féminité et la séduction. Mon Premier Parfum mêle des notes florales de réglisse et de violette à des notes boisées de cèdre et de musc, offrant une expérience olfactive captivante et enivrante.', 50),
(323, 1, 'Paco Rabanne', 'Fame', 44.00, 'Eau de parfum', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/f/a/fame-eau-de-parfum-paco-rabanne-50-ml_1.jpg', 'Une fragrance audacieuse et sensuelle qui célèbre la féminité et la séduction. Fame mêle des notes fruitées de pêche et de cassis à des notes florales de rose et de jasmin, offrant une expérience olfactive irrésistible et envoûtante.', 50),
(324, 1, 'Viktor & Rolf', 'Good Fortune', 54.00, 'Eau de Parfum', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/g/o/good-fortune-viktor-rolf-eau-de-parfum-vapo-50-ml_1.jpg', 'Une fragrance envoûtante et mystérieuse qui célèbre la féminité et la séduction. Good Fortune mêle des notes florales de rose et de jasmin à des notes sucrées de vanille et de caramel, offrant une expérience olfactive captivante et enivrante.', 50),
(325, 1, 'Givenchy', 'L\'Interdit', 58.00, 'Eau de Parfum Rouge Ultime', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/3/2/3274872456334_1_1.jpg', 'Une fragrance audacieuse et envoûtante qui célèbre la féminité et la séduction. L\'Interdit Rouge Ultime mêle des notes florales de rose et de jasmin à des notes boisées de patchouli et de santal, offrant une expérience olfactive captivante et irrésistible.', 50),
(326, 1, 'Nina Ricci', 'Nina', 38.50, 'Eau de Toilette', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/n/i/nina-nina-ricci-eau-de-toilette-vapo-50-ml_1.jpg', 'Une fragrance lumineuse et pétillante qui célèbre la joie de vivre et la spontanéité. Nina mêle des notes fruitées de pomme et de citron à des notes florales de jasmin et de pivoine, offrant une expérience olfactive joyeuse et enjouée.', 50),
(327, 1, 'Armani', 'My Way', 53.50, 'Eau de Parfum', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/m/y/my-way-eau-de-parfum-armani-30-ml_1.jpg', 'Une fragrance captivante et envoûtante qui célèbre la féminité et la sophistication. My Way mêle des notes florales de tubéreuse et de jasmin à des notes sucrées de vanille et de cèdre, offrant une expérience olfactive élégante et irrésistible.', 50),
(328, 1, 'Nina Ricci', 'L\'Air du Temps', 51.00, 'Alix D. Reynis', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/a/i/air-du-temps-nina-ricci-alix-d-reynis-eau-de-parfum-50-ml_1.jpg', 'Une fragrance élégante et raffinée qui célèbre la féminité et la romance. L\'Air du Temps mêle des notes florales de rose et de jasmin à des notes épicées de clou de girofle et de muscade, offrant une expérience olfactive intemporelle et élégante.', 50),
(329, 1, 'Kenzo', 'Flower by Kenzo Ikebana', 63.00, 'Eau de Parfum', 'https://cdn2.tendance-parfums.com/media/catalog/product/cache/3cf6c4cce1c91bcdd93502d2cb334c8d/f/l/flower-by-kenzo-ikebana-eau-de-parfum-40-ml_1.jpg', 'Une fragrance florale et raffinée qui célèbre la beauté et l\'élégance. Flower by Kenzo Ikebana mêle des notes florales de pivoine et de freesia à des notes boisées de cèdre et de vétiver, offrant une expérience olfactive poétique et sophistiquée.', 5);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `IDCLIENT` int(11) NOT NULL,
  `IDPANIER` int(11) NOT NULL,
  `NOMCLIENT` varchar(30) NOT NULL,
  `CIVILITECLIENT` varchar(5) DEFAULT NULL,
  `EMAILCLIENT` varchar(50) DEFAULT NULL,
  `MDPCLIENT` varchar(20) DEFAULT NULL,
  `TELCLIENT` varchar(10) DEFAULT NULL,
  `PAYS` char(5) DEFAULT NULL,
  `VILLECLIENT` varchar(15) DEFAULT NULL,
  `ADRESSECLIENT` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_privilege`
--

CREATE TABLE `utilisateur_privilege` (
  `IDCLIENT` int(11) NOT NULL,
  `IDPRIVILEGE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`IDCAT`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`IDCOMMANDE`),
  ADD KEY `FK_PASSE` (`IDCLIENT`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`NOMMARQ`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`IDPANIER`);

--
-- Index pour la table `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`IDPRIVILEGE`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`IDPROD`),
  ADD KEY `FK_APPARTIENT` (`IDCAT`),
  ADD KEY `FK_ASSOCIE` (`NOMMARQ`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`IDCLIENT`),
  ADD KEY `FK_APPARTIENT2` (`IDPANIER`);

--
-- Index pour la table `utilisateur_privilege`
--
ALTER TABLE `utilisateur_privilege`
  ADD PRIMARY KEY (`IDCLIENT`,`IDPRIVILEGE`),
  ADD KEY `FK_POSSEDE` (`IDPRIVILEGE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `IDCAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `IDCOMMANDE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `IDPANIER` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `privilege`
--
ALTER TABLE `privilege`
  MODIFY `IDPRIVILEGE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `IDPROD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `IDCLIENT` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_PASSE` FOREIGN KEY (`IDCLIENT`) REFERENCES `utilisateur` (`IDCLIENT`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_APPARTIENT` FOREIGN KEY (`IDCAT`) REFERENCES `categories` (`IDCAT`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ASSOCIE` FOREIGN KEY (`NOMMARQ`) REFERENCES `marque` (`NOMMARQ`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_APPARTIENT2` FOREIGN KEY (`IDPANIER`) REFERENCES `panier` (`IDPANIER`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateur_privilege`
--
ALTER TABLE `utilisateur_privilege`
  ADD CONSTRAINT `FK_POSSEDE` FOREIGN KEY (`IDPRIVILEGE`) REFERENCES `privilege` (`IDPRIVILEGE`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_POSSEDE2` FOREIGN KEY (`IDCLIENT`) REFERENCES `utilisateur` (`IDCLIENT`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
