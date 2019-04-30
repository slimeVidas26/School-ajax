-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 18 avr. 2018 à 18:22
-- Version du serveur :  10.1.29-MariaDB
-- Version de PHP :  7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `school`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrators`
--

CREATE TABLE `administrators` (
  `id` int(11) NOT NULL,
  `adminName` varchar(100) DEFAULT NULL,
  `adminRole` varchar(100) DEFAULT NULL,
  `adminPhone` varchar(30) DEFAULT NULL,
  `adminImage` varchar(300) DEFAULT NULL,
  `adminEmail` varchar(50) NOT NULL,
  `adminHash` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administrators`
--

INSERT INTO `administrators` (`id`, `adminName`, `adminRole`, `adminPhone`, `adminImage`, `adminEmail`, `adminHash`) VALUES
(17, 'Claude Wade', 'owner', '787878', 'admin_1524067944.jpg', 'owner@school.com', '$2y$07$223.xEod5alNs.vW8IvvmOROZeyoVHKest2DbShOIZabuvqWnWDFa'),
(21, 'Courtney Henderson', 'sale', '787878', 'admin_1524068003.jpg', 'Courtney Henderson@gmail.com', '$2y$07$S0ouZPz4IL4DZJv6UdFVBO8U6krg6ogdZ3bvHk8wfX7UGBAslUSva'),
(28, 'dahan lea', 'sale', '0502525465', 'admin_1523620800.jpg', 'leadahan@gmail.com', '$2y$07$F83N6IOcSX0Tsde23czJdOz4smqmqGcDs8R0TUCAm9CBSWVLh0krS'),
(29, 'Perry Nichols', 'manager', '8888878', 'admin_1524068046.jpg', 'PerryNichols@gmail.com', '$2y$07$Bb2dsrdPNPlL2T4/FnTkPOJEnknD3nwilFaTrzz.bu0fCFWPbD5lK'),
(30, 'Christian Horton', 'manager', '45545454545', 'admin_1524067961.jpg', 'ChristianHorton@gmail.com', '$2y$07$PbtbPWOXoKPVRpzaz8tvG.B3ypu2VrwgIfdlvQA4SdbnTs4h7TNcK'),
(31, 'Paul Jackson', 'sale', '45210212', 'admin_1524067382.jpg', 'PaulJackson@gmail.com', '$2y$07$syyAoOXEjQQ80d4bNwV0LekAUcrJbegCPpyjj4atf2sWr4K0kTrOW'),
(33, 'Eli Garcia', 'sale', '753159', 'admin_1524068026.jpg', 'EliGarcia@gmail.com', '$2y$07$XK9d3mzF4Cf/hwpAl0y93Op4l09tfLgwB8y9QLcCBadzHV9SPhVM6');

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `courseName` varchar(100) NOT NULL,
  `coursePhone` varchar(40) DEFAULT NULL,
  `courseDescription` text NOT NULL,
  `courseImage` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`id`, `courseName`, `coursePhone`, `courseDescription`, `courseImage`) VALUES
