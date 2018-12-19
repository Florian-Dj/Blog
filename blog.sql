-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 19 déc. 2018 à 11:33
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `p4_admin`
--

DROP TABLE IF EXISTS `p4_admin`;
CREATE TABLE IF NOT EXISTS `p4_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `p4_admin`
--

INSERT INTO `p4_admin` (`id`, `username`, `password`) VALUES
(1, 'J.FORTEROCHE', '$2y$10$FRXFeXHsBKOhFfYp3xAglewFjp4rNC6BmmCM9LAG2zBe4pPd/uXo.');

-- --------------------------------------------------------

--
-- Structure de la table `p4_comment`
--

DROP TABLE IF EXISTS `p4_comment`;
CREATE TABLE IF NOT EXISTS `p4_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `report_comment` varchar(255) NOT NULL DEFAULT 'false',
  `date_create` datetime NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `comment_ibfk_1` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `p4_comment`
--

INSERT INTO `p4_comment` (`comment_id`, `post_id`, `username`, `text`, `report_comment`, `date_create`) VALUES
(16, 1, 'FlorianD', 'Très bon premier épisode.<br />\r\nContinue comme ça.', '1', '2018-12-09 22:12:00'),
(17, 1, 'Amandine', 'Très beau premier épisode.<br />\r\nContinue comme ça.', 'false', '2018-12-04 09:17:05'),
(18, 1, 'Jean', 'Je pense que la suite va être vraiment bien.', 'false', '2018-12-12 11:17:52');

-- --------------------------------------------------------

--
-- Structure de la table `p4_post`
--

