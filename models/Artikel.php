<?php
// models/Artikel.php

class Artikel {
    private $conn;
    private $table_name = "artikel"; // Pastikan nama tabel Anda 'artikel'

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT id, judul, isi, gambar, tanggal_dibuat FROM " . $this->table_name . " ORDER BY tanggal_dibuat DESC";
        $result = $this->conn->query($query);
        // Tambahkan penanganan error sederhana jika query gagal
        if (!$result) {
            error_log("Error in Artikel::getAll: " . $this->conn->error);
            return false; // Atau throw exception
        }
        return $result;
    }

    public function create($judul, $isi, $gambar = null) {
        $stmt = null;
        try {
            // Tambahkan tanggal_dibuat dengan NOW()
            $query = "INSERT INTO " . $this->table_name . " (judul, isi, gambar, tanggal_dibuat) VALUES (?, ?, ?, NOW())";
            $stmt = $this->conn->prepare($query);
            // 's' untuk string, 's' untuk string, 's' untuk string (gambar bisa null, tapi bind_param tetap butuh tipe string)
            $stmt->bind_param("sss", $judul, $isi, $gambar);
            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Error in Artikel::create: " . $e->getMessage());
            return false;
        } finally {
            if ($stmt) $stmt->close();
        }
    }

    public function getById($id) {
        $stmt = null;
        try {
            $stmt = $this->conn->prepare("SELECT id, judul, isi, gambar, tanggal_dibuat FROM " . $this->table_name . " WHERE id = ? LIMIT 1");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        } catch (Exception $e) {
            error_log("Error in Artikel::getById: " . $e->getMessage());
            return null;
        } finally {
            if ($stmt) $stmt->close();
        }
    }

    public function update($id, $judul, $isi, $gambar = null) {
        $stmt = null;
        try {
            // Logika update gambar yang lebih fleksibel
            if ($gambar !== null) { // Jika ada nama gambar baru (bisa juga string kosong jika ingin set null)
                $query = "UPDATE " . $this->table_name . " SET judul = ?, isi = ?, gambar = ? WHERE id = ?";
                $stmt = $this->conn->prepare($query);
                // Jika $gambar adalah string kosong, itu akan disimpan sebagai string kosong di DB
                // Jika ingin menyimpan NULL di DB, pastikan $gambar benar-benar NULL di sini
                $stmt->bind_param("sssi", $judul, $isi, $gambar, $id);
            } else { // Jika $gambar adalah NULL (artinya ingin menghapus gambar)
                $query = "UPDATE " . $this->table_name . " SET judul = ?, isi = ?, gambar = NULL WHERE id = ?";
                $stmt = $this->conn->prepare($query);
                $stmt->bind_param("ssi", $judul, $isi, $id);
            }
            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Error in Artikel::update: " . $e->getMessage());
            return false;
        } finally {
            if ($stmt) $stmt->close();
        }
    }

    public function delete($id) {
        $stmt = null;
        try {
            // HANYA HAPUS DARI DATABASE. Logika penghapusan file ada di Controller.
            $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $id);
            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Error in Artikel::delete: " . $e->getMessage());
            return false;
        } finally {
            if ($stmt) $stmt->close();
        }
    }
}
?>