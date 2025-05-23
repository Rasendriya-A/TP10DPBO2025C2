<?php
require_once 'config/Database.php';

class Field {
    private $conn;
    private $table = 'fields';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nama_lapangan, $jenis, $harga_per_jam) {
        $query = "INSERT INTO " . $this->table . " (nama_lapangan, jenis, harga_per_jam) VALUES (:nama_lapangan, :jenis, :harga_per_jam)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama_lapangan', $nama_lapangan);
        $stmt->bindParam(':jenis', $jenis);
        $stmt->bindParam(':harga_per_jam', $harga_per_jam);
        return $stmt->execute();
    }

    public function update($id, $nama_lapangan, $jenis, $harga_per_jam) {
        $query = "UPDATE " . $this->table . " 
                  SET nama_lapangan = :nama_lapangan, jenis = :jenis, harga_per_jam = :harga_per_jam 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama_lapangan', $nama_lapangan);
        $stmt->bindParam(':jenis', $jenis);
        $stmt->bindParam(':harga_per_jam', $harga_per_jam);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($id) {
        try {
            $query = "DELETE FROM " . $this->table . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) { // Integrity constraint violation
                throw new Exception("Field tidak bisa dihapus karena masih memiliki booking aktif.");
            } else {
                throw $e;
            }
        }
    }
}
?>
