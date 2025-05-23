<?php
require_once 'models/Bookings.php';

class BookingsViewModel {
    private $booking;

    public function __construct() {
        $this->booking = new Booking();
    }

    public function getBookingList() {
        return $this->booking->getAll();
    }

    public function getBookingById($id) {
        return $this->booking->getById($id);
    }

    public function addBooking($field_id, $user_id, $tanggal, $jam_mulai, $jam_selesai) {
        return $this->booking->create($field_id, $user_id, $tanggal, $jam_mulai, $jam_selesai);
    }

    public function updateBooking($id, $field_id, $user_id, $tanggal, $jam_mulai, $jam_selesai) {
        return $this->booking->update($id, $field_id, $user_id, $tanggal, $jam_mulai, $jam_selesai);
    }

    public function deleteBooking($id) {
        return $this->booking->delete($id);
    }
}
?>
