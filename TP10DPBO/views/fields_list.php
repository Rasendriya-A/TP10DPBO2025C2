<?php
require_once 'views/template/header.php';
?>

<?php if (isset($_SESSION['error_message'])): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
        <?php
            echo $_SESSION['error_message'];
            unset($_SESSION['error_message']);
        ?>
    </div>
<?php endif; ?>

<h2 class="text-xl mb-4">Lapangan List</h2>
<a href="index.php?entity=fields&action=add" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Lapangan</a>
<table class="w-full border">
    <tr class="bg-gray-200">
        <th class="border p-2">Nama Lapangan</th>
        <th class="border p-2">Jenis</th>
        <th class="border p-2">Harga per Jam</th>
        <th class="border p-2">Aksi</th>
    </tr>
    <?php foreach ($fieldList as $field): ?>
    <tr>
        <td class="border p-2"><?php echo htmlspecialchars($field['nama_lapangan']); ?></td>
        <td class="border p-2"><?php echo htmlspecialchars($field['jenis']); ?></td>
        <td class="border p-2">Rp <?php echo number_format($field['harga_per_jam'], 0, ',', '.'); ?></td>
        <td class="border p-2">
            <a href="index.php?entity=fields&action=edit&id=<?php echo $field['id']; ?>" class="text-blue-500">Edit</a>
            <a href="index.php?entity=fields&action=delete&id=<?php echo $field['id']; ?>" class="text-red-500 ml-2" onclick="return confirm('Yakin ingin menghapus lapangan ini?');">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>
