<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($booking) ? 'Edit Booking' : 'Tambah Booking'; ?></h2>
<form action="index.php?entity=bookings&action=<?php echo isset($booking) ? 'update&id=' . $booking['id'] : 'save'; ?>" method="POST" class="space-y-4">

    <div>
        <label class="block">Pengguna:</label>
        <select name="user_id" required class="border p-2 w-full">
            <option value="">-- Pilih Pengguna --</option>
            <?php foreach ($users as $user): ?>
                <option value="<?php echo $user['id']; ?>"
                    <?php if (isset($booking) && $booking['user_id'] == $user['id']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($user['nama']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label class="block">Lapangan:</label>
        <select name="field_id" required class="border p-2 w-full">
            <option value="">-- Pilih Lapangan --</option>
            <?php foreach ($fields as $field): ?>
                <option value="<?php echo $field['id']; ?>"
                    <?php if (isset($booking) && $booking['field_id'] == $field['id']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($field['nama_lapangan']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label class="block">Tanggal Booking:</label>
        <input type="date" name="tanggal" value="<?php echo isset($booking) ? $booking['tanggal'] : ''; ?>" class="border p-2 w-full" required>
    </div>

    <div>
        <label class="block">Jam Mulai:</label>
        <input type="time" name="jam_mulai" value="<?php echo isset($booking) ? $booking['jam_mulai'] : ''; ?>" class="border p-2 w-full" required>
    </div>

    <div>
        <label class="block">Jam Selesai:</label>
        <input type="time" name="jam_selesai" value="<?php echo isset($booking) ? $booking['jam_selesai'] : ''; ?>" class="border p-2 w-full" required>
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
</form>

<?php
require_once 'views/template/footer.php';
?>
