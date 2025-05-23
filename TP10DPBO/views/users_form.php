<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($user) ? 'Edit Pengguna' : 'Tambah Pengguna'; ?></h2>
<form action="index.php?entity=users&action=<?php echo isset($user) ? 'update&id=' . $user['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Nama Lengkap:</label>
        <input type="text" name="nama" value="<?php echo isset($user) ? htmlspecialchars($user['nama']) : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Kontak (No. HP atau Email):</label>
        <input type="text" name="kontak" value="<?php echo isset($user) ? htmlspecialchars($user['kontak']) : ''; ?>" class="border p-2 w-full" required>
    </div>
    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
</form>

<?php
require_once 'views/template/footer.php';
?>
