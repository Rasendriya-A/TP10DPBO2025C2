<?php
require_once 'models/Fields.php';

class FieldsViewModel {
    private $field;

    public function __construct() {
        $this->field = new Field();
    }

    public function getFieldList() {
        return $this->field->getAll();
    }

    public function getFieldById($id) {
        return $this->field->getById($id);
    }

    public function addField($nama_lapangan, $jenis, $harga_per_jam) {
        return $this->field->create($nama_lapangan, $jenis, $harga_per_jam);
    }

    public function updateField($id, $nama_lapangan, $jenis, $harga_per_jam) {
        return $this->field->update($id, $nama_lapangan, $jenis, $harga_per_jam);
    }

    public function deleteField($id) {
        try {
            $this->field->delete($id);
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
