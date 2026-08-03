<?php
require_once __DIR__ . '/../models/Daftar.php';

class DaftarController {
  private $daftarModel;
  public $success = '';
  public $error = '';
  public $newCode = '';

  public function __construct($db) {
    $this->daftarModel = new Daftar($db);
    $this->newCode = $this->daftarModel->getLastKodeAdmin();
  }

  public function handleRequest() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $kode_admin = $_POST['kode_admin'];
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

      list($result, $error) = $this->daftarModel->register($kode_admin, $username, $email, $password);

      if ($result) {
        $this->success = "Pendaftaran berhasil!";
        $this->newCode = $this->daftarModel->getLastKodeAdmin();
      } else {
        $this->error = "Terjadi kesalahan: " . $error;
      }
    }
  }
}
