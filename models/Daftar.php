<?php
class Daftar {
  private $conn;

  public function __construct($db) {
    $this->conn = $db;
  }

  public function getLastKodeAdmin() {
    $query = $this->conn->query("SELECT kode_admin FROM admin ORDER BY id DESC LIMIT 1");
    $last = $query->fetch_assoc();
    if ($last) {
      $number = (int) substr($last['kode_admin'], 3);
      return 'ADM' . str_pad($number + 1, 3, '0', STR_PAD_LEFT);
    } else {
      return 'ADM001';
    }
  }

  public function register($kode_admin, $username, $email, $password) {
    $stmt = $this->conn->prepare("INSERT INTO admin (kode_admin, username, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $kode_admin, $username, $email, $password);
    $result = $stmt->execute();
    $error = $stmt->error;
    $stmt->close();
    return [$result, $error];
  }
}