(60, 'Art', NULL, 'We understand that each of our students is a uniquely talented individual. Within our supportive community, students are facilitated to develop positive relationships and grab the opportunity to realize their individual potential to the full.', 'course_1522854150.jpg'),
(61, 'English', NULL, 'About University\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem.', 'course_1522854097.jpg'),
(71, 'Painting', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'course_1522854042.jpg'),
(78, 'History', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'course_1522854207.jpg'),
(90, 'Sport', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'course_1522853914.jpg'),
(91, 'Geography', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'course_1522853861.jpg'),
(92, 'economie', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'course_1522857175.jpg'),
(93, 'Science', NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'course_1522856216.jpg'),
(94, 'Biology', NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'course_1522856080.jpg'),
(97, 'Bioethique', NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'course_1522855080.png'),
(98, 'Computers', NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'course_1522855104.png'),
(99, 'Droit', NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'course_1522855126.png'),
(100, 'Technologie', NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'course_1522855359.png'),
(101, 'Medecine', NULL, '                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).                ', 'course_1524068598.png'),
(102, 'potery', '44554545', '      On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L\'avantage du Lorem Ipsum sur un texte générique comme \'Du texte. Du texte. Du texte.\' est qu\'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard. De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'à leur phase de construction. Plusieurs versions son  ', 'course_1524068312.jpg'),
(103, 'botanic', NULL, '  On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L\'avantage du Lorem Ipsum sur un texte générique comme \'Du texte. Du texte. Du texte.\' est qu\'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard. De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'à leur phase de construction. Plusieurs versions son', 'course_1524067683.jpg'),
(105, 'Sculpture', NULL, '         Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.         ', 'course_1524068280.jpg'),
(106, 'Dental', NULL, '        Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.          ', 'course_1524066380.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `course_student`
--

CREATE TABLE `course_student` (
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `course_student`
--

INSERT INTO `course_student` (`course_id`, `student_id`) VALUES
(94, 2),
(93, 2),
(92, 2),
(92, 5),
(93, 6),
(92, 6),
(94, 8),
(93, 8),
(92, 8),
(94, 10),
(93, 10),
(92, 10),
(0, 26),
(0, 27),
(102, 28),
(99, 29),
(101, 31),
(99, 31),
(97, 32),
(94, 32),
(93, 32),
(60, 33),
(103, 35),
(99, 42),
(98, 43);

-- --------------------------------------------------------

--
-- Structure de la table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `studentName` varchar(100) NOT NULL,
  `studentPhone` varchar(100) NOT NULL,
  `studentEmail` varchar(100) NOT NULL,
  `studentImage` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `students`
--

INSERT INTO `students` (`id`, `studentName`, `studentPhone`, `studentEmail`, `studentImage`) VALUES
(1, 'Becky Herrera', '8547854', 'Becky Herrera@gmail.com', 'student_1522854888.jpg'),
(2, 'Mitchell Carter', '4512000', 'MitchellCarter@gmail.com', 'student_1524067641.jpg'),
(4, 'Andrew Sharp', '565656', 'Andrew Sh@gmail.comarp', 'student_1522854803.jpg'),
(5, 'Sandra Jones', '45454545', 'Sandra Jones@gmail.com', 'student_1522856084.jpg'),
(6, 'Victor Martinez', '856478', 'Victor Martinez@gmail.com', 'student_1522854727.jpg'),
(7, 'Sandra Jones', '784512', 'Sandra Jones@gmail.com', 'student_1522855219.jpg'),
(8, 'Brad Pitt', '784512', 'Brad Pitt@gmail.com', 'student_1523798190.jpg'),
(10, 'nicolas bis nbnb', '45485785875', 'nicolascage@gmail.com', 'student_1523798551.jpg'),
(11, 'noemie bamb', '8525878545', 'noemie.jones@gmail.com', 'student_1523797492.jpg'),
(12, 'Robert Walters', '444444', 'RobertWalters@gmail.com', 'student_1524067693.jpg'),
(13, 'Martha Harris', '445454545', 'MarthaHarris@gmail.com', 'student_1524067804.jpg'),
(15, 'Arthur Henry', '8878878', 'ArthurHenry@gmail.com', 'student_1524067761.jpg'),
(17, 'Renee Beck', '989898989', 'Renee Beck@gmail.com', 'student_1524067519.jpg'),
(22, 'Harper Lowe', '5565656', 'Harper Lowe@gmail.com', 'student_1524067466.jpg'),
(23, 'Seth Fuller', '5555555555555555555', 'SethFuller@gmail.com', 'student_1524067413.jpg'),
(24, 'Clyde Burns', '787887', 'ClydeBurns@gmail.com', 'student_1524067363.jpg'),
(25, 'Karl Clark', '787887', 'Karl Clark@gmail.com', 'student_1524067328.jpg'),
(27, 'Jacqueline Sanders', '56898956', 'JacquelineSanders@gmail.com', 'student_1524067293.jpg'),
(28, 'Brad Smith', '4545454', 'BradSmith@gmail.com', 'student_1524067235.jpg'),
(29, 'Wayne Price', '456123', 'WaynePrice@gmail.com', 'student_1524067178.jpg'),
(30, 'Randy Bell', '89741223', 'RandyBell@gmail.com', 'student_1524067138.jpg'),
(31, 'Brittany Warren', '5468569', 'BrittanyWarren@gmail.com', 'student_1524067096.jpg'),
(32, 'Emile Obrien', '457812545', 'EmilyObrien@gmail.com', 'student_1524067054.jpg'),
(33, 'landon hanson', '5478212', 'landon.hanson53@example.com', 'student_1524067002.jpg'),
(34, 'beverley watts84', '77777', 'beverley.watts84@example.com', 'student_1524066949.jpg'),
(35, 'Mario Kelley', '8956523', 'MarioKelley@gmail.com', 'student_1524066908.jpg'),
(36, 'Phillip Castro', '8975421', 'PhillipCastro@gmail.com', 'student_1524066164.jpg'),
(41, 'Jesse Lowe', '8525852', 'JesseLowe@gmail.com', 'student_1524066205.jpg'),
(43, 'Dustin Cole', '45454545', 'DustinCole@gmail.com', 'student_1524066480.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `course_student`
--
ALTER TABLE `course_student`
  ADD KEY `course_id` (`course_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id_2` (`course_id`),
  ADD KEY `student_id_2` (`student_id`);

--
-- Index pour la table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT pour la table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
