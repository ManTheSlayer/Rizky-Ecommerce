-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jan 2025 pada 09.40
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-rizkypratama`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `email`, `username`, `password`) VALUES
(2, 'admin@gmail.com', 'Admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `harga` varchar(6) NOT NULL,
  `kuantitas` int(5) NOT NULL,
  `berat` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id`, `id_user`, `id_produk`, `gambar`, `nama`, `kategori`, `harga`, `kuantitas`, `berat`) VALUES
(284, 31, 2003, 'RAPAtech Charger 20w.jpg', 'RAPAtech Charger MFI 20w', 'charger', '200000', 1, '35'),
(285, 31, 47, 'Softcase Loopy - Putih.jpg', 'Softcase Loopy - Putih', 'caseip', '18000', 1, '27'),
(286, 31, 72, 'Phonestrap Manik Toy Story - Lotso.jpg', 'Phonestrap Manik Toy Story - Lotso', 'aksesoris', '35000', 1, '10'),
(287, 31, 64, 'ANKER Charger 20w.jpg', 'ANKER Charger MFI 20w', 'charger', '240000', 1, '130'),
(353, 32, 93, 'reguler idcard.png', 'ID Card Standar', 'idcard', '8000', 1, '10'),
(357, 32, 88, 'cetak-kartu.jpg', 'Kartu Nama Custom (Box-100pcs)', 'kartunama', '30000', 1, '200'),
(358, 32, 100, 'pin custom.png', 'Pin Kustom', 'pinmug', '10000', 1, '10'),
(359, 32, 86, 'bahan albatros.jpeg', 'Banner Albatros', 'banner', '60000', 1, '120'),
(360, 32, 97, 'printa3+.jpg', 'Print A3+ Glossy', 'printa3', '7000', 1, '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `pengirim_id` int(11) NOT NULL,
  `penerima_id` int(11) NOT NULL,
  `subjek` varchar(50) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `tanggal` datetime NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `status_baca` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id`, `pengirim_id`, `penerima_id`, `subjek`, `nama`, `email`, `phone`, `tanggal`, `pesan`, `status_baca`) VALUES
(3, 0, 0, 'Status Pesanan Saya', 'Sinta Wati', 'sintawati67@gmail.com', '089545804082', '0000-00-00 00:00:00', 'Apakah pesanan saya sudah di proses?', 0),
(4, 0, 0, 'Status Pesanan Saya', 'Sinta Wati', 'sintawati67@gmail.com', '089545804082', '0000-00-00 00:00:00', 'Kapan pesanan saya dikirim?', 0),
(5, 0, 0, '', '', '', '', '2025-01-15 16:43:36', 'test\r\n', 0),
(6, 0, 0, '', '', '', '', '2025-01-15 16:44:06', 'test\r\n', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `namaLengkap` varchar(40) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `ekspedisi` varchar(10) NOT NULL,
  `grand_total` varchar(8) NOT NULL,
  `total_ongkir` varchar(7) NOT NULL,
  `final_total` varchar(8) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `resi` varchar(12) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `bukti` varchar(60) NOT NULL,
  `status_pesanan` varchar(10) NOT NULL,
  `desain` varchar(60) NOT NULL,
  `catatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_user`, `namaLengkap`, `phone`, `alamat`, `ekspedisi`, `grand_total`, `total_ongkir`, `final_total`, `nama_produk`, `resi`, `tanggal`, `bukti`, `status_pesanan`, `desain`, `catatan`) VALUES
(133, 32, 'Lukman Khafi', '089643706996', 'Jawa Barat, Kabupaten, Bogor, 16911. Detail: Metland Cibitung', 'tiki', '7000', '9000', '16000', 'Print A3+ Glossy (1)', 'CekDluAja', '13-01-2025 12:32:00', 'bukti-tf.png', 'selesai', '', ''),
(134, 32, 'Lukman Khafi', '089643706996', 'Jawa Barat, Kabupaten, Bogor, 16911. Detail: Metland Cibitung', 'tiki', '7000', '9000', '16000', 'Print A3+ Glossy (1)', 'CekDluAja', '15-01-2025 12:32:00', 'bukti-tf.png', 'selesai', '', ''),
(135, 32, 'Lukman Khafi', '089643706996', 'Jawa Barat, Kabupaten, Bekasi, 17837. Detail: Metland Cibitung', 'pos', '22000', '18000', '40000', 'Stiker A3 (1)', 'CekDluAja', '13-01-2025 12:33:46', 'bukti-tf.png', 'selesai', '', ''),
(136, 32, 'Lukman Khafi', '089643706996', 'Jawa Barat, Kabupaten, Bekasi, 17837. Detail: Metland Cibitung', 'tiki', '123000', '9000', '132000', 'Plakat Kayu (1), Id Card Custom (Spesial Request) (1), ID Card Standar (1)', 'CekDluAja', '15-01-2025 12:38:03', 'bukti-tf.png', 'selesai', '', ''),
(137, 32, 'Lukman Khafi', '089643706996', 'Jawa Barat, Kabupaten, Bekasi, 17837. Detail: Metland Cibitung', 'jne', '30000', '10000', '40000', 'Mug Custom (1)', 'CekDluAja', '15-01-2025 19:19:15', 'bukti-tf.png', 'selesai', '', ''),
(138, 32, 'Lukman Khafi', '089643706996', 'DKI Jakarta, Kota, Jakarta Pusat, 10540. Detail: Metland Cibitung', 'tiki', '22000', '9000', '31000', 'Stiker A3 (1)', 'CekDluAja', '16-01-2025 11:57:49', 'bukti-tf.png', 'selesai', '', ''),
(140, 32, 'Lukman Khafi', '089643706996', 'Jawa Barat, Kota, Bekasi, 17121. Detail: Metland Cibitung', 'jne', '8000', '10000', '18000', 'ID Card Standar (1)', 'CekDluAja', '16-01-2025 14:09:28', 'bukti-tf.png', 'selesai', '', ''),
(141, 32, 'Lukman Khafi', '089643706996', 'Jawa Barat, Kabupaten, Bogor, 16911. Detail: Metland Cibitung', 'jne', '30000', '10000', '40000', 'Kartu Nama Custom (Box-100pcs) (1)', 'CekDluAja', '16-01-2025 14:30:35', 'bukti-tf.png', 'selesai', '', ''),
(142, 32, 'Lukman Khafi', '089643706996', 'Jawa Barat, Kabupaten, Bekasi, 17837. Detail: Metland Cibitung', 'jne', '100000', '10000', '110000', 'Pin Kustom (10)', 'CekDluAja', '16-01-2025 14:55:22', 'bukti-tf.png', 'selesai', '', ''),
(143, 32, 'Lukman Khafi', '089643706996', 'Jawa Barat, Kabupaten, Bekasi, 17837. Detail: Metland Cibitung', 'pos', '30000', '8000', '38000', 'Kartu Nama Custom (Box-100pcs) (1)', 'CekDluAja', '16-01-2025 15:24:27', 'bukti-tf.png', 'selesai', '', ''),
(144, 32, 'Lukman Khafi', '089643706996', 'Jawa Barat, Kabupaten, Bekasi, 17837. Detail: Metland Cibitung', 'tiki', '15000', '9000', '24000', 'Id Card Custom (Spesial Request) (1)', 'CekDluAja', '16-01-2025 15:36:09', 'bukti-tf.png', 'selesai', '', ''),
(145, 32, 'Lukman Khafi', '089643706996', 'Jawa Barat, Kabupaten, Bekasi, 17837. Detail: Metland Cibitung', 'pos', '22000', '8000', '30000', 'Stiker A3 (1)', 'CekDluAja', '16-01-2025 16:33:41', 'bukti-tf.png', 'selesai', '', ''),
(149, 32, 'Lukman Khafi', '089643706996', 'Jawa Barat, Kabupaten, Bogor, 16911. Detail: Metland Cibitung', 'pos', '7000', '8000', '15000', 'Print A3+ Glossy (1)', 'CekDluAja', '16-01-2025 18:49:31', 'mug custom.png', 'selesai', '', ''),
(150, 32, 'Lukman Khafi', '089643706996', 'Jawa Barat, Kabupaten, Bekasi, 17837. Detail: Metland Cibitung', 'jne', '8000', '18000', '26000', 'ID Card Standar (1)', 'CekDluAja', '16-01-2025 18:51:35', 'bukti-tf.png', 'selesai', '', ''),
(151, 32, 'Lukman Khafi', '089643706996', 'Jawa Barat, Kabupaten, Bekasi, 17837. Detail: Metland Cibitung', 'tiki', '100000', '9000', '109000', 'Stempel Custom (1)', 'CekDluAja', '16-01-2025 19:15:51', 'bukti-tf.png', 'selesai', 'cetak-kartu.jpg', ''),
(152, 32, 'Lukman Khafi', '089643706996', 'Jawa Barat, Kabupaten, Bekasi, 17837. Detail: Metland Cibitung', 'pos', '30000', '8000', '38000', 'Kartu Nama Custom (Box-100pcs) (1)', 'CekDluAja', '16-01-2025 19:40:18', 'bukti-tf.png', 'selesai', 'cetak-kartu.jpg', ''),
(153, 32, 'Lukman Khafi', '089643706996', 'Jawa Barat, Kabupaten, Bekasi, 17837. Detail: Metland Cibitung', 'tiki', '30000', '9000', '39000', 'Kartu Nama Custom (Box-100pcs) (1)', 'APa aja', '16-01-2025 19:46:33', 'bukti-tf.png', 'selesai', '', ''),
(154, 32, 'Lukman Khafi', '089643706996', 'Jawa Barat, Kabupaten, Bogor, 16911. Detail: Metland Cibitung', 'tiki', '30000', '9000', '39000', 'Kartu Nama Custom (Box-100pcs) (1)', 'CekDluAja', '16-01-2025 20:01:02', 'cetak-kartu (1).jpg', 'selesai', '49. Dokumen User Acceptance Test.pdf', ''),
(158, 32, 'Lukman Khafi', '089643706996', 'Jawa Barat, Kota, Bekasi, 17121. Detail: Metland Cibitung', 'tiki', '100000', '8000', '108000', 'Stempel Custom (1)', 'CekDluAja', '16-01-2025 22:54:17', 'cetak-kartu (1).jpg', 'selesai', '49. Dokumen User Acceptance Test.pdf', 'Ini desain nya tolong di buat in ya \r\n'),
(160, 32, 'Lukman Khafi', '089643706996', 'Jawa Barat, Kabupaten, Bekasi, 17837. Detail: Metland Cibitung', 'tiki', '22000', '8000', '30000', 'Stiker A3 (1)', 'CekDluAja', '17-01-2025 10:08:59', 'cetak-kartu.jpg', 'selesai', 'cetak-kartu.jpg', 'notes aja\r\n'),
(161, 32, 'Lukman Khafi', '089643706996', 'Jawa Barat, Kabupaten, Bekasi, 17837. Detail: Metland Cibitung', 'jne', '30000', '10000', '40000', 'Mug Custom (1)', 'JNE-102031FE', '19-01-2025 14:13:21', 'Line_Chart_Temperature Years.png', 'dikirim', 'desain id card.jpg', 'saya mau id card ukuran 5cm x 15cm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` varchar(6) NOT NULL,
  `stok` varchar(3) NOT NULL,
  `dibeli` varchar(3) NOT NULL,
  `bahan` varchar(25) NOT NULL,
  `berat` varchar(4) NOT NULL,
  `model` varchar(40) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `kategori`, `gambar`, `nama`, `harga`, `stok`, `dibeli`, `bahan`, `berat`, `model`, `deskripsi`) VALUES
