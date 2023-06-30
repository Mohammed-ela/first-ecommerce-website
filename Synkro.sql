-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 30 juin 2023 à 13:35
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

CREATE TABLE `achat` (
  `id_achat` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `montre_id` int(11) NOT NULL,
  `date_achat` timestamp NOT NULL DEFAULT current_timestamp(),
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `name`, `description`, `picture`) VALUES
(2, 'Montre connectées', 'Découvrez l&#039;alliance parfaite entre technologie avancée et style moderne avec les montres connectées. ces bijoux technologiques sont conçus pour faciliter votre vie quotidienne et vous permettre de rester connecté en toute élégance.\r\n\r\nles montres connectées combinent les fonctionnalités d&#039;une montre traditionnelle avec les avantages d&#039;un smartphone. dotées d&#039;un écran tactile intuitif et vibrant, elles vous offrent un accès instantané à un monde de possibilités. recevez des notifications en temps réel de vos appels, messages, e-mails et réseaux sociaux directement sur votre poignet, sans avoir à sortir votre téléphone.', 'montre-connected.png'),
(6, 'Montre de sport', 'Découvrez l&#039;ultime compagnon pour les amateurs de sport et les athlètes passionnés : les montres de sport haute performance ! conçues pour répondre aux exigences les plus élevées en matière de performance et de suivi, ces montres vous offrent une expérience inégalée.', 'montre-sport.png'),
(7, 'Bracelet ', 'Découvrez notre collection de bracelets interchangeables pour montres, conçus pour ajouter une touche de personnalité à votre montre préférée. Que vous souhaitiez changer de style, coordonner avec votre tenue du jour ou simplement donner un nouveau souffle à votre montre, nos bracelets interchangeables sont la solution idéale.', 'bracelet.png');

-- --------------------------------------------------------

--
-- Structure de la table `montre`
--

