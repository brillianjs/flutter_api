CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `prodi`) VALUES
(1, 'Nayla', 'Informatika'),
(2, 'Yuan', 'Informatika'),
(3, 'Joko', 'Sistem Informasi'),
(4, 'Andika', 'Sistem Informasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(4, 'John Doe', 'john.doe2@example.com', 'cbfdac6008f9cab4083784cbd1874f76618d2a97'),
(5, 'John Doe', 'john.doe3@example.com', 'cbfdac6008f9cab4083784cbd1874f76618d2a97'),
(6, 'Ipung Dev', 'ipungdev@gmail.com', '4be30d9814c6d4e9800e0d2ea9ec9fb00efa887b'),
(7, 'Joana', 'joan@gmail.com', '4be30d9814c6d4e9800e0d2ea9ec9fb00efa887b'),
(8, 'Agus', 'agus@gmail.com', '4be30d9814c6d4e9800e0d2ea9ec9fb00efa887b');