(86, 'banner', 'bahan albatros.jpeg', 'Banner Albatros', '60000', '25', '25', 'Albatros', '1200', 'Y-Banner', 'Deskripsi: Memiliki rangka berbentuk huruf &quot;X&quot; yang menahan banner di empat sudutnya. Model ini sering dipakai untuk promosi di dalam ruangan.\r\nKeunggulan: Mudah dirakit, ekonomis, dan cocok untuk digunakan ulang.\r\nBahan: Albatros\r\nTeknologi Cet'),
(87, 'stiker', 'stiker.jpeg', 'Stiker A3', '22000', '94', '6', 'Vinyl', '10', 'Hologram', 'Ukuran: A3 (29,7 cm x 42 cm)\r\nBahan: Vinyl berkualitas tinggi dengan adhesi kuat\r\nProses Cutting: Sudah dipotong sesuai desain, memberikan presisi yang rapi dan detail yang sempurna\r\nFungsi: Cocok untuk branding, label produk, dekorasi, promosi, dan kebut'),
(88, 'kartunama', 'cetak-kartu.jpg', 'Kartu Nama Custom (Box-100pcs)', '30000', '90', '10', 'Art Paper', '200', 'Persegi Panjang - Horizontal', 'Jumlah: 100 pcs\r\nBahan: Artpaper 230 gsm/260 gsm/310 gsm (sesuai kebutuhan)\r\nUkuran: Standar (9 x 5,5 cm) atau sesuai permintaan\r\nCetakan: Full color (CMYK), 1 atau 2 sisi'),
(93, 'idcard', 'reguler idcard.png', 'ID Card Standar', '8000', '95', '5', 'PVC', '10', 'Reguler', '- Regular : Dicetak menggunakan teknologi standar cetak ID Card, umumnya digunakan untuk Kartu Pelajar &amp; Kartu Member.\r\n\r\nMohon perhatikan deskripsi produk sebelum check out ya :)\r\n\r\nKeterangan bahan:\r\nBahan PVC dengan dimensi panjang 85.60 mm dan leb'),
(97, 'printa3', 'printa3+.jpg', 'Print A3+ Glossy', '7000', '28', '2', 'Kertas Glossy A3+', '10', 'Linen', 'Print A3+ dengan efek glossy, cocok untuk cetakan foto dan produk visual lainnya.'),
(98, 'idcard', 'custom request idcard.png', 'Id Card Custom (Spesial Request)', '15000', '198', '2', 'PVC + Laminasi', '15', 'Premium', '- Pesanan Khusus: untuk pesanan dengan request khusus. hubungi via fitur chat untuk informasi lebih lanjut\r\n\r\nKetentuan:\r\n- Pilih varian yang diinginkan beserta jumlah yang diperlukan\r\n- File READY TO PRINT dalam format psd, pdf, png maupun ai\r\n- Ukuran f'),
(99, 'plakat', 'plakat kayu.png', 'Plakat Kayu', '100000', '46', '4', 'Kayu', '15', 'Premium', 'Plakat dengan bahan kayu elegan dan ukiran yang detail. Memberikan kesan klasik dan profesional.'),
(100, 'pinmug', 'pin custom.png', 'Pin Kustom', '10000', '239', '11', 'Logam + Epoxy', '10', 'Custom', 'Pin dengan desain penuh warna yang dapat disesuaikan sepenuhnya sesuai kebutuhan pelanggan. Cocok untuk branding perusahaan, acara komunitas, kampanye, atau merchandise eksklusif. Pelanggan dapat memilih warna, logo, teks, hingga bentuk sesuai permintaan.'),
(101, 'pinmug', 'mug custom.png', 'Mug Custom', '30000', '117', '3', 'Keramik', '200', 'Custom', 'Mug yang dapat disesuaikan dengan desain penuh warna, seperti logo, foto, atau teks. Ideal untuk merchandise perusahaan, acara, atau hadiah unik.\r\n\r\nDiameter 8 cm, Tinggi 9,5 cm'),
(102, 'stempel', 'stempel.png', 'Stempel Custom', '100000', '17', '3', 'Plastik + Karet', '50', 'Custom', 'Stempel yang dapat disesuaikan dengan logo, teks, atau desain khusus. Ideal untuk branding atau bisnis.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto_profil` varchar(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `password` varchar(60) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `email`, `foto_profil`, `username`, `nama`, `phone`, `password`, `alamat`) VALUES
(31, 'udin1@gmail.com', '', 'Udin222', 'Muhamad Syahrudin', '895347839716', '$2y$10$Qoteu5/dyyJweybgEYlgE.R.iMu4lC5bHzUb1yxT8nj888AJxU.OS', 'Kp Lubang Buaya RT01/RW05, Desa Cijengkol, Kec. Setu, Kab. Bekasi, Jawa Barat, 17320.'),
(32, 'man@gmail.com', '', 'man', 'Lukman Khafi', '089643706996', '$2y$10$hq.dnRRgnWV9dMaXodtCZuRRfK3J04ZgsTIOIpT68kpv/dPF2BPRG', 'Metland Cibitung'),
(33, 'man123@gmail.com', '', 'mann', 'Mann', '08927292384', '$2y$10$TROlaGHRv7uCB4RebEnieewwmyzTqPjg7YobGmIxyjsVpnMmm62ae', 'Cibitung Villa Mutiara\r\n'),
(34, 'user123@gmail.com', '', 'user123', '', '098751378551', '$2y$10$XPp.auyGlrCYPyyO9o5hOe4sBwfYG43xDC0dZxtQRCJPOgQQEvD6a', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=362;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
