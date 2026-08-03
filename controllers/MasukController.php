<?php
require_once __DIR__ . '/../models/Masuk.php';

class MasukController {
  private $model;
  public $error = '';

  public function __construct($db) {
    $this->model = new Masuk($db);
  }

  public function handleLogin() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $result = $this->model->login($email, $password);

      if ($result['success']) {
        session_start();
        $_SESSION['admin'] = $result['admin'];
        header("Location: admin/dashboard.php"); // Ubah sesuai dashboard kamu
        exit;
      } else {
        $this->error = $result['error'];
      }
    }
  }
}
