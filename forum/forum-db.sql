-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Lis 2022, 15:27
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `forum`
--
CREATE DATABASE IF NOT EXISTS `forum` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `forum`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarze`
--

CREATE TABLE `komentarze` (
  `idKomentarza` int(11) NOT NULL,
  `idPytania` int(11) NOT NULL,
  `idUzytkownika` int(11) NOT NULL,
  `tresc` varchar(300) NOT NULL,
  `data` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `komentarze`
--

INSERT INTO `komentarze` (`idKomentarza`, `idPytania`, `idUzytkownika`, `tresc`, `data`) VALUES
(1, 1, 1, 'testowy komentarz', '2021-12-10'),
(2, 1, 1, 'esssssssssssssssssssss', '2022-02-05');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pytania`
--

CREATE TABLE `pytania` (
  `idPytania` int(11) NOT NULL,
  `idUzytkownika` int(11) NOT NULL,
  `tytul` varchar(100) NOT NULL,
  `tresc` varchar(500) NOT NULL,
  `kategoria` varchar(100) NOT NULL,
  `data` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `pytania`
--

INSERT INTO `pytania` (`idPytania`, `idUzytkownika`, `tytul`, `tresc`, `kategoria`, `data`) VALUES
(1, 1, 'Testowe pytanie', 'testowe pytanie w kategorii inne', 'Inne', '2021-12-10'),
(2, 1, 'wypisywanie zmiennej python', 'jak wypisać zmienną w pythonie', 'Python', '2022-02-05');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `idUzytkownika` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `haslo` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`idUzytkownika`, `login`, `haslo`, `email`) VALUES
(1, 'piotrus', '$2y$10$ETcFyueM9zL7Iip0.9aAi.1Cg9FvENHLrCL8E0wAwuBkWbstXXw0u', 'coTam@elo.com');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  ADD PRIMARY KEY (`idKomentarza`),
  ADD KEY `idPytania` (`idPytania`),
  ADD KEY `idUzytkownika` (`idUzytkownika`);

--
-- Indeksy dla tabeli `pytania`
--
ALTER TABLE `pytania`
  ADD PRIMARY KEY (`idPytania`),
  ADD KEY `idUzytkownika` (`idUzytkownika`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`idUzytkownika`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  MODIFY `idKomentarza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `pytania`
--
ALTER TABLE `pytania`
  MODIFY `idPytania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `idUzytkownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  ADD CONSTRAINT `komentarze_ibfk_1` FOREIGN KEY (`idUzytkownika`) REFERENCES `uzytkownicy` (`idUzytkownika`) ON DELETE CASCADE,
  ADD CONSTRAINT `komentarze_ibfk_2` FOREIGN KEY (`idPytania`) REFERENCES `pytania` (`idPytania`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `pytania`
--
ALTER TABLE `pytania`
  ADD CONSTRAINT `pytania_ibfk_2` FOREIGN KEY (`idUzytkownika`) REFERENCES `uzytkownicy` (`idUzytkownika`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