DROP TABLE IF EXISTS `p4_post`;
CREATE TABLE IF NOT EXISTS `p4_post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  UNIQUE KEY `id` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `p4_post`
--

INSERT INTO `p4_post` (`post_id`, `author`, `title`, `text`, `date_create`, `date_update`) VALUES
(1, 'J.FORTEROCHE', 'Au cœur de l’Alaska', '<p>Je t&rsquo;&eacute;cris de Fairbanks ! Ce sont les derni&egrave;res nouvelles que tu recevras de moi, Wayne. Je suis arriv&eacute; il y a deux jours. &Ccedil;a n&rsquo;a pas &eacute;t&eacute; facile de faire du stop dans le Yukon. Mais finalement, je suis parvenu jusqu&rsquo;ici.<br />S&rsquo;il te pla&icirc;t, retourne tout mon courrier &agrave; l&rsquo;exp&eacute;diteur. Il peut s&rsquo;&eacute;couler beaucoup de temps avant que je redescende dans le Sud. Si cette aventure tourne mal et que tu n&rsquo;entendes plus parler de moi, je veux que tu saches que je te consid&egrave;re comme quelqu&rsquo;un de formidable. Maintenant, je m&rsquo;enfonce dans la for&ecirc;t. Alex.<br /><br />Carte postale re&ccedil;ue par Wayne Westerberg &agrave; Carthage, Dakota du Sud.<br />&Agrave; 6,5 kilom&egrave;tres apr&egrave;s Fairbanks, Jim Gallien aper&ccedil;ut un auto-stoppeur qui se tenait dans la neige au bord de la route, le pouce lev&eacute; tr&egrave;s haut et grelottant dans l&rsquo;aube grise de l&rsquo;Alaska. Il n&rsquo;avait pas l&rsquo;air bien vieux ; dix-huit ans, dix-neuf peut-&ecirc;tre, pas plus. Une carabine d&eacute;passait de son sac &agrave; dos, mais il avait l&rsquo;air d&rsquo;un bon gar&ccedil;on. Dans le 49e &Eacute;tat, une carabine Remington semi-automatique n&rsquo;&eacute;tonne personne. Gallien gara sa camionnette Ford sur le bas-c&ocirc;t&eacute; et dit au jeune homme de monter.<br />L&rsquo;auto-stoppeur balan&ccedil;a son sac sur la banquette et se pr&eacute;senta :<br />&mdash; Alex.<br />&mdash; Alex ? interrogea Gallien qui attendait un nom de famille.<br />&mdash; Simplement Alex, r&eacute;pondit l&rsquo;auto-stoppeur.<br />C&rsquo;&eacute;tait un gar&ccedil;on d&rsquo;environ un m&egrave;tre soixante-dix, &eacute;lanc&eacute; et robuste. Il disait qu&rsquo;il avait vingt-quatre ans et qu&rsquo;il venait du Dakota du Sud. Il voulait se faire conduire jusqu&rsquo;aux confins du parc national du Denali. De l&agrave;, il avait l&rsquo;intention de s&rsquo;enfoncer dans le sous-bois et de &laquo; vivre &agrave; l&rsquo;&eacute;cart pendant quelques mois &raquo;.<br />Gallien, &eacute;lectricien de son &eacute;tat, se rendait &agrave; Anchorage, c&rsquo;est-&agrave;-dire &agrave; plus de 350 kilom&egrave;tres au-del&agrave; du Denali par l&rsquo;autoroute George Parks. Il r&eacute;pondit &agrave; Alex qu&rsquo;il le d&eacute;poserait l&agrave; o&ugrave; celui-ci le voudrait.<br />Le sac d&rsquo;Alex semblait peser entre 13 et 15 kilos. En chasseur et randonneur averti, Gallien jugea que c&rsquo;&eacute;tait peu pour quelqu&rsquo;un qui veut rester plusieurs mois dans l\'arri&egrave;re-pays, surtout au d&eacute;but du printemps. &laquo; Il &eacute;tait loin d&rsquo;avoir assez de nourriture et d&rsquo;&eacute;quipement pour entreprendre ce genre d&rsquo;exp&eacute;dition. &raquo;<br />Le soleil parut. La camionnette traversait des cr&ecirc;tes couvertes de for&ecirc;ts et descendait vers la rivi&egrave;re Tanana. Alex regardait les grands mar&eacute;cages balay&eacute;s par le vent qui s&rsquo;&eacute;tendent au sud. Gallien, lui, se demandait s&rsquo;il n&rsquo;avait pas embarqu&eacute; un de ces cingl&eacute;s qui remontent du sud du 48e parall&egrave;le pour venir ici, dans le Nord, vivre des aventures &agrave; la Jack London.</p>', '2018-11-09 16:25:09', '2018-12-19 12:28:40'),
(2, 'J.FORTEROCHE', 'La piste Stampede', '<p>Une sombre for&ecirc;t d&rsquo;&eacute;pic&eacute;as obscurcissait les deux rives du cours d&rsquo;eau pris par les glaces. Un coup de vent r&eacute;cent avait d&eacute;pouill&eacute; les arbres de leur blanche couverture de givre et, dans la lumi&egrave;re d&eacute;clinante, ils semblaient se courber les uns vers les autres, noirs et mena&ccedil;ants. Un grand silence r&eacute;gnait sur la terre et cette terre &eacute;tait d&eacute;sol&eacute;e, sans vie, sans mouvement, si vide et si froide qu&rsquo;elle n&rsquo;exprimait m&ecirc;me pas la tristesse. Quelque chose en elle sugg&eacute;rait le rire, mais un rire plus terrible que toute tristesse &ndash; un rire morne comme le sourire d&rsquo;un sphinx, un rire froid comme le gel et d&rsquo;une infaillibilit&eacute; sinistre. C&rsquo;&eacute;tait la sagesse puissante et incommunicable de l&rsquo;&eacute;ternit&eacute; qui riait de la futilit&eacute; de la vie et de l&rsquo;effort de vivre. C&rsquo;&eacute;tait la for&ecirc;t sauvage, la for&ecirc;t gel&eacute;e du grand Nord.<br />Jack London, Croc-blanc <br /><br />Sur la frange nord de la cha&icirc;ne de l&rsquo;Alaska, juste avant que le rempart imposant du mont McKinley et de ses satellites ne laisse place &agrave; la plaine de la Kantishna, une s&eacute;rie de sommets de moindre importance &ndash; connue sous le nom de Cha&icirc;ne Ext&eacute;rieure &ndash; descend vers les &eacute;tendues planes comme une couverture pliss&eacute;e sur un lit d&eacute;fait. Entre les ar&ecirc;tes siliceuses des deux derniers escarpements de cette Cha&icirc;ne Ext&eacute;rieure il y a une combe d&rsquo;environ huit kilom&egrave;tres que recouvre un amalgame bourbeux de mar&eacute;cages, de groupes d&rsquo;aulnes et d&rsquo;alignements d&rsquo;&eacute;pic&eacute;as ch&eacute;tifs. La piste Stampede y serpente sur un terrain ondulant et touffu : c&rsquo;est le chemin que suivit Chris McCandless pour s&rsquo;enfoncer dans cette terre inhabit&eacute;e.<br />Cette piste a &eacute;t&eacute; trac&eacute;e dans les ann&eacute;es 1930 par un c&eacute;l&egrave;bre mineur nomm&eacute; Earl Pilgrim. Elle conduit &agrave; des concessions d&rsquo;antimoine qu&rsquo;il poss&eacute;dait &agrave; la cluse de Stampede, en amont de la fourche de Clearwater sur la rivi&egrave;re Toklat. En 1961, une soci&eacute;t&eacute; de Fairbanks, la Yutan Construction, fut choisie par le nouvel &Eacute;tat d&rsquo;Alaska (l&rsquo;accession au statut d&rsquo;&Eacute;tat datait d&rsquo;&agrave; peine deux ans) pour transformer la piste en une route que les camions pourraient emprunter tout au long de l&rsquo;ann&eacute;e pour transporter le minerai.<br />Afin de loger les ouvriers pendant les travaux, la Yutan acheta trois autobus hors d&rsquo;usage, les &eacute;quipa de couchettes et d&rsquo;un simple po&ecirc;le et les fit remorquer par un tracteur dans cette contr&eacute;e d&eacute;serte et sauvage.<br />En 1963, le projet fut abandonn&eacute;. Quelque 80 kilom&egrave;tres de cette route avaient &eacute;t&eacute; construits, mais sans aucun pont pour traverser les nombreux cours d&rsquo;eau qu&rsquo;elle croise. Aussi fut-elle rapidement rendue impraticable par la fonte de la couche sup&eacute;rieure du permafrost et par les inondations saisonni&egrave;res. La Yutan ramena deux des autobus par l&rsquo;autoroute. Le troisi&egrave;me fut abandonn&eacute; &agrave; mi-chemin sur le bord de la piste pour servir d&rsquo;abri aux chasseurs et aux trappeurs. Au cours des trente ans qui ont suivi l&rsquo;abandon du chantier, la plus grande partie de la route a &eacute;t&eacute; d&eacute;truite par l&rsquo;eau, l&rsquo;&eacute;rosion et les nids de castors, mais l&rsquo;autobus est toujours l&agrave;.<br />Ce v&eacute;hicule en ruine &ndash; un vieil International Harvester des ann&eacute;es 40 &ndash; se trouve &agrave; 40 kilom&egrave;tres &agrave; l&rsquo;ouest de Healy &agrave; vol d&rsquo;oiseau. Sa masse incongrue rouille parmi les mauvaises herbes, juste apr&egrave;s la limite du parc national du Denali. Il a perdu son moteur, plusieurs vitres manquent ou sont cass&eacute;es et des d&eacute;bris de bouteilles de whisky jonchent le plancher. Sur sa carrosserie vert et blanc largement oxyd&eacute;e, on peut lire en lettres &agrave; la couleur pass&eacute;e qu&rsquo;il a appartenu autrefois au Fairbanks City Transit System. C&rsquo;&eacute;tait l&rsquo;autobus 142. De nos jours, il est fr&eacute;quent que six ou sept mois s&rsquo;&eacute;coulent sans qu&rsquo;il voie un &ecirc;tre humain. Mais, au d&eacute;but de septembre 1992, six personnes, en trois groupes distincts, s&rsquo;approch&egrave;rent le m&ecirc;me apr&egrave;s-midi de ce v&eacute;hicule abandonn&eacute;.<br />En 1980, le parc national du Denali fut agrandi de fa&ccedil;on &agrave; englober les collines de Kantishna et les sommets septentrionaux de la Cha&icirc;ne Ext&eacute;rieure, mais une parcelle basse, incluse dans la superficie du nouveau parc, fut oubli&eacute;e. C&rsquo;est une longue bande de terrain, appel&eacute;e &laquo; cantons du loup &raquo;, o&ugrave; passe la premi&egrave;re moiti&eacute; de la piste Stampede. Comme cette parcelle de 11 kilom&egrave;tres sur 32 est entour&eacute;e sur trois c&ocirc;t&eacute;s par le domaine prot&eacute;g&eacute; du parc national, elle h&eacute;berge quantit&eacute; de loups, d&rsquo;ours, de caribous, d&rsquo;&eacute;lans et autre gibier. Ce secret local est jalousement gard&eacute; par les chasseurs et les trappeurs qui le connaissent. En automne, r&eacute;guli&egrave;rement, d&egrave;s que la saison de l&rsquo;&eacute;lan commence, quelques chasseurs se rendent aupr&egrave;s du vieil autobus qui g&icirc;t non loin de la rivi&egrave;re Sushana, &agrave; l&rsquo;extr&eacute;mit&eacute; ouest de la bande de terre et &agrave; moins de 3 kilom&egrave;tres de la limite du parc.</p>', '2018-11-11 20:49:25', '2018-12-19 12:31:19'),
(5, 'J.FORTEROCHE', 'Carthage', 'Je désirais le mouvement et non une existence au cours paisible. Je voulais l’excitation et le danger, et le risque de me sacrifier pour mon amour. Je sentais en moi une énergie surabondante qui ne trouvait aucun exutoire dans notre vie tranquille.<br />\r\nLéon Tolstoï, Le Bonheur conjugal. <br />\r\nPassage souligné dans l’un des livres trouvés parmi les affaires de Chris McCandless.<br />\r\n <br />\r\nOn ne devrait pas nier que la liberté de mouvement nous a toujours exaltés. Dans notre esprit, nous l’associons à la fuite devant l’histoire, l’oppression, la loi et les obligations irritantes, nous l’associons à la liberté absolue, et pour trouver celle-ci nous avons toujours pris le chemin de l’Ouest.<br />\r\nWallace Stenger, <br />\r\nL’Ouest américain comme espace vital.<br />\r\nCarthage, dans le Dakota du Sud, a 274 habitants. C’est un petit agglomérat assoupi de maisons en bardeaux – avec des cours proprettes et des façades en briques usées par les intempéries – qui s’élèvent humblement dans l’immensité des plaines du Nord, à l’écart du temps. Des rangées de peupliers majestueux ombragent un quadrilatère de rues rarement troublées par la circulation. Il y a une épicerie, une banque, une seule station-service, un bar solitaire – le Cabaret – dans lequel Westerberg sirote un cocktail et mâchonne un petit cigare tout en se remémorant l’étrange jeune homme qu’il connaissait sous le nom d’Alex. <br />\r\nLes murs recouverts de contreplaqué du Cabaret portent des bois de cerf, des publicités pour la bière Old Milwaukee et des peintures naïves représentant l’envol de gibier à plumes.<br />\r\nDes cercles de fumée de cigarette s’élèvent au-dessus de groupes de fermiers vêtus de salopettes et coiffés de casquettes fourrées pleines de poussière. Les visages fatigués de ces hommes sont aussi crasseux que ceux des mineurs. En phrases courtes, terre à terre, ils se plaignent bruyamment du temps incertain, des champs de tournesols encore trop humides pour être moissonnés, tandis qu’au-dessus de leurs têtes la figure grimaçante de Ross Perrot clignote sur l’écran muet d’un téléviseur. Dans huit jours, la nation élira Clinton à la présidence. Cela fait maintenant presque deux mois que le corps de Chris McCandless a été retrouvé en Alaska.<br />\r\n« C’est cela qu’Alex avait l’habitude de boire, dit Westerberg tout en faisant tourner la glace dans son verre de vodka avec un froncement de sourcils. Il s’asseyait là, au bout du bar, et il nous racontait d’étonnants récits tirés de ses voyages. Il pouvait parler pendant des heures. Il y a beaucoup de gens en ville qui aimaient bien ce vieil Alex. C’est très curieux ce qui lui est arrivé. »<br />\r\nWesterberg est un homme toujours en mouvement, avec de lourdes épaules et une barbiche noire. Il possède un silo à céréales à Carthage et un autre à quelques kilomètres de la ville. Mais il passe tous les étés à diriger des équipages de moissonneuses-batteuses à la demande qui suivent la moisson depuis le nord du Texas jusqu’à la frontière canadienne. À l’automne 1990, il terminait la saison au centre nord du Montana en moissonnant la récolte d’orge pour le compte de la société Coors & Anheuser-Busch. L’après-midi du 10 septembre, à la sortie de Cut Bank, où il était allé acheter des pièces détachées pour une moissonneuse qui fonctionnait mal, il prit en stop un garçon aimable qui disait s’appeler Alex McCandless.', '2018-11-26 22:09:25', '2018-11-26 22:28:50'),
(6, 'J.FORTEROCHE', 'Detrital Wash', 'Le désert est le milieu de la révélation, il est génétiquement et physiologiquement autre, sensoriellement austère, esthétiquement abstrait, historiquement hostile… Ses formes sont puissantes et suggestives. L’esprit est cerné par la lumière et l’espace, par la nouveauté cénesthésique de la sécheresse, par la température et par le vent. Le ciel du désert nous entoure de toute part, majestueux, terrible. Dans d’autres lieux, la ligne d’horizon est brisée ou cachée ; ici, unie à ce qui se trouve au-dessus de notre tête, elle est infiniment plus vaste que dans les paysages ondoyants et les régions de forêts. Quand le ciel est dégagé, les nuages paraissent plus massifs et parfois ils donnent sur leur surface inférieure concave un reflet grandiose de la courbure de la terre…<br />\r\nLes prophètes et les ermites vont dans le désert. Les exilés et les pèlerins le traversent. C’est ici que les fondateurs des grandes religions ont cherché les vertus spirituelles et thérapeutiques de la retraite, non pour fuir mais pour trouver le réel.<br />\r\n <br />\r\nPaul Shepard, L’Homme dans le paysage, un aperçu historique de l’esthétique de la nature.<br />\r\nLe coquelicot « patte d’ours », Arctomecon californica, est une plante sauvage que l’on trouve dans une partie isolée du désert Mojave et nulle part ailleurs dans le monde. À la fin du printemps, elle donne pour un temps très court une délicate fleur dorée, mais pendant la plus grande partie de l’année, elle se recroqueville, sans grâce et ignorée, sur la terre aride. Elle est suffisamment rare pour qu’on l’ait classée espèce en danger. En octobre 1990, plus de trois mois après que McCandless eut quitté Atlanta, un surveillant du parc national nommé Bud Walsh fut envoyé du côté de l’aire de loisir du lac Mead pour répertorier les coquelicots pattes d’ours afin que le gouvernement fédéral puisse évaluer le degré de rareté de la plante.<br />\r\nElle ne pousse que sur certains sols gypseux que l’on trouve en abondance sur la rive sud du lac Mead. Aussi est-ce à cet endroit que Walsh conduisit son équipe de gardes pour mener à bien l’étude botanique. Ils tournèrent après la route de Temple Bar, suivirent pendant 3 kilomètres le lit à sec de la Detrital Wash, garèrent leurs véhicules près de la rive du lac et entreprirent d’escalader la berge ouest de la rivière, constituée par une pente à pic de gypse blanc friable. Quelques minutes plus tard, tandis qu’ils approchaient du haut de la berge, l’un des gardes, qui reprenait son souffle, se tourna vers le bas. « Regardez ! s’écria-t-il. Qu’est-ce que c’est que ça ? »<br />\r\nTout au bord du lit asséché, dans un fourré peu éloigné de l’endroit où ils avaient laissé leurs véhicules, un gros objet était dissimulé sous une bâche brune. Quand les gardes retirèrent la bâche, ils découvrirent une vieille Datsun jaune sans plaques d’immatriculation. Sur le pare-brise, une note indiquait : « Ce tas de ferraille est abandonné. Si quelqu’un peut le sortir d’ici, il est à lui. »', '2018-11-26 22:14:53', '2018-11-26 22:28:56');

-- --------------------------------------------------------

--
-- Structure de la table `p4_report`
--

DROP TABLE IF EXISTS `p4_report`;
CREATE TABLE IF NOT EXISTS `p4_report` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `author_report` varchar(255) NOT NULL,
  `text_report` text NOT NULL,
  `status_report` varchar(255) NOT NULL DEFAULT 'maintenance',
  `date_report` datetime NOT NULL,
  UNIQUE KEY `id` (`report_id`),
  KEY `report_post_post_id_fk` (`post_id`),
  KEY `report_comment_comment_id_fk` (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `p4_report`
--

INSERT INTO `p4_report` (`report_id`, `post_id`, `comment_id`, `author_report`, `text_report`, `status_report`, `date_report`) VALUES
(2, 1, 16, 'Jean', 'Commentaire, non approprier.', 'delete', '2018-12-09 22:12:46');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `p4_comment`
--
ALTER TABLE `p4_comment`
  ADD CONSTRAINT `p4_comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `p4_post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `p4_report`
--
ALTER TABLE `p4_report`
  ADD CONSTRAINT `report_comment_comment_id_fk` FOREIGN KEY (`comment_id`) REFERENCES `p4_comment` (`comment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `report_post_post_id_fk` FOREIGN KEY (`post_id`) REFERENCES `p4_post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
