<?php
require_once __DIR__ . '/../models/Keluar.php';

class KeluarController {
    private $model;

    public function __construct() {
        session_start();
        $this->model = new Keluar();
    }

    public function handleLogout() {
        $result = $this->model->logout();
        
        if ($result['success']) {
            header("Location: masuk.php");
            exit;
        } else {
            // Jika ingin menangani error (meskipun kecil kemungkinannya)
            die("Terjadi kesalahan saat logout");
        }
    }
}
?>