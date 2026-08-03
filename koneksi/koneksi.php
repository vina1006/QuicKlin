<?php
// Sesuaikan path ke vendor/autoload.php
require_once __DIR__ . '/../vendor/autoload.php';

// Load file .env dari root project
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

// Ambil variabel dari .env
$host = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_DATABASE'];
$user = $_ENV['DB_USERNAME'];
$pass = $_ENV['DB_PASSWORD'];

// Koneksi ke database
// Koneksi ke database
$koneksi = new mysqli($host, $user, $pass, $dbname); // ✅ Ubah dari $conn ke $koneksi


// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
