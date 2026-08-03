<?php
class Masuk {
  private $conn;

  public function __construct($db) {
    $this->conn = $db;
  }

  public function login($email, $password) {
    $stmt = $this->conn->prepare("SELECT * FROM admin WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
      $data = $result->fetch_assoc();
      if (password_verify($password, $data['password'])) {
        return ['success' => true, 'admin' => $data];
      } else {
        return ['success' => false, 'error' => 'Password salah'];
      }
    } else {
      return ['success' => false, 'error' => 'Email tidak ditemukan'];
    }
  }
}
