-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Lug 05, 2017 alle 11:10
-- Versione del server: 5.6.33-log
-- PHP Version: 5.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_cvcreator`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `digitali`
--

CREATE TABLE IF NOT EXISTS `digitali` (
  `iddigitali` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `elaborazione` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL DEFAULT '',
  `comunicazione` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `creazione` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `sicurezza` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `risoluzione` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`iddigitali`),
  KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dump dei dati per la tabella `digitali`
--

INSERT INTO `digitali` (`iddigitali`, `username`, `elaborazione`, `comunicazione`, `creazione`, `sicurezza`, `risoluzione`) VALUES
(1, 'marti', 'Utente base', 'Utente intermedio', 'Utente avanzato', 'Utente base', 'Utente intermedio'),
(4, 'mario', 'Utente base', 'Utente intermedio', 'Utente intermedio', 'Utente avanzato', 'Utente intermedio'),
(5, 'Martina', 'Utente avanzato', 'Utente avanzato', 'Utente avanzato', 'Utente avanzato', 'Utente avanzato'),
(6, 'Marci0210', 'Utente intermedio', 'Utente intermedio', 'Utente intermedio', 'Utente intermedio', 'Utente intermedio'),
(7, 'Gangione', 'Utente intermedio', 'Utente intermedio', 'Utente base', 'Utente base', 'Utente base'),
(8, 'Yubabo', 'Utente intermedio', 'Utente intermedio', 'Utente intermedio', 'Utente intermedio', 'Utente intermedio');

-- --------------------------------------------------------

--
-- Struttura della tabella `formazione`
--

CREATE TABLE IF NOT EXISTS `formazione` (
  `idformazione` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `nome` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `luogo` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `descrizione` varchar(500) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `datainizio` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `datafine` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`idformazione`),
  KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dump dei dati per la tabella `formazione`
--

INSERT INTO `formazione` (`idformazione`, `username`, `nome`, `luogo`, `descrizione`, `datainizio`, `datafine`) VALUES
(18, 'marti', 'meaow', 'meaow1', 'meaow1', '2017-06-22', '2017-06-23'),
(24, 'mario', 'La mia anima Ã¨ pervasa da una', 'La mia anima Ã¨ pervasa da una mirabile serenitÃ , simile a queste belle mattinate di maggio che io ', 'La mia anima Ã¨ pervasa da una mirabile serenitÃ , simile a queste belle mattinate di maggio che io godo con tutto il cuore. Sono solo e mi rallegro di vivere in questo luogo che sembra esser creato per anime simili alla mia. Sono cosÃ¬ felice, mio caro, cosÃ¬ immerso nel sentimento della mia tranquilla esistenza che la mia arte ne soffre. Non potrei disegnare nulla ora, neppure un segno potrei tr', '2017-06-05', '2017-06-27'),
(25, 'mario', 'In una terra lontana, dietro l', 'In una terra lontana, dietro le montagne Parole, lontani dalle terre di Vocalia e Consonantia, vivon', 'In una terra lontana, dietro le montagne Parole, lontani dalle terre di Vocalia e Consonantia, vivono i testi casuali. Vivono isolati nella cittadina di Lettere, sulle coste del Semantico, un immenso oceano linguistico. Un piccolo ruscello chiamato Devoto Oli attraversa quei luoghi, rifornendoli di tutte le regolalie di cui hanno bisogno. Ãˆ una terra paradismatica, un paese della cuccagna in cui ', '2017-06-04', 'corrente'),
(26, 'mario', 'Li Europan lingues es membres ', 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musi', 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunc', '2017-06-03', 'corrente'),
(27, 'Martina', 'Conseguimento del diploma', 'Frequentazione dellâ€™Istituto Tecnico Aldini Valeriani Sirani presso Via bassanelli 9/11 Bologna.  (http://www.iav.it/home). ', 'â–ª	Studio approfondito delle materie: Sistemi e reti, Tecnologie, Progettazione di sistemi informatici, Telecomunicazioni e Informatica.\r\nâ–ª	Conoscenza base di Telecomunicazioni ed Elettronica.\r\nâ–ª	Svolgimento, durante i cinque anni, di due stage allâ€™estero (con, quindi, annessa esperienza lavorativa presso varie aziende).\r\n', '2012-09-10', '2017-07-04'),
(28, 'Martina', 'Stage Linguistico Cambridge', 'Viaggio dâ€™istruzione a Cambridge con attestato di frequenza di livello B1 presso il corso Select English (http://www.selectenglish.co.uk). ', 'â–ª	Visita della cittÃ  di Cambridge\r\nâ–ª	Convivenza in casa-famiglia\r\nâ–ª	Visita aziendale alla Cosworth (http://www.cosworth.com)\r\nâ–ª	Partecipazione alla presentazione â€˜Happier and Healthier with Smartphone Dataâ€™ , processi e funzionalitÃ  per creare un app\r\nâ–ª	Visita alla cittÃ  di Ely\r\nâ–ª	Visita alla cittÃ  di Londra\r\n', '2016-03-07', '2016-03-14'),
(29, 'Martina', 'Stage Linguistico Londra', 'Viaggio dâ€™istruzione a Londra con attestato di frequenza di livello A presso British International School (http://www.thebis.net).\r\n\r\n', 'â–ª	Visita alla cittÃ  di Londra\r\nâ–ª	Convivenza in casa-famiglia', '2015-02-10', '2015-02-17'),
(30, 'Martina', 'Stage linguistico Edimburgo', 'Viaggio dâ€™istruzione a Edimburgo con attestato di frequenza presso Mackenzie School of English (http://mackenzieschool.com).', 'â–ª	Visita alla cittÃ  di Edimburgo \r\nâ–ª	Convivenza in casa-famiglia', '2017-04-03', '2017-04-10'),
(31, 'Marci0210', 'Licenza Media', 'Istituto Comprensivo &#39Don Chendi&#39 Tresigallo (FE)', 'Indirizzo di scuola media ad indirizzo musicale con potenziamento di Lettere', '2009-09-14', '2013-06-08'),
(32, 'Gangione', 'Licenza media, diploma economico-sociale', 'Liceo scientifico A.B Sabin \r\nVia matteotti - Bologna', 'Istruzione liceale, diritto, scienze umane, lingue (inglese,spagnolo)', '2011-09-14', '2016-07-04'),
(33, 'Yubabo', 'Diploma artistico', 'Bologna', 'Design', '2014-09-15', '2016-06-10');

-- --------------------------------------------------------

--
-- Struttura della tabella `lavoro`
--

CREATE TABLE IF NOT EXISTS `lavoro` (
  `idlavoro` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `nome` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `luogo` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `descrizione` varchar(500) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `datainizio` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `datafine` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `settore` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`idlavoro`),
  KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dump dei dati per la tabella `lavoro`
--

INSERT INTO `lavoro` (`idlavoro`, `username`, `nome`, `luogo`, `descrizione`, `datainizio`, `datafine`, `settore`) VALUES
(16, 'marti', 'pru', 'pru', 'pru', '2017-06-01', '2017-06-03', ''),
(17, 'marti', 'meaow1', 'meaow', 'meaow', '2017-06-18', '2017-06-23', 'meaow'),
(18, 'marti', 'Lorem ipsum dolor sit amet. Pr', 'Lorem ipsum dolor sit amet. Praesentium magnam consectetur vel in deserunt aspernatur est reprehende', 'Lorem ipsum dolor sit amet. Praesentium magnam consectetur vel in deserunt aspernatur est reprehenderit sunt hic. Nulla tempora soluta ea et odio, unde doloremque repellendus iure, iste.', '2017-06-17', '2017-06-23', 'Lorem ipsum dolor si'),
(49, 'mario', 'La mia anima Ã¨ pervasa da una', 'La mia anima Ã¨ pervasa da una mirabile serenitÃ , simile a queste belle mattinate di maggio che io ', 'La mia anima Ã¨ pervasa da una mirabile serenitÃ , simile a queste belle mattinate di maggio che io godo con tutto il cuore. Sono solo e mi rallegro di vivere in questo luogo che sembra esser creato per anime simili alla mia. Sono cosÃ¬ felice, mio caro, cosÃ¬ immerso nel sentimento della mia tranquilla esistenza che la mia arte ne soffre. Non potrei disegnare nulla ora, neppure un segno potrei tr', '2017-06-05', '2017-06-27', 'La mia anima Ã¨ perv'),
(50, 'mario', 'In una terra lontana, dietro l', 'In una terra lontana, dietro le montagne Parole, lontani dalle terre di Vocalia e Consonantia, vivto', 'In una terra lontana, dietro le montagne Parole, lontani dalle terre di Vocalia e Consonantia, vivono i testi casuali. Vivono isolati nella cittadina di Lettere, sulle coste del Semantico, un immenso oceano linguistico. Un piccolo ruscello chiamato Devoto Oli attraversa quei luoghi, rifornendoli di tutte le regolalie di cui hanno bisogno. Ãˆ una terra paradismatica, un paese della cuccagna in cui ', '2017-06-04', 'corrente', 'In una terra lontana'),
(51, 'mario', 'Li Europan lingues es membres ', 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musi', 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunc', '2017-06-03', 'corrente', 'Li Europan lingues e'),
(52, 'marti', 'ciao', 'ciao', 'ciao', '2017-06-02', '2017-06-09', 'ciao'),
(53, 'marti', 'sdfasdf', 'sadfasdf', 'sadfasdf', '2017-06-02', '2017-06-09', ''),
(54, 'Martina', 'Stage Lavorativo â€“ VAR Group', 'Stage lavorativo presso VAR Group ( http://www.vargroup.it/) in via Gramsci 43, Funo (BO).', 'â–ª	Controllo qualitÃ  (tester)\r\nâ–ª	Supporto Help Desk tramite connessione remota e sistema di ticketing\r\nâ–ª	Partecipazione al corso CRM (Customer Relationship Managment)\r\nâ–ª	Analisi di principali processi aziendali\r\n', '2016-04-01', '2016-04-30', 'Informatica, sistemistica, programmazione.'),
(55, 'Martina', 'Stage Lavorativo - GPI', 'Stage lavorativo nel gruppo GPI ( http://www.gpi.it/) presso lâ€™Arcispedale Sant&#39Anna in via Aldo Moro 8, Cona (FE).', 'â–ª	Configurazione, backup e ripristino di sistemi operativi\r\nâ–ª	Sostituzione di componenti interni di computer\r\nâ–ª	Sostituzione di componenti di stampanti\r\nâ–ª	Supporto Help Desk tramite connessione remota e sistema di ticketing\r\nâ–ª	Avere la capacitÃ  di comprendere e risolvere tramite troubleshooting le principali problematiche di computer fissi, laptop, stampanti (scanner), stampanti di etichette, dispositivi mobili e tablet\r\n\r\n', '2016-06-13', '2016-07-16', 'Informatica, sistemistica, programmazione.'),
(56, 'Martina', 'Stage Lavorativo - Lepida', 'Stage lavorativo presso Lepida Spa. ( http://www.lepida.it/) in Viale Aldo Moro 64, Bologna (BO).', 'â–ª	Configurazione di router (access point) e switch\r\nâ–ª	Studio della rete lepida\r\nâ–ª	Studio del funzionamento delle porte trunk e access\r\nâ–ª	Studio di una vlan e le sue funzioni\r\n', '2016-11-01', '2016-11-30', 'Informatica, sistemistica, reti.'),
(57, 'Marci0210', 'Studente', 'Liceo Classico\r\nConservatorio di Musica ', 'Studente di Liceo e Conservatorio', '2013-09-16', '2019-06-08', 'Materie letterarie, Musica'),
(58, 'Gangione', 'Studente', 'FacoltÃ  di giurisprudenza ~ Bologna', 'Studio del diritto, sicurezza sul lavoro', '2016-10-10', '2020-10-10', 'Studio'),
(59, 'Yubabo', 'Tatuatrice apprendista', 'Ferrara', 'Preparazione artwork\r\nDesign\r\nStencil\r\nApplicazione tatuaggio black and white/colorato\r\nCura del tatuaggio', '2016-07-13', '3000-01-01', 'Tatuaggio');

-- --------------------------------------------------------

--
-- Struttura della tabella `lingua`
--

CREATE TABLE IF NOT EXISTS `lingua` (
  `idlingua` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `lingua` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `ascolto` varchar(2) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `lettura` varchar(2) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `interazione` varchar(2) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `orale` varchar(2) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `scritto` varchar(2) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`idlingua`),
  KEY `lingua_ibfk_1` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dump dei dati per la tabella `lingua`
--

INSERT INTO `lingua` (`idlingua`, `username`, `lingua`, `ascolto`, `lettura`, `interazione`, `orale`, `scritto`) VALUES
(6, 'marti', 'inglese', 'B2', 'B2', 'C1', 'A1', 'B2'),
(7, 'marti', 'francese', 'A2', 'A2', 'C2', 'B1', 'C1'),
(15, 'mario', 'Lorem ipsum dolor si', 'A2', 'B1', 'B2', 'B2', 'B1'),
(21, 'Martina', 'Francese', 'C1', 'C1', 'A2', 'C2', 'B1');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE IF NOT EXISTS `utenti` (
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `usernamemd5` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `password` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `mail` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `nome` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `cognome` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `data` date NOT NULL,
  `luogo` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `sesso` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `nazionalita` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `numtel` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `numtel2` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `patente` varchar(2) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `foto` varchar(500) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `aspirazioni` varchar(500) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `hobby` varchar(500) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `madre` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL DEFAULT 'Italiano',
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `mail` (`mail`),
  UNIQUE KEY `username_2` (`username`,`mail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`username`, `usernamemd5`, `password`, `mail`, `nome`, `cognome`, `data`, `luogo`, `sesso`, `nazionalita`, `numtel`, `numtel2`, `patente`, `foto`, `aspirazioni`, `hobby`, `madre`) VALUES
