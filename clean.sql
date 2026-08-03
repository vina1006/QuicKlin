-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 31, 2025 at 01:35 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clean`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int UNSIGNED NOT NULL,
  `kode_admin` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `kode_admin`, `username`, `email`, `password`) VALUES
(2, 'ADM002', 'admin', 'vinafitriya2@gmail.com', '$2y$10$CQGCifPh4/8xQ.bySHyrOOMxSRT6tCy7dzYMaaGoqTMAo1q/FdlDK');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_dibuat` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `isi`, `gambar`, `tanggal_dibuat`) VALUES
(3, 'Pentingnya Jasa Cleaning Service Profesional untuk Kehidupan Modern', 'Di tengah kesibukan hidup modern, menjaga kebersihan dan kenyamanan lingkungan, baik itu rumah maupun kantor, seringkali menjadi tantangan tersendiri. Waktu yang terbatas, tenaga yang terkuras, serta kebutuhan akan hasil yang optimal membuat banyak individu dan perusahaan beralih pada solusi praktis: jasa cleaning service profesional.\r\n\r\nLayanan kebersihan tidak lagi sekadar tentang menyapu dan mengepel. Ia telah berkembang menjadi sebuah industri yang menawarkan keahlian, efisiensi, dan standar kebersihan yang tinggi. Mengapa jasa cleaning service profesional menjadi begitu penting?\r\n\r\n1. Efisiensi Waktu dan Tenaga\r\nSalah satu manfaat terbesar menggunakan jasa cleaning service adalah efisiensi. Bayangkan berapa banyak waktu yang bisa Anda hemat jika tugas membersihkan rumah atau kantor diserahkan kepada ahlinya. Waktu yang tadinya digunakan untuk membersihkan bisa dialokasikan untuk pekerjaan, keluarga, hobi, atau istirahat. Ini sangat krusial bagi para profesional, orang tua, atau siapa pun yang memiliki jadwal padat.\r\n\r\n2. Hasil Kebersihan yang Optimal dan Menyeluruh\r\nTim cleaning service profesional dilatih dengan teknik kebersihan yang tepat dan dilengkapi dengan peralatan serta produk pembersih khusus. Mereka tahu bagaimana menangani berbagai jenis noda, permukaan, dan area yang sulit dijangkau. Hasilnya adalah kebersihan yang jauh lebih menyeluruh dan higienis dibandingkan pembersihan biasa. Mulai dari disinfeksi kamar mandi, pembersihan dapur yang mendalam, hingga perawatan karpet dan sofa, semuanya ditangani dengan standar tinggi.\r\n\r\n3. Lingkungan yang Lebih Sehat dan Higienis\r\nKebersihan adalah fondasi kesehatan. Jasa cleaning service profesional tidak hanya membuat ruangan tampak bersih, tetapi juga fokus pada sanitasi dan disinfeksi. Mereka menggunakan produk yang efektif membunuh kuman, bakteri, dan virus, menciptakan lingkungan yang lebih sehat dan mengurangi risiko penyebaran penyakit, terutama di area dengan lalu lintas tinggi seperti kantor atau fasilitas umum.\r\n\r\n4. Peningkatan Produktivitas dan Mood\r\nLingkungan yang bersih dan rapi secara langsung memengaruhi suasana hati dan produktivitas. Di rumah, kebersihan menciptakan suasana yang nyaman untuk relaksasi. Di kantor, ruang kerja yang bersih dan terorganisir dapat meningkatkan fokus, kreativitas, dan kesejahteraan karyawan, yang pada akhirnya berdampak positif pada produktivitas.\r\n\r\n5. Solusi Fleksibel dan Terpercaya\r\nJasa cleaning service profesional menawarkan berbagai paket yang dapat disesuaikan dengan kebutuhan spesifik Anda, baik itu pembersihan harian, mingguan, bulanan, atau pembersihan khusus seperti pasca-konstruksi atau disinfeksi. Anda bisa memilih jadwal yang paling cocok tanpa perlu khawatir tentang ketersediaan tenaga atau peralatan. Selain itu, perusahaan terkemuka seperti QuicKlin menjamin tim yang terpercaya dan terlatih.\r\n\r\nMengapa Memilih QuicKlin?\r\nSebagai penyedia jasa cleaning service terdepan, QuicKlin berkomitmen untuk memberikan solusi kebersihan yang tidak hanya efektif, tetapi juga aman dan ramah lingkungan. Kami memahami bahwa setiap klien memiliki kebutuhan unik, oleh karena itu kami menawarkan:\r\n\r\nTim Profesional dan Berpengalaman: Setiap anggota tim kami adalah ahli yang terlatih dan berdedikasi.\r\n\r\nTeknologi dan Peralatan Modern: Kami menggunakan inovasi terbaru untuk hasil yang maksimal dan efisien.\r\n\r\nProduk Ramah Lingkungan: Prioritas kami adalah kesehatan Anda dan kelestarian lingkungan.\r\n\r\nFleksibilitas Layanan: Paket yang dapat disesuaikan untuk rumah, kantor, komersial, hingga layanan spesialis.\r\n\r\nJaminan Kepuasan: Kepuasan pelanggan adalah inti dari setiap layanan yang kami berikan.\r\n\r\nJangan biarkan kesibukan menghalangi Anda memiliki lingkungan yang bersih dan sehat. Serahkan pada ahlinya. Bersama QuicKlin, nikmati kenyamanan dan ketenangan pikiran yang datang dari kebersihan yang sempurna.\r\n\r\nTertarik untuk merasakan perbedaannya?\r\nKunjungi halaman Produk & Layanan kami', '688994480fc16_clean.jpeg', '2025-07-30 10:40:56'),
(4, 'Tips Memilih Jasa Cleaning Service Terbaik untuk Kebutuhan Anda', 'Memilih jasa cleaning service yang tepat adalah investasi penting untuk kenyamanan dan kesehatan lingkungan Anda. Dengan banyaknya pilihan yang tersedia, bagaimana Anda bisa memastikan bahwa Anda membuat keputusan yang terbaik? Berikut adalah beberapa tips yang dapat membantu Anda memilih jasa cleaning service profesional yang paling sesuai dengan kebutuhan Anda.\r\n\r\n1. Tentukan Kebutuhan Anda dengan Jelas\r\nSebelum mencari penyedia jasa, identifikasi dengan spesifik apa yang Anda butuhkan:\r\n\r\nJenis Layanan: Apakah Anda memerlukan pembersihan rumah tangga rutin, pembersihan kantor, deep cleaning, pembersihan pasca-konstruksi, atau disinfeksi khusus?\r\n\r\nFrekuensi: Seberapa sering Anda membutuhkan layanan? Harian, mingguan, bulanan, atau hanya sekali saja?\r\n\r\nArea Fokus: Apakah ada area tertentu yang memerlukan perhatian ekstra (misalnya dapur, kamar mandi, karpet, jendela)?\r\n\r\nAnggaran: Berapa anggaran yang Anda siapkan untuk layanan kebersihan?\r\n\r\nDengan memahami kebutuhan Anda, Anda bisa menyaring pilihan dengan lebih efektif.\r\n\r\n2. Periksa Reputasi dan Pengalaman\r\nReputasi adalah kunci. Cari tahu pengalaman penyedia jasa di industri ini.\r\n\r\nUlasan dan Testimoni: Cari ulasan online di Google Maps, media sosial, atau platform ulasan lainnya. Perhatikan apa yang dikatakan pelanggan sebelumnya tentang kualitas layanan, profesionalisme, dan keandalan.\r\n\r\nPortofolio: Jika memungkinkan, lihat portofolio pekerjaan mereka, terutama jika Anda membutuhkan layanan untuk properti komersial atau pembersihan khusus.\r\n\r\nRekomendasi: Minta rekomendasi dari teman, keluarga, atau rekan bisnis yang pernah menggunakan jasa cleaning service.\r\n\r\n3. Lisensi, Asuransi, dan Sertifikasi\r\nIni adalah aspek krusial yang sering terlewatkan.\r\n\r\nLisensi: Pastikan perusahaan memiliki lisensi bisnis yang sah.\r\n\r\nAsuransi: Verifikasi bahwa mereka memiliki asuransi kewajiban (liability insurance) untuk melindungi Anda dari kerusakan properti atau cedera yang mungkin terjadi selama proses pembersihan.\r\n\r\nSertifikasi: Beberapa perusahaan memiliki sertifikasi untuk praktik kebersihan tertentu (misalnya, penggunaan produk ramah lingkungan, standar higienis). Ini menunjukkan komitmen mereka terhadap kualitas dan keamanan.\r\n\r\n4. Kualitas Tenaga Kerja\r\nKaryawan adalah wajah dari perusahaan cleaning service.\r\n\r\nPelatihan: Tanyakan bagaimana mereka melatih stafnya. Apakah mereka memiliki program pelatihan yang komprehensif untuk teknik kebersihan, penggunaan peralatan, dan etika kerja?\r\n\r\nPenyaringan Karyawan: Apakah mereka melakukan pemeriksaan latar belakang (background check) pada karyawannya? Ini penting untuk keamanan dan ketenangan pikiran Anda.\r\n\r\nProfesionalisme: Amati bagaimana staf berkomunikasi dan berperilaku. Profesionalisme mencakup ketepatan waktu, seragam yang rapi, dan sikap yang sopan.\r\n\r\n5. Peralatan dan Produk Pembersih\r\nTeknologi dan produk yang digunakan sangat memengaruhi hasil.\r\n\r\nPeralatan Modern: Pastikan mereka menggunakan peralatan yang modern dan sesuai standar industri untuk hasil yang efisien dan efektif.\r\n\r\nProduk Pembersih: Tanyakan tentang jenis produk pembersih yang mereka gunakan. Apakah mereka menawarkan opsi ramah lingkungan, non-alergenik, atau produk khusus untuk kebutuhan tertentu? Pastikan produk tersebut aman untuk penghuni dan permukaan properti Anda.\r\n\r\n6. Fleksibilitas dan Kustomisasi Layanan\r\nPenyedia jasa terbaik adalah yang dapat beradaptasi dengan kebutuhan klien.\r\n\r\nPaket Fleksibel: Apakah mereka menawarkan paket yang dapat disesuaikan atau hanya paket standar? Kemampuan untuk menyesuaikan layanan adalah nilai tambah.\r\n\r\nJadwal: Pastikan mereka dapat mengakomodasi jadwal Anda, baik itu di luar jam kerja, akhir pekan, atau pada waktu-waktu tertentu.\r\n\r\n7. Transparansi Harga\r\nDapatkan penawaran harga yang jelas dan terperinci.\r\n\r\nEstimasi Gratis: Mintalah estimasi harga gratis dan pastikan tidak ada biaya tersembunyi.\r\n\r\nRincian Layanan: Pastikan penawaran harga merinci layanan apa saja yang termasuk dalam paket dan apa yang tidak.\r\n\r\nMemilih QuicKlin sebagai Pilihan Terbaik Anda\r\nDi QuicKlin, kami memahami semua aspek di atas dan berkomitmen untuk memberikan layanan cleaning service profesional yang memenuhi standar tertinggi. Dengan tim yang terlatih, teknologi modern, produk ramah lingkungan, dan fleksibilitas layanan, kami siap menjadi mitra kebersihan terpercaya Anda.\r\n\r\nKami mengundang Anda untuk merasakan sendiri perbedaan QuicKlin. Hubungi kami hari ini untuk konsultasi gratis dan temukan solusi kebersihan yang sempurna untuk Anda!', '688994b9e26bc_OIP.jpeg', '2025-07-30 10:42:49'),
(6, 'jamal', 'cgdhfghrg', NULL, '2025-07-30 12:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `deskripsi`, `harga`) VALUES
(2, 'Deep Cleaning Rumah Tinggal', 'Pembersihan menyeluruh dan mendalam untuk seluruh area rumah, termasuk kamar mandi, dapur, jendela, dan area yang sulit dijangkau. Cocok untuk pembersihan berkala atau pasca-renovasi.', 350000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
