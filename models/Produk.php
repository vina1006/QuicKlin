<?php
// models/Produk.php

class Produk {
    private $conn;
    private $table_name = "produk"; // Pastikan nama tabel Anda 'produk'

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT id, nama_produk, deskripsi, harga FROM " . $this->table_name . " ORDER BY id DESC";
        $result = $this->conn->query($query);
        // Tambahkan penanganan error sederhana jika query gagal
        if (!$result) {
            error_log("Error in Produk::getAll: " . $this->conn->error);
            return false; // Atau throw exception
        }
        return $result;
    }

    public function create($nama_produk, $deskripsi, $harga) {
        $stmt = null;
        try {
            $query = "INSERT INTO " . $this->table_name . " (nama_produk, deskripsi, harga) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            // 's' untuk string nama_produk, 's' untuk string deskripsi, 'd' untuk decimal harga
            $stmt->bind_param("ssd", $nama_produk, $deskripsi, $harga);
            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Error in Produk::create: " . $e->getMessage());
            return false;
        } finally {
            if ($stmt) $stmt->close();
        }
    }

    public function getById($id) {
        $stmt = null;
        try {
            $stmt = $this->conn->prepare("SELECT id, nama_produk, deskripsi, harga FROM " . $this->table_name . " WHERE id = ? LIMIT 1");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        } catch (Exception $e) {
            error_log("Error in Produk::getById: " . $e->getMessage());
            return null;
        } finally {
            if ($stmt) $stmt->close();
        }
    }

    public function update($id, $nama_produk, $deskripsi, $harga) {
        $stmt = null;
        try {
            $query = "UPDATE " . $this->table_name . " SET nama_produk = ?, deskripsi = ?, harga = ? WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            // 's' untuk string nama_produk, 's' untuk string deskripsi, 'd' untuk decimal harga, 'i' untuk integer id
            $stmt->bind_param("ssdi", $nama_produk, $deskripsi, $harga, $id);
            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Error in Produk::update: " . $e->getMessage());
            return false;
        } finally {
            if ($stmt) $stmt->close();
        }
    }

    public function delete($id) {
        $stmt = null;
        try {
            $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $id);
            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Error in Produk::delete: " . $e->getMessage());
            return false;
        } finally {
            if ($stmt) $stmt->close();
        }
    }
}
?>