-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 25 Apr 2017 pada 16.44
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `p_news`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `article_`
--

CREATE TABLE IF NOT EXISTS `article_` (
`id_article` int(11) NOT NULL,
  `code_article` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title_article` varchar(100) DEFAULT NULL,
  `slug_article` varchar(100) NOT NULL,
  `id_category` varchar(100) DEFAULT '0',
  `content_article` text,
  `viewed_article` varchar(200) DEFAULT '0',
  `tags_article` text,
  `status_article` int(11) DEFAULT '1',
  `create_article` varchar(100) DEFAULT NULL,
  `update_article` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `article_`
--

INSERT INTO `article_` (`id_article`, `code_article`, `id_user`, `title_article`, `slug_article`, `id_category`, `content_article`, `viewed_article`, `tags_article`, `status_article`, `create_article`, `update_article`) VALUES
(11, '58fcb7fec9c4a', 1, '', '', '5', '', '0', '', 1, '1492957182', '1492967170'),
(12, '58fcdf04c9d68', 1, 'Saya Adalah seorang kapten dia adalah haha', 'saya-adalah-seorang-kapten-dia-adalah-haha', '5', '**Phosfluorescently** monetize multimedia based imperatives with state of the art synergy. Energistically provide access to vertical products without B2C schemas. Professionally seize resource sucking e-tailers for empowered process improvements. Competently network magnetic action items without bricks-and-clicks core competencies. Professionally promote premium total linkage before innovative alignments.\n\nCollaboratively unleash high-quality data before premier portals. Conveniently drive equity invested leadership with global information. Dramatically evisculate scalable technology via parallel processes. Competently build progressive outsourcing whereas exceptional platforms. Quickly synthesize customized ROI and magnetic infomediaries.\n\nConveniently optimize goal-oriented quality vectors rather than value-added resources. Monotonectally maximize strategic manufactured products without enabled portals. Phosfluorescently.', '0', 'Bisa loh, Bisa,', 1, '1492967172', '1493044714'),
(14, '58fe22ae99b76', 1, NULL, '', '0', NULL, '0', NULL, 1, '1493050030', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `article_category`
--

CREATE TABLE IF NOT EXISTS `article_category` (
`id_category` int(11) NOT NULL,
  `code_category` varchar(100) NOT NULL,
  `name_category` varchar(100) NOT NULL,
  `slug_category` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `article_category`
--

INSERT INTO `article_category` (`id_category`, `code_category`, `name_category`, `slug_category`) VALUES
(4, '58fcdb9fd5758', 'Berita', 'berita'),
(5, '58fcdbb1149a1', 'Artikel', 'artikel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `article_cover`
--

CREATE TABLE IF NOT EXISTS `article_cover` (
`id_cover` int(11) NOT NULL,
  `name_cover` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('uq2f10q1nmj3p5plb821smoeme59a6fn', '::1', 1493038079, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333033383037393b),
('0mosrqu5b6b2sqc1jd17m14td0312q2j', '::1', 1493038381, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333033383338313b),
('4em9acpev6t11s5qt0shqfnql2cjuinn', '::1', 1493041677, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333034313637373b),
('ltqs9t621ej3d81o20246k5rpfr8lr3l', '::1', 1493043189, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333034333138393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b66756c6c5f6e616d657c733a31333a2241646d696e6973747261746f72223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343933303335383739223b6d6573736167657c733a32393a223c703e4c6f6767656420496e205375636365737366756c6c793c2f703e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('k7miqr6mvmi5kj3ukfhgl8uf7mqg031b', '::1', 1493043490, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333034333439303b),
('g6fskaknbkt84b4090pofdt2dpcovi61', '::1', 1493043792, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333034333739323b),
('hhsauec6i8pniimr6pkv427r646e62cp', '::1', 1493044391, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333034343039333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b66756c6c5f6e616d657c733a31333a2241646d696e6973747261746f72223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343933303433313839223b6d6573736167657c733a32393a223c703e4c6f6767656420496e205375636365737366756c6c793c2f703e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('7qcb9s7aqfah2a6464imegj6asfgc0nm', '::1', 1493044414, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333034343339373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b66756c6c5f6e616d657c733a31333a2241646d696e6973747261746f72223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343933303434333931223b6d6573736167657c4e3b),
('l7oh3p36k5r5ulq6igqjcj6s96n723ni', '::1', 1493044723, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333034343731353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b66756c6c5f6e616d657c733a31333a2241646d696e6973747261746f72223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343933303434343030223b6d6573736167657c733a32393a223c703e4c6f6767656420496e205375636365737366756c6c793c2f703e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('h3nvg09nm8572taum6va68ag0hq9k6jh', '::1', 1493045024, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333034353032343b),
('9eokbje33sml5shjtq09e23hgi0tvdml', '::1', 1493045386, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333034353332353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b66756c6c5f6e616d657c733a31333a2241646d696e6973747261746f72223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343933303434373233223b),
('ivc0n0dc6eoan1vr0ig67f73usnoc2en', '::1', 1493045664, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333034353636343b),
('3ru9mufc9g04lcbhj3uu1gpdjfe3vppk', '::1', 1493046358, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333034363237363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b66756c6c5f6e616d657c733a31333a2241646d696e6973747261746f72223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343933303435333633223b6d6573736167657c4e3b),
('jl7jej4ld7k0bgj668qidiv1q4o5apd8', '::1', 1493046668, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333034363636383b),
('sfvttj3pkgr5a0rm2knib233ue6re86g', '::1', 1493047081, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333034373038313b),
('vbnuanfvf0di53ro2br5urjmlv2lii70', '::1', 1493047384, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333034373338343b),
('vtppnlhs5nfoqt8797bres3peb9fd4a2', '::1', 1493047685, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333034373638353b),
('dsd0up2lr9rjdd2l35b6t31ap67phjob', '::1', 1493047986, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333034373938363b),
('c1l48i83ia9ka6adpqq095oje1kr0i3d', '::1', 1493048287, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333034383238373b),
('5d357hescf5vmp4gssqam82psn214d7k', '::1', 1493048589, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333034383538383b),
('rjdr2mc4b7jdof1dj885m4ja9ubkii42', '::1', 1493049136, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333034393133363b),
('fqhq3lin3r2al0quv2jd67m5tdpf6tkd', '::1', 1493049437, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333034393433373b),
('soopu4ep559jb0jdcsplgnbam0kbev6a', '::1', 1493050031, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333034393733383b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b66756c6c5f6e616d657c733a31333a2241646d696e6973747261746f72223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343933303436333137223b6d6573736167657c4e3b),
('vjgi5vqvnn6sm90do25uabc4n0es6rbe', '::1', 1493050306, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333035303235373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b66756c6c5f6e616d657c733a31333a2241646d696e6973747261746f72223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343933303439383439223b),
('43ahj8fd1k230i5a2ngjkppa6v6n6nva', '::1', 1493050607, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333035303630373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b66756c6c5f6e616d657c733a31333a2241646d696e6973747261746f72223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343933303439383439223b),
('4kgkaugdehrhtkhera9tusako1d63cvb', '::1', 1493050908, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333035303930383b),
('755eho3k36ir2p9p8h8gptn5uked8440', '::1', 1493051210, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333035313231303b),
('ft8b8cageo8ru6gg8ccuggiqd00qmqf5', '::1', 1493051513, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333035313531333b),
('et2dmp391ts3ocj4388or9tta0q6tajd', '::1', 1493051814, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333035313831343b),
('qkig18qv0hs733mkvdjc699r4s8s2vbv', '::1', 1493052116, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333035323131363b),
('nofq8end4g9mrkcj5c8anepgqk6qbjdf', '::1', 1493052417, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333035323431373b),
('5a4upcmmsg8nu70tpn1ifj12lj8esbqv', '::1', 1493052983, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333035323731383b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b66756c6c5f6e616d657c733a31333a2241646d696e6973747261746f72223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343933303530323631223b6d6573736167657c733a32393a223c703e4c6f6767656420496e205375636365737366756c6c793c2f703e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('9g29hpqtmt83tot735afd5v4rhpsqacd', '::1', 1493053571, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333035333238343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b66756c6c5f6e616d657c733a31333a2241646d696e6973747261746f72223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343933303532393832223b),
('atb91c1vtc0s0rotg68iu6hvoif83pp7', '::1', 1493053602, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333035333539303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b66756c6c5f6e616d657c733a31333a2241646d696e6973747261746f72223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343933303533353633223b),
('t94dkbd8tdcio9v783ropud96vrc3cn4', '127.0.0.1', 1493121285, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333132313236363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b66756c6c5f6e616d657c733a31333a2241646d696e6973747261746f72223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343933303533353936223b6d6573736167657c733a32393a223c703e4c6f6767656420496e205375636365737366756c6c793c2f703e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('ko1kgeqd1v7btpvt9o2h8ldcit7bhvdn', '127.0.0.1', 1493121616, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333132313538363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b66756c6c5f6e616d657c733a31333a2241646d696e6973747261746f72223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231343933313231323834223b6d6573736167657c733a32393a223c703e4c6f6767656420496e205375636365737366756c6c793c2f703e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('c13p1n1p17reibmis9sanhe18nrf321j', '127.0.0.1', 1493121917, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333132313931373b),
('9b2o38sda96od9d7sckji3okelmgel9g', '127.0.0.1', 1493122217, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333132323231373b),
('4u6mcsnrscbh5mti7qvithogfht1ltmi', '127.0.0.1', 1493122593, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333132323539333b),
('fed163fjh8c5sdii63t1rfbtjfkn45ff', '127.0.0.1', 1493122893, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333132323839333b),
('cg0ogmnn8lrp8ukm2fippsjfapmc7eg2', '127.0.0.1', 1493123194, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333132333139343b),
('n8l1j4se1m1h19c3djfn5v3j5q50t76i', '127.0.0.1', 1493123496, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333132333439363b),
('h2eu48m28ldf43hd8sr4d4rnph4dqcbp', '127.0.0.1', 1493123797, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333132333739373b),
('ar27lojorqu30r18m8iv0h5nlqad4jur', '127.0.0.1', 1493124098, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333132343039383b),
('srbjmukva9vf3svse00ig9flfpk51u26', '127.0.0.1', 1493124399, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333132343339393b),
('rrorm6k94avsqcafv8lfcbfpoahdigfv', '127.0.0.1', 1493124700, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333132343730303b),
('m2cnk3v4fo7iac30klo0kk5sar85uuvc', '127.0.0.1', 1493125001, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333132353030313b),
('fjc630hnar9b6grurhj1h5e2q06o7i6t', '127.0.0.1', 1493125302, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333132353330323b),
('irgjrc6quhr6qj0bj6psho5u0290e168', '127.0.0.1', 1493125603, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333132353630333b),
('an86h1tbhev0v8au45mthrt22ruh2i9m', '127.0.0.1', 1493125904, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333132353930343b),
('p0iaks2s44o4dmu7dc4f6lq2hf63pgua', '127.0.0.1', 1493131244, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439333133313234343b);

-- --------------------------------------------------------

--
-- Struktur dari tabel `d_about`
--

CREATE TABLE IF NOT EXISTS `d_about` (
`id_about` int(11) NOT NULL,
  `name_website` varchar(100) NOT NULL,
  `description_website` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `d_about`
--

INSERT INTO `d_about` (`id_about`, `name_website`, `description_website`) VALUES
(1, 'About Us', 'Construction ...');

-- --------------------------------------------------------

--
-- Struktur dari tabel `d_category`
--

CREATE TABLE IF NOT EXISTS `d_category` (
`id_category` int(11) NOT NULL,
  `name_category` varchar(100) NOT NULL,
  `description_category` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `d_category`
--

INSERT INTO `d_category` (`id_category`, `name_category`, `description_category`) VALUES
(1, 'Web Apps', 'Web App adalah kategori untuk website aplikasi.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `d_jabatan`
--

CREATE TABLE IF NOT EXISTS `d_jabatan` (
`id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `deskripsi_jabatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `d_photo`
--

CREATE TABLE IF NOT EXISTS `d_photo` (
`id_photo` int(11) NOT NULL,
  `id_application` int(11) DEFAULT NULL,
  `name_photo` varchar(250) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `d_photo`
--

INSERT INTO `d_photo` (`id_photo`, `id_application`, `name_photo`, `token`) VALUES
(1, 2, '5031775ff50594a2d0803f0c163b98a4.png', '0.33691325779673287'),
(2, 2, 'cf8733c9934eaaac21864d8fc813d66d.png', '0.7189451320681732'),
(3, 2, 'b10908ce5ca5cd80efab16f042c8b6fd.png', '0.6896661760476102'),
(4, 2, '05ab02b714eb0c5bb075be366be27ea2.png', '0.8660618046950448');

-- --------------------------------------------------------

--
-- Struktur dari tabel `d_portfolio`
--

CREATE TABLE IF NOT EXISTS `d_portfolio` (
`id_portfolio` int(11) NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `developer` varchar(100) DEFAULT NULL,
  `name_client` varchar(100) DEFAULT NULL,
  `description_client` text NOT NULL,
  `name_application` varchar(100) NOT NULL,
  `description_application` text NOT NULL,
  `latest_version` varchar(100) NOT NULL,
  `link_application` varchar(100) NOT NULL,
  `link_download` varchar(100) NOT NULL,
  `image_application` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `d_portfolio`
--

INSERT INTO `d_portfolio` (`id_portfolio`, `id_category`, `id_user`, `developer`, `name_client`, `description_client`, `name_application`, `description_application`, `latest_version`, `link_application`, `link_download`, `image_application`) VALUES
(1, 1, 1, 'EstoCod', 'EstoCod', '', 'NiiPad', 'NiiPad merupakan aplikasi yang dapat menyimpan catatan harian Anda dengan aman dan nyaman. Setiap catatan dienkripsi terlebih dahulu sebelum disimpan ke Database. Berbagai fitur penunjang seperti warna huruf, ukuran huruf, jenis huruf dan lain sebagainya. Tampilan catatan yang persis seperti menulis di dalam buku membuat Anda nyaman saat menulis catatan harian.', '1.5', 'http://niipad.estocod.com/', '', 'NiiPad1.jpg'),
(2, 1, 2, 'Ahmad Romadhon', 'EstoCod', '', 'SIMANJADA', 'SIMANJADA merupakan Sistem Informasi Daftar dan Jadwal Masjid yang berbasis website.', '1.1', 'https://github.com/romadhonbyar/SIMANJADA', '', 'SIMANJADA1.png'),
(3, 1, 1, 'EstoCod', 'KOPMA UIN Jakarta', '', 'Pekan Koperasi', 'Pembuatan frontend dan backend website resmi Pekan Koperasi, KOPMA UIN Syarif Hidayatullah Jakarta.', '1.0', 'http://pekankoperasi.com/', '', 'Pekan_Koperasi1.png'),
(4, 1, 1, 'Banteng Widyantoro', 'EstoCod', '', 'Yuk Mentoring', 'Yuk Mentoring adalah website layanan bagi kamu yang ingin mentoring bersama LDK Syahid. Dengan website ini akan mempermudah kamu dalam menjalankan aktifitas mentoring baik untuk ADK, Murobbi, dan Admin', '1.0', 'http://yukmentoring.estocod.com/', '', 'Yuk_Mentoring1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups_permissions`
--

CREATE TABLE IF NOT EXISTS `groups_permissions` (
`id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `perm_id` int(11) NOT NULL,
  `value` tinyint(4) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `groups_permissions`
--

INSERT INTO `groups_permissions` (`id`, `group_id`, `perm_id`, `value`, `created_at`, `updated_at`) VALUES
(18, 1, 4, 1, 1492705430, 1492705430),
(19, 1, 3, 1, 1492705430, 1492705430),
(20, 1, 1, 1, 1492705430, 1492705430),
(21, 1, 2, 1, 1492705430, 1492705430),
(22, 2, 4, 1, 1492705475, 1492705475),
(23, 2, 3, 1, 1492705475, 1492705475),
(24, 2, 1, 0, 1492705475, 1492705475),
(25, 2, 2, 0, 1492705475, 1492705475);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
`id` int(11) NOT NULL,
  `perm_key` varchar(30) NOT NULL,
  `perm_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `perm_key`, `perm_name`) VALUES
(1, 'menu_manage', 'Menu Manage'),
(2, 'menu_setting', 'Menu Setting'),
(3, 'menu_logs', 'Menu Logs'),
(4, 'menu_article', 'Menu Article'),
(5, 'menu_manage_permission_add', 'Menu Manage Permission Add'),
(6, 'menu_manage_permission_edit', 'Menu Manage Permission Edit'),
(8, 'menu_manage_permission_delete', 'Menu Manage Permission Delete');

-- --------------------------------------------------------

--
-- Struktur dari tabel `set_general`
--

CREATE TABLE IF NOT EXISTS `set_general` (
`id_set_general` int(11) NOT NULL,
  `maintenance` enum('0','1') DEFAULT '0',
  `auto_refresh` varchar(100) NOT NULL,
  `name_web` varchar(100) NOT NULL DEFAULT 'Nama Website',
  `slogan_web` varchar(100) NOT NULL DEFAULT 'Slogan Website'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `set_general`
--

INSERT INTO `set_general` (`id_set_general`, `maintenance`, `auto_refresh`, `name_web`, `slogan_web`) VALUES
(1, '0', '', 'EstoCod', 'Changes the world');

-- --------------------------------------------------------

--
-- Struktur dari tabel `set_seo`
--

CREATE TABLE IF NOT EXISTS `set_seo` (
`id_set_seo` int(11) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` varchar(100) NOT NULL,
  `meta_author` varchar(100) NOT NULL,
  `meta_google_verification` varchar(100) NOT NULL,
  `meta_google_analytics_verification` varchar(100) NOT NULL,
  `meta_bing_verification` varchar(100) NOT NULL,
  `meta_alexa_verification` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `set_seo`
--

INSERT INTO `set_seo` (`id_set_seo`, `meta_description`, `meta_keywords`, `meta_author`, `meta_google_verification`, `meta_google_analytics_verification`, `meta_bing_verification`, `meta_alexa_verification`) VALUES
(1, 'asdasd asdasd a asdasd asdasd a asdasd asdasd a asdasd asdasd a asdasd asdasd a asdasd asdasd a asdasd asdasd a asdasd asdasd a asdasd asdasd a ', 'saya, dia, asas', 'EstoCod', 'sfsdweqwe', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `set_socmed`
--

CREATE TABLE IF NOT EXISTS `set_socmed` (
`id_set_socmed` int(11) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `google_plus` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `whatsapp` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `set_socmed`
--

INSERT INTO `set_socmed` (`id_set_socmed`, `facebook`, `twitter`, `google_plus`, `instagram`, `youtube`, `whatsapp`) VALUES
(1, 'EstoCod', '#', '#', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `site_system_csrf`
--

CREATE TABLE IF NOT EXISTS `site_system_csrf` (
`id_site_system_csrf` int(11) NOT NULL,
  `csrf_token_name` varchar(100) NOT NULL,
  `csrf_cookie_name` varchar(100) NOT NULL,
  `csrf_expire` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `site_system_session`
--

CREATE TABLE IF NOT EXISTS `site_system_session` (
`id_site_system_session` int(11) NOT NULL,
  `session_cookie_name` varchar(100) NOT NULL,
  `session_expiration` varchar(100) NOT NULL,
  `session_time_to_update` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT 'EstoCod',
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `full_name`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1493121615, 1, 'Administrator', 'Admin', 'istrator', 'ADMIN', '088888888812'),
(2, '103.229.202.180', 'romadhonbyar', '$2y$08$ZxSSiZzUeZZJaHF8dQqXw.wjMuIUZZ6fqZMZyyX4gotpz2PFMyYi2', NULL, 'romadhon1byar@gmail.com', NULL, NULL, NULL, NULL, 1468816266, 1492861912, 1, 'Ahmad Romadhon', 'Ahmad', 'Romadhon', 'EstoCod', '08978596665'),
(3, '202.62.17.190', 'BantengWidyan', '$2y$08$8MTOqsCfWv3S8r2nIm5e9e7Ay1KSFie3vAGSMy9h5OgWeGHkQVGF2', NULL, 'bantengwidyantoroparkour@gmail.com', NULL, NULL, NULL, NULL, 1469060955, 1469060993, 1, 'Banteng Widyantoro', NULL, NULL, 'EstoCod', ''),
(4, '223.255.230.63', 'noerochmanadi', '$2y$08$EUlJnaNyo3NkHgzYun1t/.UoYH5AHX/4b9fji2jdZwzgjig4DjrtW', NULL, 'nurochmanadi@gmail.com', NULL, NULL, NULL, NULL, 1469081676, NULL, 1, 'Nurochman Adi Erwanto', NULL, NULL, 'EstoCod', NULL),
(5, '125.166.93.197', 'ekoganteng', '$2y$08$B3OnAOvl0PdgWz/33We2Qe8lLvKJujWIwuEPEb42he8X0m9IkoOMO', NULL, 'sorryeko@gmail.com', NULL, NULL, NULL, NULL, 1469596381, 1469596397, 1, 'Eko Fajar Amirulloh', NULL, NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_detail`
--

CREATE TABLE IF NOT EXISTS `users_detail` (
`id_users_detail` int(11) unsigned NOT NULL,
  `id_user` int(11) unsigned NOT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `birthday` varchar(100) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_detail`
--

INSERT INTO `users_detail` (`id_users_detail`, `id_user`, `gender`, `birthday`, `photo`) VALUES
(1, 1, 'Male', '1999-10-03', NULL),
(2, 2, 'Male', '0001-01-01', NULL),
(3, 3, NULL, NULL, NULL),
(4, 4, NULL, NULL, NULL),
(5, 5, 'Male', '01/04/1995', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(33, 1, 1),
(34, 2, 2),
(8, 3, 2),
(7, 4, 2),
(30, 5, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_permissions`
--

CREATE TABLE IF NOT EXISTS `users_permissions` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `perm_id` int(11) NOT NULL,
  `value` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_permissions`
--

INSERT INTO `users_permissions` (`id`, `user_id`, `perm_id`, `value`, `created_at`, `updated_at`) VALUES
(36, 1, 1, 1, 1488467213, 1488467213),
(37, 1, 3, 1, 1488467213, 1488467213),
(38, 1, 4, 1, 1488467213, 1488467213),
(39, 1, 2, 1, 1488467214, 1488467214),
(40, 1, 5, 1, 1488467214, 1488467214);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article_`
--
ALTER TABLE `article_`
 ADD PRIMARY KEY (`id_article`), ADD UNIQUE KEY `code_article` (`code_article`);

--
-- Indexes for table `article_category`
--
ALTER TABLE `article_category`
 ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `article_cover`
--
ALTER TABLE `article_cover`
 ADD PRIMARY KEY (`id_cover`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `d_about`
--
ALTER TABLE `d_about`
 ADD PRIMARY KEY (`id_about`);

--
-- Indexes for table `d_category`
--
ALTER TABLE `d_category`
 ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `d_jabatan`
--
ALTER TABLE `d_jabatan`
 ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `d_photo`
--
ALTER TABLE `d_photo`
 ADD PRIMARY KEY (`id_photo`);

--
-- Indexes for table `d_portfolio`
--
ALTER TABLE `d_portfolio`
 ADD PRIMARY KEY (`id_portfolio`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups_permissions`
--
ALTER TABLE `groups_permissions`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `roleID_2` (`group_id`,`perm_id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `permKey` (`perm_key`);

--
-- Indexes for table `set_general`
--
ALTER TABLE `set_general`
 ADD PRIMARY KEY (`id_set_general`);

--
-- Indexes for table `set_seo`
--
ALTER TABLE `set_seo`
 ADD PRIMARY KEY (`id_set_seo`);

--
-- Indexes for table `set_socmed`
--
ALTER TABLE `set_socmed`
 ADD PRIMARY KEY (`id_set_socmed`);

--
-- Indexes for table `site_system_csrf`
--
ALTER TABLE `site_system_csrf`
 ADD PRIMARY KEY (`id_site_system_csrf`);

--
-- Indexes for table `site_system_session`
--
ALTER TABLE `site_system_session`
 ADD PRIMARY KEY (`id_site_system_session`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_detail`
--
ALTER TABLE `users_detail`
 ADD PRIMARY KEY (`id_users_detail`), ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`), ADD KEY `fk_users_groups_users1_idx` (`user_id`), ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `users_permissions`
--
ALTER TABLE `users_permissions`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `userID` (`user_id`,`perm_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article_`
--
ALTER TABLE `article_`
MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `article_category`
--
ALTER TABLE `article_category`
MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `article_cover`
--
ALTER TABLE `article_cover`
MODIFY `id_cover` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `d_about`
--
ALTER TABLE `d_about`
MODIFY `id_about` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `d_category`
--
ALTER TABLE `d_category`
MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `d_jabatan`
--
ALTER TABLE `d_jabatan`
MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `d_photo`
--
ALTER TABLE `d_photo`
MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `d_portfolio`
--
ALTER TABLE `d_portfolio`
MODIFY `id_portfolio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `groups_permissions`
--
ALTER TABLE `groups_permissions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `set_general`
--
ALTER TABLE `set_general`
MODIFY `id_set_general` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `set_seo`
--
ALTER TABLE `set_seo`
MODIFY `id_set_seo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `set_socmed`
--
ALTER TABLE `set_socmed`
MODIFY `id_set_socmed` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `site_system_csrf`
--
ALTER TABLE `site_system_csrf`
MODIFY `id_site_system_csrf` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `site_system_session`
--
ALTER TABLE `site_system_session`
MODIFY `id_site_system_session` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_detail`
--
ALTER TABLE `users_detail`
MODIFY `id_users_detail` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `users_permissions`
--
ALTER TABLE `users_permissions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
