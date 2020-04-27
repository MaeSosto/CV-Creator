-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 29, 2017 alle 14:23
-- Versione del server: 10.1.21-MariaDB
-- Versione PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_cvcreator`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `digitali`
--

CREATE TABLE `digitali` (
  `iddigitali` int(10) NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `elaborazione` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL DEFAULT '',
  `comunicazione` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `creazione` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `sicurezza` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `risoluzione` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `digitali`
--

INSERT INTO `digitali` (`iddigitali`, `username`, `elaborazione`, `comunicazione`, `creazione`, `sicurezza`, `risoluzione`) VALUES
(1, 'marti', 'Utente base', 'Utente intermedio', 'Utente avanzato', 'Utente base', 'Utente intermedio'),
(4, 'mario', 'Utente base', 'Utente intermedio', 'Utente intermedio', 'Utente avanzato', 'Utente intermedio');

-- --------------------------------------------------------

--
-- Struttura della tabella `formazione`
--

CREATE TABLE `formazione` (
  `idformazione` int(10) NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `nome` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `luogo` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `descrizione` varchar(500) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `datainizio` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `datafine` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `formazione`
--

INSERT INTO `formazione` (`idformazione`, `username`, `nome`, `luogo`, `descrizione`, `datainizio`, `datafine`) VALUES
(18, 'marti', 'meaow', 'meaow1', 'meaow1', '2017-06-22', '2017-06-23'),
(24, 'mario', 'La mia anima Ã¨ pervasa da una', 'La mia anima Ã¨ pervasa da una mirabile serenitÃ , simile a queste belle mattinate di maggio che io ', 'La mia anima Ã¨ pervasa da una mirabile serenitÃ , simile a queste belle mattinate di maggio che io godo con tutto il cuore. Sono solo e mi rallegro di vivere in questo luogo che sembra esser creato per anime simili alla mia. Sono cosÃ¬ felice, mio caro, cosÃ¬ immerso nel sentimento della mia tranquilla esistenza che la mia arte ne soffre. Non potrei disegnare nulla ora, neppure un segno potrei tr', '2017-06-05', '2017-06-27'),
(25, 'mario', 'In una terra lontana, dietro l', 'In una terra lontana, dietro le montagne Parole, lontani dalle terre di Vocalia e Consonantia, vivon', 'In una terra lontana, dietro le montagne Parole, lontani dalle terre di Vocalia e Consonantia, vivono i testi casuali. Vivono isolati nella cittadina di Lettere, sulle coste del Semantico, un immenso oceano linguistico. Un piccolo ruscello chiamato Devoto Oli attraversa quei luoghi, rifornendoli di tutte le regolalie di cui hanno bisogno. Ãˆ una terra paradismatica, un paese della cuccagna in cui ', '2017-06-04', 'corrente'),
(26, 'mario', 'Li Europan lingues es membres ', 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musi', 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunc', '2017-06-03', 'corrente');

-- --------------------------------------------------------

--
-- Struttura della tabella `lavoro`
--

CREATE TABLE `lavoro` (
  `idlavoro` int(10) NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `nome` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `luogo` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `descrizione` varchar(500) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `datainizio` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `datafine` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `settore` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(53, 'marti', 'sdfasdf', 'sadfasdf', 'sadfasdf', '2017-06-02', '2017-06-09', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `lingua`
--

CREATE TABLE `lingua` (
  `idlingua` int(10) NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `lingua` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `ascolto` varchar(2) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `lettura` varchar(2) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `interazione` varchar(2) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `orale` varchar(2) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `scritto` varchar(2) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `lingua`
--

INSERT INTO `lingua` (`idlingua`, `username`, `lingua`, `ascolto`, `lettura`, `interazione`, `orale`, `scritto`) VALUES
(6, 'marti', 'inglese', 'B2', 'B2', 'C1', 'A1', 'B2'),
(7, 'marti', 'francese', 'A2', 'A2', 'C2', 'B1', 'C1'),
(15, 'mario', 'Lorem ipsum dolor si', 'A2', 'B1', 'B2', 'B2', 'B1');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
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
  `madre` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL DEFAULT 'Italiano'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`username`, `usernamemd5`, `password`, `mail`, `nome`, `cognome`, `data`, `luogo`, `sesso`, `nazionalita`, `numtel`, `numtel2`, `patente`, `foto`, `aspirazioni`, `hobby`, `madre`) VALUES
('mario', 'de2f15d014d40b93578d255e6221fd60', '2bf65275cb7f5dc95febd7d46cd7d0af', 'mario@rossi.com', 'mario', 'rossi', '1998-01-28', 'roma', 'maschio', 'Italiana', '12345689', '', '', 'uploads/IMG_20170401_172943.jpg', 'sadfasfasf', 'sadfasdfasdf', 'Italiano'),
('marti', 'd2c24d8988c79cbcd26caa5360e70d3b', 'd2c24d8988c79cbcd26caa5360e70d3b', 'prugna@gmail.com', 'prugna', 'prugna', '1998-01-28', 'prugna', 'femmina', 'prugna', 'prugna', '1234567890', 'b', '../uploads/IMG-20170622-WA0002.jpeg', 'fdgsdgfdg', 'jasdbhoÃ²jasfjsadfjkhasdoifpsadj fÃ sadf', 'Spagnolo'),
('scimmia', 'e4c3b800c0faeca1312ce870fb4751dc', 'e4c3b800c0faeca1312ce870fb4751dc', 'scimmia@gmail.com', 'scimmia', 'scimmia', '1998-01-28', 'scimmia', 'femmina', 'scimmia', 'scimmia', '', '', 'uploads/foto.png', NULL, NULL, 'Italiano');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `digitali`
--
ALTER TABLE `digitali`
  ADD PRIMARY KEY (`iddigitali`),
  ADD KEY `username` (`username`);

--
-- Indici per le tabelle `formazione`
--
ALTER TABLE `formazione`
  ADD PRIMARY KEY (`idformazione`),
  ADD KEY `username` (`username`);

--
-- Indici per le tabelle `lavoro`
--
ALTER TABLE `lavoro`
  ADD PRIMARY KEY (`idlavoro`),
  ADD KEY `username` (`username`);

--
-- Indici per le tabelle `lingua`
--
ALTER TABLE `lingua`
  ADD PRIMARY KEY (`idlingua`),
  ADD KEY `lingua_ibfk_1` (`username`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `username_2` (`username`,`mail`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `digitali`
--
ALTER TABLE `digitali`
  MODIFY `iddigitali` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT per la tabella `formazione`
--
ALTER TABLE `formazione`
  MODIFY `idformazione` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT per la tabella `lavoro`
--
ALTER TABLE `lavoro`
  MODIFY `idlavoro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT per la tabella `lingua`
--
ALTER TABLE `lingua`
  MODIFY `idlingua` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `digitali`
--
ALTER TABLE `digitali`
  ADD CONSTRAINT `digitali_ibfk_1` FOREIGN KEY (`username`) REFERENCES `utenti` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `formazione`
--
ALTER TABLE `formazione`
  ADD CONSTRAINT `formazione_ibfk_1` FOREIGN KEY (`username`) REFERENCES `utenti` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `lavoro`
--
ALTER TABLE `lavoro`
  ADD CONSTRAINT `lavoro_ibfk_1` FOREIGN KEY (`username`) REFERENCES `utenti` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `lingua`
--
ALTER TABLE `lingua`
  ADD CONSTRAINT `lingua_ibfk_1` FOREIGN KEY (`username`) REFERENCES `utenti` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
