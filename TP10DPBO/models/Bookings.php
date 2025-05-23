<?php
require_once 'config/Database.php';

class Booking {
    private $conn;
    private $table = 'bookings';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT b.id, f.nama_lapangan, u.nama AS nama_user, b.tanggal, b.jam_mulai, b.jam_selesai
                  FROM " . $this->table . " b
                  JOIN fields f ON b.field_id = f.id
                  JOIN users u ON b.user_id = u.id
                  ORDER BY b.tanggal DESC, b.jam_mulai ASC";
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

    public function create($field_id, $user_id, $tanggal, $jam_mulai, $jam_selesai) {
        $query = "INSERT INTO " . $this->table . " 
                  (field_id, user_id, tanggal, jam_mulai, jam_selesai)
                  VALUES (:field_id, :user_id, :tanggal, :jam_mulai, :jam_selesai)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':field_id', $field_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':tanggal', $tanggal);
        $stmt->bindParam(':jam_mulai', $jam_mulai);
        $stmt->bindParam(':jam_selesai', $jam_selesai);
        return $stmt->execute();
    }

    public function update($id, $field_id, $user_id, $tanggal, $jam_mulai, $jam_selesai) {
        $query = "UPDATE " . $this->table . "
                  SET field_id = :field_id, user_id = :user_id, tanggal = :tanggal, 
                      jam_mulai = :jam_mulai, jam_selesai = :jam_selesai
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':field_id', $field_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':tanggal', $tanggal);
        $stmt->bindParam(':jam_mulai', $jam_mulai);
        $stmt->bindParam(':jam_selesai', $jam_selesai);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
