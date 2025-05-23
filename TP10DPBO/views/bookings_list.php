<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">Booking List</h2>
<a href="index.php?entity=bookings&action=add" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Booking</a>
<table class="w-full border">
    <thead>
        <tr class="bg-gray-200">
            <th class="border p-2">ID</th>
            <th class="border p-2">Lapangan</th>
            <th class="border p-2">User</th>
            <th class="border p-2">Tanggal</th>
            <th class="border p-2">Jam Mulai</th>
            <th class="border p-2">Jam Selesai</th>
            <th class="border p-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($bookingList as $booking): ?>
        <tr>
            <td class="border p-2"><?php echo htmlspecialchars($booking['id']); ?></td>
            <td class="border p-2"><?php echo htmlspecialchars($booking['nama_lapangan']); ?></td>
            <td class="border p-2"><?php echo htmlspecialchars($booking['nama_user']); ?></td>
            <td class="border p-2"><?php echo htmlspecialchars($booking['tanggal']); ?></td>
            <td class="border p-2"><?php echo htmlspecialchars($booking['jam_mulai']); ?></td>
            <td class="border p-2"><?php echo htmlspecialchars($booking['jam_selesai']); ?></td>
            <td class="border p-2">
                <a href="index.php?entity=bookings&action=edit&id=<?php echo $booking['id']; ?>" class="text-blue-600">Edit</a>
                <a href="index.php?entity=bookings&action=delete&id=<?php echo $booking['id']; ?>" class="text-red-600 ml-2" onclick="return confirm('Yakin ingin menghapus booking ini?');">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
require_once 'views/template/footer.php';
?>
