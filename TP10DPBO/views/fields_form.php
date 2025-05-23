<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($field) ? 'Edit Lapangan' : 'Tambah Lapangan'; ?></h2>
<form action="index.php?entity=fields&action=<?php echo isset($field) ? 'update&id=' . $field['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Nama Lapangan:</label>
        <input type="text" name="nama_lapangan" value="<?php echo isset($field) ? htmlspecialchars($field['nama_lapangan']) : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Jenis:</label>
        <input type="text" name="jenis" value="<?php echo isset($field) ? htmlspecialchars($field['jenis']) : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Harga per Jam (Rp):</label>
        <input type="number" name="harga_per_jam" value="<?php echo isset($field) ? (int)$field['harga_per_jam'] : ''; ?>" class="border p-2 w-full" min="0" required>
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
</form>

<?php
require_once 'views/template/footer.php';
?>
