-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21 Mar 2018 pada 12.04
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+07:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hans_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`, `email`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'danirahmaone33@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `kategori_seo` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=25 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `kategori_seo`) VALUES
(1, 'Wisata Petualangan', 'wisata-petualangan'),
(2, 'Wisata Outbond dan berkemah', 'wisata-outbond-dan-berkemah'),
(3, 'Paket Live In Cottages', 'paket-live-in-cottages');

-- --------------------------------------------------------

--
-- Struktur dari tabel `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
`id_modul` int(5) NOT NULL,
  `nama_modul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `konten` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `konten`) VALUES
(1, ' Edit Cara Pembelian', '<ol><span class="center_content2"><li>Klik pada tombolÂ <span style="font-weight: bold">Beli</span> pada Produk yang ingin Anda pesan.</li>	<li>Produk yang Anda pesan akan masuk ke dalam <span style="font-weight: bold">Keranjang Belanja</span>. Anda dapat melakukan perubahan jumlah Produk yang diinginkan dengan mengganti angka di kolom <span style="font-weight: bold">Jumlah</span>,Sedangkan untuk menghapus sebuah produk dari Keranjang Belanja, klik tombol Kali yang berada di kolom paling kanan.</li>	<li>Jika sudah selesai, klik tombol <span style="font-weight: bold">Selesai Belanja</span>, maka akan tampil form untuk pengisian data kustomer/pembeli.</li>	<li>Setelah data pembeli selesai diisikan, klik tombol <span style="font-weight: bold">Proses</span>, maka akan tampil data pembeli beserta produk yang dipesannya, dan juga total pembayaran kemudian cetak bukti /simpan sebagai bukti transaksi.</li>	<li>Dan Terakhir apabila telah melakukan pembayaran, unggah bukti transfer dalam bentuk foto / screenshot, maka produk/barang akan segera kami proses untuk  dikirimkan. </li><li>Atas perhatianya kami ucapkan terima kasih dan selamat berbelanja di toko kami. </li></span></ol><w:worddocument></w:worddocument>'),
(2, 'Tentang Kami', 'Hiyam Coffee Adalah Nama Produk Kopi Dari Tempat Kami Yaitu Lesehan Cafe. Kami Menyediakan Aneka Kopi Instan Dengan Memadukan Beberapa Rasa, Diantaranya Minuman Instan Kopi Rasa Kelapa, Kopi Rasa Durian, Kopi Rasa Stroberry, Kopi Rasa Melon dan Kopi Rasa alpukat. Kami Melakukan Proses Mengkombinasikan Antara Beberapa Tipe Biji Kopi Untuk Menambah Cita Rasanya dan Juga Dengan Percampuran Ekstak Rasa Buah Agar Dapat Menyajikan Kopi Dengan Rasa Yang Lebih Kompleks. Kami Menyediakan Dalam Bentuk Kemasan Saset dan Kemasan 1 Kg. Kami Menjual Untuk Berbagai Kalangan Pecinta Kopi dan Juga Menerima Kerjasama Dengan Para Distributor Yang Ada Di Indonesia.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE IF NOT EXISTS `paket` (
`id_paket` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(10) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `id_kategori`, `nama_paket`, `deskripsi`, `harga`, `tgl_masuk`, `gambar`) VALUES
(1, 1, 'Rafting Trip I ', ' Menyusuri sungai Oyo ( Sungai terbesar di Gunungkidul ) dengan menggunakan perahu kano dari Hutan Bunder â€“ Kampoeng Wisata,                       per orang Rp. 70.000,-\r\n\r\nPaket tersebut termasuk : Sewa alat, pemandu, transport ke titik start dan pulang, asuransi, makan dan minum, minimal 6 orang.', 70000, '2017-10-18', '67coconut25gr.png'),
(2, 1, 'Rafting Trip II', ' Menyusuri sungai Oyo ( Sungai terbesar di Gunungkidul ) dengan menggunakan perahu kano dari Kampoeng Wisata sampai Wonolagi,                       per orang Rp. 60.000,-\r\n\r\nPaket tersebut termasuk : Sewa alat, pemandu, transport ke titik start dan pulang, asuransi, makan dan minum, minimal 6 orang.', 60000, '2017-10-18', '80durian25gr.png'),
(3, 1, 'Rafting Trip III', ' Menyusuri sungai Oyo ( Sungai terbesar di Gunungkidul ) dengan menggunakan perahu kano dari Hutan Bunder â€“ Dodogan (transit di Jelok) per orang Rp.100.000,-\r\n\r\nPaket tersebut termasuk : Sewa alat, pemandu, transport ke titik start dan pulang, asuransi, makan dan minum, minimal 6 orang.', 70000, '2017-10-18', '71strawberry25gr.png'),
(4, 1, 'Flyingfox', 'Menyajikan tantangan sekaligus keindahan yang memanjakan mata dengan melewati hamparan sawah dan pemandangan lokal yang menawan.', 50000, '2017-10-18', '32avocado25gr.png'),
(5, 1, 'Trail Adventure', 'Paket trial dengan melewati track yang sudah ditentukan dengan panjang track durasi 1 sampai 2 jam. (sudah termasuk sewa alat dan asuransi).', 150000, '2017-10-18', '85melon25gr.png'),
(6, 1, 'Playing ATV', 'Menggunakan ATV Moustrack untuk menjelajah wilayah Kampoeng Wisata  dan sanggup melalui berbagai medan. Tarif untuk menjajal Paket ini  per 15 menit.', 25000, '2017-10-18', '67coconut25gr.png'),
(7, 1, 'Susur Gua', 'Desa Wisata Jelok memiliki Gua yang masih terjaga ekosistemnya, Gua cokakan merupakan Gua horizontal dan tidak diketahui ujungnya. Minimal 6 orang, maksimal 20 orang dalam sehari.', 25000, '2017-10-18', '99melon1kg.png'),
(8, 2, 'Outbond & Outing', 'Mulai dari Rp 75.000 per orang, dengan games yang seru, menarik dan menantang.', 750000, '2017-10-18', '71durian1kg.png'),
(9, 3, 'Paket Bermalam 1', 'Paket 1 hari 1 malam dengan isi 2 kamar ( 1 rumah Limasan ) \r\nPaket ini sudah termasuk  Sarapan dan snack minum 2 kali.    ', 750000, '2017-10-18', '41strawberry1kg.png'),
(10, 3, 'Paket Bermalam 2', 'Paket 1 hari 1 malam , ( 1 kamar tidur ).\r\nPaket ini sudah termasuk  Sarapan dan snack mnum 2 kali.    ', 157000, '2017-10-18', '96coconut1kg.png'),
(15, 3, 'Paket Bermalam 2', 'Paket 1 hari 1 malam , ( 1 kamar tidur ).\r\nPaket ini sudah termasuk  Sarapan dan snack mnum 2 kali.    ', 157000, '2017-10-18', '96coconut1kg.png'),
(17, 3, 'a', 'dfd', 3232, '2018-02-22', '37cara membuat aksesoris photobooth like facebook arissaifulloh.png'),
(18, 3, 'adsa', 'ada', 3434, '2018-02-23', '2037cara membuat aksesoris photobooth like facebook arissaifulloh.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
`rsrv_id` int(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `paket` varchar(20) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `contact` varchar(15) NOT NULL,
  `jumlah` int(10) NOT NULL DEFAULT '1',
  `status` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Baru_Masuk',
  `rsrv_start` date NOT NULL,
  `rsrv_end` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data untuk tabel `reservations`
--

INSERT INTO `reservations` (`rsrv_id`, `nama`, `paket`, `email`, `contact`, `jumlah`, `status`, `rsrv_start`, `rsrv_end`) VALUES
(33, 'gemar', 'adolfo', 'gemar@hotmail.com', '2147483647', 0, 'Baru_Masuk', '2014-03-13', '2014-03-14'),
(34, 'mirana', 'kyle', 'mkyle@hotmail.com', '2147483647', 0, 'Baru_Masuk', '2014-03-15', '2014-03-16'),
(35, 'diwannie', 'arillo', 'arillo@yahoo.com', '2147483647', 0, 'Baru_Masuk', '2014-03-15', '2014-03-17'),
(36, 'mary', 'mission', 'mm@yahoo.com', '2147483647', 0, 'Baru_Masuk', '2014-03-15', '2014-03-18'),
(37, 'gail', 'aplaon', 'gial@yahoo.com', '2147483647', 0, 'Baru_Masuk', '2014-03-15', '2014-03-16'),
(38, 'gina', 'bulgado', 'gbulgado@yahoo.com', '1993382888', 0, 'Baru_Masuk', '2014-03-15', '2014-03-16'),
(39, 'Azwar', 'Nurdin', 'azwarnurdin89@gmail.', '2147483647', 0, 'Baru_Masuk', '2014-06-16', '2014-06-16'),
(40, 'wq', 'f', 'ere@ff', '2147483647', 0, 'Baru_Masuk', '2017-12-21', '2017-12-22'),
(43, 'wqww', 'f', 'ere@ff', '2147483647', 0, 'Baru_Masuk', '2017-12-21', '2017-12-22'),
(44, 'wqwwa', 'f', 'ere@ff', '2147483647', 0, 'Baru_Masuk', '2017-12-22', '2017-12-22'),
(45, 'ewew', 'f', 'ere@ff', '2147483647', 0, 'Baru_Masuk', '2017-12-23', '2017-12-23'),
(46, 'a', 'b', 'c', '2147483647', 0, 'Baru_Masuk', '2017-12-23', '2017-12-23'),
(47, 'aaa', 'adolfo', 'gemar@hotmail.com', '2147483647', 1, 'Baru_Masuk', '2014-03-13', '2014-03-14'),
(49, 'aaasaaa', 'adolfo', 'gemar@hotmail.com', '2147483647', 1, 'Baru_Masuk', '2014-03-13', '2014-03-14'),
(50, 'akhmad dany', '1', 'danirahmaone33@gmail', '670963', 1, 'Baru_Masuk', '2018-03-01', '2018-03-02'),
(51, 'akhma', '1', 'javasugarz@gmail.com', '670963', 1, 'Baru_Masuk', '2018-03-02', '2018-03-03'),
(52, '', '1', '', '', 1, 'Baru_Masuk', '0000-00-00', '0000-00-00'),
(53, 'mentari', '9', 'mentari19.mp@gmail.c', '089660620101', 10, 'Baru_Masuk', '2018-03-21', '2018-03-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
`id_upload` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `tgl` date NOT NULL,
  `jam` time NOT NULL,
  `no_telp` int(16) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `upload`
--

INSERT INTO `upload` (`id_upload`, `nama`, `gambar`, `deskripsi`, `tgl`, `jam`, `no_telp`) VALUES
(1, 'ugfug', 'btf1.jpg', 'cek gan', '2017-10-25', '18:51:40', 6576576),
(2, 'hgfhjgh', 'btf1.jpg', 'segera kirim', '2017-10-25', '18:53:56', 75657),
(3, 'hgjhgkjghj', 'btf1.jpg', 'diproses ya', '2017-10-25', '18:54:25', 6756756),
(11, 'hgfhjgh', 'btf1.jpg', 'segera kirim', '2017-10-25', '18:53:56', 65786),
(12, 'hgfhjgh', 'btf1.jpg', 'segera kirim', '2017-10-25', '18:53:56', 657),
(14, 'men', '21032018175941WhatsApp Image 2018-03-09 at 11.54.29.jpeg', 'pesanan tadi', '2018-03-21', '17:59:41', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
 ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
 ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
 ADD PRIMARY KEY (`rsrv_id`), ADD UNIQUE KEY `rsrv_name` (`nama`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
 ADD PRIMARY KEY (`id_upload`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
MODIFY `id_modul` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
MODIFY `id_paket` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
MODIFY `rsrv_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
MODIFY `id_upload` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
