<?php
class Keluar {
    public function logout() {
        // Membersihkan semua data sesi
        $_SESSION = array();

        // Jika ingin menghapus cookie sesi juga
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Hancurkan sesi
        session_destroy();

        return ['success' => true, 'message' => 'Logout berhasil'];
    }
}
?>