CREATE TABLE `montre` (
  `id_montre` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `couleur` varchar(50) NOT NULL,
  `autonomie` varchar(20) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'no-image.png',
  `avis` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp(),
  `categorie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `montre`
--

INSERT INTO `montre` (`id_montre`, `titre`, `description`, `couleur`, `autonomie`, `photo`, `avis`, `prix`, `date_creation`, `categorie_id`) VALUES
(21, 'smartfit pro ', 'La montre connectée SmartFit Pro est votre partenaire idéal pour suivre votre condition physique. Elle vous permet de mesurer votre fréquence cardiaque, de compter vos pas, de surveiller votre sommeil et bien plus encore. Restez actif et en forme avec cette montre intelligente !', 'noir', ' 5 jours', 'montre-connecté1.png', 'cette montre est incroyable ! elle suit parfaitement mes activités et m&#039;aide à rester motivé. je la recommande vivement !', 130, '2023-05-27 14:32:17', 2),
(22, 'fitplus 2000', ' la montre connectée fitplus 2000 est conçue pour les amateurs de course à pied et de cyclisme. avec son gps intégré, elle vous permet de suivre vos itinéraires et de mesurer vos performances en temps réel. elle dispose également d&#039;un moniteur de fréquence cardiaque et d&#039;un suivi d&#039;activité complet.', 'blanc', ' 7 jours', 'montre-connecté2.png', 'cette montre est géniale ! je l&#039;utilise lors de mes courses et elle m&#039;aide à améliorer mes performances. l&#039;autonomie de la batterie est également impressionnante.', 180, '2023-05-27 14:36:10', 2),
(23, 'techlife x7', 'la montre connectée techlife x7 est équipée d&#039;un écran tactile haute résolution et vous permet de recevoir des notifications de votre smartphone directement sur votre poignet. elle offre également un suivi précis de votre activité physique et de votre sommeil pour vous aider à atteindre vos objectifs.', 'noir', '4 jours', 'montre-connecté3.png', 'j&#039;adore cette montre connectée ! elle est facile à utiliser et me permet de rester informé de mes notifications tout en suivant mes activités. je la recommande !', 100, '2023-05-27 19:14:28', 2),
(24, 'fitpro 500', 'la montre connectée fitpro 500 est parfaite pour les sportifs polyvalents. elle offre un suivi multisport précis, vous permettant de mesurer vos performances dans différentes activités telles que la course, le vélo, la natation et bien d&#039;autres. avec son design élégant et ses fonctionnalités avancées, c&#039;est un choix idéal pour les athlètes.', 'noir', '6 jours', 'montre-connecté4.png', 'cette montre est fantastique ! je peux suivre mes entraînements dans différents sports et elle m&#039;aide à rester motivé. je suis très satisfait de mon achat.', 150, '2023-05-27 19:16:37', 2),
(25, 'lifetrack 300', 'la montre connectée lifetrack 300 vous aide à prendre soin de votre bien-être en suivant votre sommeil, votre fréquence cardiaque et vos niveaux de stress. elle vous fournit des informations précieuses pour améliorer votre santé globale et vous motiver à adopter un mode de vie équilibré', 'noir', '5 jours', 'montre-connecté6.png', 'je suis agréablement surpris par cette montre ! elle me donne des données intéressantes sur mon sommeil et m&#039;encourage à prendre soin de ma santé. c&#039;est un excellent rapport qualité-prix', 89, '2023-05-27 19:18:13', 2),
(26, 'fittrack x3', 'la montre connectée fittrack x3 vous offre un suivi complet de votre santé. elle mesure votre fréquence cardiaque, votre tension artérielle, votre niveau d&#039;oxygène dans le sang et bien plus encore. les utilisateurs sont ravis de sa précision et de sa facilité d&#039;utilisation.', 'noir', '5 jours', 'montre-connecté5.png', 'la fittrack x3 a changé ma vie. je peux suivre ma santé de près et prendre des mesures préventives. je la recommande vivement !', 160, '2023-05-27 19:19:36', 2),
(41, 'FitLife ActiveX', 'La montre connectée FitLife ActiveX est conçue pour les amateurs de fitness. Elle propose un suivi d\'activité avancé, y compris le suivi GPS, le suivi de la natation et des exercices spécifiques. Les utilisateurs la recommandent pour sa précision et sa solidité', 'blanc', '4 jours', 'montre-connecté7.png\r\n', 'La FitLife ActiveX est parfaite pour mes séances d\'entraînement. Elle est résistante à l\'eau et ses mesures sont très précises. Je ne peux plus m\'en passer !', 140, '2023-06-27 10:23:03', 2),
(42, 'FitPro Active', ' La montre connectée FitPro Active est parfaite pour rester actif et connecté. Elle vous permet de suivre vos pas, vos calories brûlées et de recevoir des notifications de votre smartphone. Les utilisateurs la trouvent confortable et pratique pour leur vie quotidienne.', 'blanc', '5 jours', 'montre-connecté8.png', 'La FitPro Active est une montre simple et efficace. Elle me rappelle de rester actif et les notifications sur mon poignet sont très pratiques.', 115, '2023-06-27 11:04:05', 2),
(43, 'LifeTrack HealthPro', ' La montre connectée LifeTrack HealthPro est dotée de fonctionnalités avancées de suivi de la santé, telles que le suivi du sommeil, le suivi du stress et le suivi des calories brûlées. Les utilisateurs la trouvent très utile pour améliorer leur bien-être au quotidien.', 'blanc', '4 jours', 'montre-connecté9.png', 'La LifeTrack HealthPro maide à prendre soin de ma santé. Je peux suivre mes habitudes de sommeil et gérer mon stress grâce à cette montre. Je la recommande à tous !', 80, '2023-06-27 11:08:59', 2),
(44, 'SportTech X6', '  La montre connectée SportTech X6 est conçue pour les sportifs actifs. Avec son suivi GPS intégré, elle vous permet de suivre vos itinéraires avec précision. De plus, elle offre la possibilité de stocker et écouter votre musique préférée sans avoir besoin de votre smartphone. Les utilisateurs apprécient sa facilité dutilisation et son design robuste.', 'blanc', '6 jours', 'montre-connecté10.png', 'La SportTech X6 est la meilleure montre pour les amateurs de course à pied. Son suivi GPS est très précis et jadore pouvoir écouter ma musique pendant mes séances dentraînement. Je la recommande à tous les sportifs !', 180, '2023-06-27 11:10:45', 2),
(45, 'Forerunner 945', 'La montre connectée Garmin Forerunner 945 est équipée dun GPS intégré, dun suivi avancé des performances et dune autonomie de batterie longue durée. Les utilisateurs apprécient sa précision, sa multitude de fonctionnalités et son design confortable.', 'blanc', '5 jours', 'montre-sport3.png', 'La Forerunner 945 est une montre de course fantastique. Elle me fournit toutes les données dont jai besoin pour améliorer mes performances, et sa batterie dure vraiment longtemps. Je ne peux plus mentraîner sans elle !', 200, '2023-06-27 11:52:10', 6),
(46, 'Polar Vantage V2', 'La montre connectée Polar Vantage V2 offre un suivi avancé de la performance, y compris la mesure de la fréquence cardiaque, de la puissance de course et de la récupération. Les utilisateurs la recommandent pour son interface conviviale et sa précision.', 'blanc', '6 jours', 'montre-sport5.png', 'La Vantage V2 est la meilleure montre de course que j\'ai jamais utilisée. Elle fournit des données précises et son analyse de la récupération est vraiment utile. Je la recommande vivement aux coureurs sérieux.', 170, '2023-06-27 11:52:10', 6),
(47, 'Suunto 9 Baro', 'La montre connectée Suunto 9 Baro est dotée d\'un altimètre et d\'un baromètre intégrés, ce qui la rend idéale pour les coureurs en montagne. Elle offre une longue autonomie de batterie et un suivi précis des activités. Les utilisateurs l\'apprécient pour sa robustesse et sa fiabilité.', 'blanc', '7 jours', 'montre-sport7.png', 'La Suunto 9 Baro est parfaite pour mes courses en montagne. Elle résiste aux conditions extrêmes et sa batterie tient vraiment longtemps. Je suis impressionné par ses fonctionnalités !', 250, '2023-06-27 11:52:10', 6),
(48, 'Watch Serous 7 ', 'La montre connectée Watch Serous 7 est spécialement conçue pour les coureurs, avec un suivi précis de la course, des coachs intégrés et une compatibilité avec l\'application Serous. Les utilisateurs l\'apprécient pour son intégration avec l\'écosystème android et son design élégant.', 'blanc', '5 jours', 'montre-sport9.png', 'La Watch Serous 7 est la montre parfaite pour les amateurs de course. Elle est confortable, facile à utiliser et offre une tonne de fonctionnalités utiles. Je l\'adore !', 220, '2023-06-27 11:52:10', 6),
(49, 'Fitbit Versa 3', 'La montre connectée Fitbit Versa 3 propose un suivi avancé de la fréquence cardiaque, un GPS intégré et un suivi précis de l\'activité physique. Les utilisateurs l\'apprécient pour sa facilité d\'utilisation, son confort et son application mobile conviviale.', 'rose', '3 jours', 'montre-sport4.png', 'La Fitbit Versa 3 est une montre de sport fantastique. Elle me motive à rester actif, et son suivi de la fréquence cardiaque est vraiment précis. Je la recommande à tous les coureurs.', 110, '2023-06-27 11:52:10', 6),
(50, 'Galaxis impact ', 'La montre de sport Galaxis impact offre un suivi précis du rythme cardiaque, des fonctionnalités de suivi de l\'activité physique et une étanchéité à l\'eau. Les utilisateurs l\'apprécient pour son design élégant, son écran tactile intuitif et sa compatibilité avec les smartphones Android.', 'blanc', '7 jours', 'montre-sport10.png', 'La Galaxis impact est parfaite pour mes séances de course. Elle est légère, confortable et sa batterie dure longtemps. Je la recommande sans hésitation !', 250, '2023-06-27 11:52:10', 6),
(51, 'Runify 2', 'La montre connectée Runify 2 est équipée d\'un GPS intégré, d\'un suivi complet des activités sportives et d\'une résistance à l\'eau jusqu\'à 50 mètres. Les utilisateurs l\'apprécient pour sa durabilité, son autonomie de batterie et son rapport qualité-prix.', 'bleu', '3 jours', 'montre-sport1.png', 'La Runify 2 est une montre de course incroyable. Elle fournit des données précises, son écran est lisible même en plein soleil, et sa batterie dure vraiment longtemps. Je suis très satisfait de mon achat !', 100, '2023-06-27 11:52:10', 6),
(52, 'Instinct', 'La montre connectée Instinct est conçue pour les activités en extérieur, avec une navigation GPS, un suivi de la fréquence cardiaque et une résistance aux chocs et aux conditions extrêmes. Les utilisateurs l\'apprécient pour sa robustesse, sa précision et son autonomie de batterie.', 'blanc', '3 jours', 'montre-sport6.png', 'La montre connectée Instinct est conçue pour les activités en extérieur, avec une navigation GPS, un suivi de la fréquence cardiaque et une résistance aux chocs et aux conditions extrêmes. Les utilisateurs l\'apprécient pour sa robustesse, sa précision et ', 150, '2023-06-27 11:52:10', 6),
(53, 'Watch GTD', 'La montre de sport Watch GTD propose un suivi avancé de la condition physique, une autonomie de batterie longue durée et une variété de modes d\'entraînement. Les utilisateurs l\'apprécient pour son design élégant, ses fonctionnalités étendues et son écran AMOLED de qualité.', 'grise', '4 jours', 'montre-sport2.png', 'La Watch GTD est une montre de sport exceptionnelle. Son suivi de la condition physique est très précis, et sa batterie dure vraiment longtemps. Je la recommande à tous les coureurs.', 145, '2023-06-27 11:52:10', 6),
(54, 'SPRT 3', 'La montre de sport SPRT 3 offre une mesure précise de la fréquence cardiaque au poignet, un GPS intégré et un suivi complet des activités sportives. Les utilisateurs l\'apprécient pour sa fiabilité, sa facilité d\'utilisation et sa résistance à l\'eau.', 'blanc', '5 jours', 'montre-sport3.png', 'La SPRT 3 est une montre fantastique pour les coureurs. Elle fournit des données précises, son écran est lisible même en plein soleil, et son application mobile est très pratique. Je suis entièrement satisfait de mon achat !', 145, '2023-06-27 11:52:10', 6),
(55, 'Bracelets silicone', 'Ces bracelets en silicone sont durables, légers et résistants à l\'eau, ce qui en fait un choix idéal pour les activités sportives. Disponibles dans une variété de couleurs vives, ils permettent aux utilisateurs de personnaliser leur montre connectée selon leurs préférences.', 'noir', 'null', 'bracelet1.png', 'J\'ai acheté un bracelet en silicone pour ma montre connectée et je suis très satisfait de la qualité. Il est confortable à porter pendant mes séances d\'entraînement et je peux facilement le changer pour assortir ma tenue.', 20, '2023-06-27 11:52:10', 7),
(56, 'Bracelets acier inoxydable', 'Ces bracelets en acier inoxydable offrent un look élégant et sophistiqué, parfait pour les occasions formelles ou pour donner une touche de style à la montre connectée. Disponibles dans différentes finitions (argent, noir, or rose, etc.), ils ajoutent une touche de raffinement à la montre.', 'rose', 'null', 'bracelet5.png', 'J\'ai opté pour un bracelet en acier inoxydable pour ma montre connectée et je suis impressionné par sa qualité. Il donne à ma montre un aspect premium et je reçois souvent des compliments à ce sujet.', 35, '2023-06-27 11:52:10', 7),
(57, 'Bracelets nylon', 'Ces bracelets en nylon tissé offrent un look sportif et décontracté, parfait pour les activités sportives ou les occasions informelles. Disponibles dans une variété de motifs et de couleurs, ils offrent une option légère et respirante pour les utilisateurs de montres connectées.', 'bleu clair', 'null', 'bracelet3.png', 'J\'ai opté pour un bracelet en nylon tissé pour ma montre connectée et je l\'adore. Il est léger, confortable et idéal pour mes séances d\'entraînement. De plus, le motif ajoute une touche de style unique.', 15, '2023-06-27 11:52:10', 7),
(58, 'Bracelets caoutchouc', 'Ces bracelets en caoutchouc sont durables et résistants, ce qui en fait un choix populaire pour les activités sportives intenses ou les environnements difficiles. Disponibles dans différentes couleurs, ils offrent une option pratique et fonctionnelle pour les utilisateurs de montres connectées.', 'noir', 'null', 'bracelet10.png', 'J\'ai acheté un bracelet en caoutchouc pour ma montre connectée et je suis très satisfait de sa qualité. Il est résistant à l\'eau et parfait pour mes entraînements intenses. De plus, il est facile à nettoyer après chaque séance.', 15, '2023-06-27 11:52:10', 7),
(59, 'Bracelets silicone doux', 'Ces bracelets en silicone doux offrent un toucher agréable et souple, idéal pour un port confortable tout au long de la journée. Disponibles dans une large gamme de couleurs, ils permettent aux utilisateurs de personnaliser leur montre connectée selon leur style et leurs préférences.', 'noir, jaune', 'null', 'bracelet2.png', 'J\'adore les bracelets en silicone doux pour ma montre connectée. Ils sont légers, confortables et faciles à nettoyer. Je peux les changer en fonction de ma tenue ou de mon humeur.', 25, '2023-06-27 11:52:10', 7),
(60, 'Bracelets silicone texturé', 'Ces bracelets en silicone texturé offrent une touche de style supplémentaire avec leur motif texturé unique. Ils ajoutent de la dimension à la montre connectée tout en offrant un confort optimal. Disponibles dans différentes couleurs et textures, ils permettent aux utilisateurs de se démarquer.', 'noir', 'null', 'bracelet9.png', 'Les bracelets en silicone texturé sont parfaits pour ajouter une touche de style à ma montre connectée. J\'apprécie leur texture et leur confort, en plus de leur aspect visuel intéressant.', 25, '2023-06-27 11:52:10', 7),
(61, 'Bracelets silicone antidérapant', 'Ces bracelets en silicone texturé antidérapant offrent une adhérence supplémentaire, ce qui les rend parfaits pour les activités sportives et les conditions humides. Leur texture antidérapante assure un ajustement sécurisé et un confort optimal pendant les entraînements. Disponibles dans différentes couleurs, ils combinent style et fonctionnalité.', 'noir', 'null', 'bracelet1.png', 'Les bracelets en silicone texturé antidérapant sont parfaits pour mes séances de course. Ils restent en place, même lorsque je transpire, et offrent une adhérence supplémentaire. Je les recommande aux amateurs de sport.', 15, '2023-06-27 11:52:10', 7),
(62, 'Bracelets silicone respirant', 'Ces bracelets en silicone respirant sont dotés d\'une conception perforée qui permet à l\'air de circuler et d\'évacuer la transpiration pendant les activités physiques intenses. Ils offrent un confort accru et une sensation de fraîcheur tout au long de l\'entraînement. Disponibles dans différentes couleurs, ils allient fonctionnalité et style.', 'noir', 'null', 'bracelet7.png', 'Les bracelets en silicone respirant sont mes préférés pour les séances d\'entraînement. Ils sont confortables, légers et permettent à ma peau de respirer. Je ne peux pas m\'entraîner sans eux !', 14, '2023-06-27 11:52:10', 7),
(63, 'Bracelets silicone classique', 'Ces bracelets en silicone classique offrent un look moderne et élégant. Ils sont confortables à porter et s\'adaptent facilement à la taille du poignet grâce à leur fermeture à boucle. Disponibles dans différentes combinaisons de couleurs, ils permettent aux utilisateurs de personnaliser leur montre connectée selon leur style.', 'kaki', 'null', 'bracelet8.png', 'J\'ai choisi un bracelet en silicone bicolore pour ma montre connectée et je suis très satisfait de son apparence et de sa qualité. Les couleurs se marient parfaitement et le bracelet est très confortable à porter', 10, '2023-06-27 11:52:10', 7),
(64, 'Bracelets silicone ajustable ', 'Ces bracelets en silicone ajustable offrent une taille universelle qui convient à une variété de poignets. Ils sont dotés d\'un système de fermeture à boucle ajustable qui permet un ajustement précis. Disponibles dans différentes couleurs, ils offrent un mélange de confort et de praticité.', 'noir', 'null', 'bracelet3.png', 'J\'ai choisi un bracelet en silicone ajustable pour ma montre connectée et je suis très satisfait de sa polyvalence. Je peux l\'ajuster parfaitement à mon poignet et il est très confortable à porter.', 15, '2023-06-27 11:52:10', 7);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pp` varchar(255) NOT NULL DEFAULT 'default-pp.png',
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `date_de_creation` timestamp NOT NULL DEFAULT current_timestamp(),
  `statut` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `pp`, `pseudo`, `email`, `password`, `adresse`, `numero`, `date_de_creation`, `statut`) VALUES