('mario', 'de2f15d014d40b93578d255e6221fd60', '2bf65275cb7f5dc95febd7d46cd7d0af', 'mario@rossi.com', 'mario', 'rossi', '1998-01-28', 'roma', 'maschio', 'Italiana', '12345689', '', '', 'uploads/IMG_20170401_172943.jpg', 'sadfasfasf', 'sadfasdfasdf', 'Italiano'),
('marti', 'd2c24d8988c79cbcd26caa5360e70d3b', 'd2c24d8988c79cbcd26caa5360e70d3b', 'prugna@gmail.com', 'prugna', 'prugna', '1998-01-28', 'prugna', 'femmina', 'prugna', 'prugna', '1234567890', 'b', '../uploads/IMG-20170622-WA0002.jpeg', 'fdgsdgfdg', 'jasdbhoÃ²jasfjsadfjkhasdoifpsadj fÃ sadf', 'Spagnolo'),
('Martina', '53e5db093f8e47c7564bbb869385e352', 'b0d12e80b6d82d0db827b5e305b20926', 'martina.sosto@gmail.com', 'Martina', 'Sosto', '1998-01-28', 'Bologna', 'femmina', 'Italiana', '3312291798', '0532825512', 'b', '../uploads/IMG_6777.JPG', 'Continuare negli studi per accrescere le mie conoscenze informatiche e in seguito, cosÃ¬, intraprendere un percorso di carriera coerente con le mie esperienze precedenti che mi possa portare a migliorare a crescere personalmente e professionalmente.', 'Partecipato attivamente al gruppo scoutistico CNGEI (http://www.cngei.it) fin dall&#39etÃ  di 9 anni, amante dell&#39aria aperta e dello stare in compagnia.\r\nLa mia passione per i videogame e le serie Tv mi ha portata sempre piÃ¹ ad avvicinarmi al mondo dell&#39informatica, dove ho scoperto alcune delle mie piÃ¹ grandi passioni tra le quali programmare.', 'Italiano'),
('Marci0210', '140cda1d60efacfedacbf77e76975bee', '4107ceb24af63f23255975f2dd286db8', 'azzimarcello@gmail.com', 'Marcello', 'Azzi', '1998-10-02', 'Ferrara', 'maschio', 'Italia', '3405981262', '3405981262', '', '../uploads/foto.png', NULL, NULL, 'Italiano'),
('Gangione', 'add59e512458f5d56faacad51c7d8b01', '257a075067fda8571d067e5169b3fd11', 'giorgioammirabile@hotmail.it', 'Giorgio', 'Ammirabile', '1997-12-12', 'Bolgona', 'maschio', 'Italiana', '3314441031', '', '', '../uploads/14987430567031272164211.jpg', NULL, NULL, 'Italiano'),
('Yubabo', '887b791693d8f976c856b769a0b82cef', '8c1b8b154258a2100b22e76f3c91669b', 'eledevyl@live.it', 'Elena', 'Ammirabile', '1996-06-23', 'Bologna', 'femmina', 'Italiane', '3393885903', '3393885903', 'B', '../uploads/foto.png', NULL, NULL, 'Italiano'),
('Virginia', 'c8b287075ce4f11c834d2a0ada967ddc', '42f749ade7f9e195bf475f37a44cafcb', 'esempio@live.it', 'Virginia', 'Baffo', '1998-12-11', 'Bologna', 'femmina', 'Italiana', '12345678', '', '', '../uploads/foto.png', NULL, NULL, 'Italiano'),
('cecidepau', 'e2b892d473e8adfff2cdcd08e1a824a5', '4ca8fb44965a2e20b9b03c6cc1745733', 'ceci.depau@hotmail.it', 'cecilia', 'depau', '1995-08-06', 'bologna', 'femmina', 'italiana', '3205664286', '0516215268', 'B', '../uploads/foto.png', NULL, NULL, 'Italiano');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
