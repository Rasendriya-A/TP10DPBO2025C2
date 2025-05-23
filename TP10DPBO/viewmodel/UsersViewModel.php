<?php
require_once 'models/Users.php';

class UsersViewModel {
    private $user;

    public function __construct() {
        $this->user = new User();
    }

    public function getUserList() {
        return $this->user->getAll();
    }

    public function getUserById($id) {
        return $this->user->getById($id);
    }

    public function addUser($nama, $kontak) {
        return $this->user->create($nama, $kontak);
    }

    public function updateUser($id, $nama, $kontak) {
        return $this->user->update($id, $nama, $kontak);
    }

    public function deleteUser($id) {
        try {
            $this->user->delete($id);
            header("Location: index.php?entity=users&deleted=true");
            exit();
        } catch (Exception $e) {
            // Simpan pesan error dalam session
            $_SESSION['error_message'] = $e->getMessage();
            header("Location: index.php?entity=users");
            exit();
        }
    }
}
?>