(74, 'Elamrani', 'momo', 'profil-646dfbb6a1510-luffy.jpg', 'Momodu957', 'mohammed@gmail.com', '$2y$10$tW9dNGxt.VtGg6svR9iBke8McFw4vvFANSDn0Oduo2mfto76wWboW', '17 rue gustave courbet', '0600000', '2023-05-26 22:20:03', 0),
(75, 'fujitora', 'lafraude', 'pujitora.png', 'pujitoranul', 'pupu@gmail.com', '$2y$10$cDGww2MHHN4YaCL8RM76g.IitxMAgLyFy8hFR/6Tgq7aaM6pQhkvy', '2 rue de la marine', '000000215', '2023-05-26 22:38:15', 0),
(76, 'EL AMRANI', 'Mohammed', 'no-image.png', 'MOMO95', 'test@gmail.com', '$2y$10$PWm23GV8UKB4W16BOHX8Ke3d1WaO5gT03FMU8xcgNZFwP6kcOC8M.', '17 rue gustave courbet', '5615615616212', '2023-05-27 12:05:47', 1),
(77, 'sergio', 'ramos', 'default-pp.png', 'sr4', 'sr4@gmail.com', '$2y$10$9wuITvt4GT.51YT7U8sHSOvDFDXZwBcBpMFeRkyp540MwiMjjfllu', 'madrid', '0615123', '2023-06-13 22:18:44', 0),
(78, 'Cristiano', 'Ronaldo', 'profil-6495706642945-profil-646b8193e3e85-4.jpg', 'CR7-', 'cr7@gmail.com', '$2y$10$rJM0bcgTWfE3mL6ju1JGzeJ.49NRvW7pNUhdNYlQ5/AAV64T8oCUO', 'madrista', '06123456789', '2023-06-23 10:13:58', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `achat`
--
ALTER TABLE `achat`
  ADD PRIMARY KEY (`id_achat`),
  ADD KEY `id_user` (`user_id`),
  ADD KEY `id_montre` (`montre_id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `montre`
--
ALTER TABLE `montre`
  ADD PRIMARY KEY (`id_montre`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD UNIQUE KEY `numero` (`numero`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `achat`
--
ALTER TABLE `achat`
  MODIFY `id_achat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `montre`
--
ALTER TABLE `montre`
  MODIFY `id_montre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
