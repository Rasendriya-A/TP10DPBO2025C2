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

<h2 class="text-xl mb-4">Daftar Pengguna</h2>
<a href="index.php?entity=users&action=add" class="bg-green-600 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Pengguna</a>

<table class="w-full border">
    <thead>
        <tr class="bg-gray-200">
            <th class="border p-2">Nama</th>
            <th class="border p-2">Kontak</th>
            <th class="border p-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($userList as $user): ?>
        <tr>
            <td class="border p-2"><?php echo htmlspecialchars($user['nama']); ?></td>
            <td class="border p-2"><?php echo htmlspecialchars($user['kontak']); ?></td>
            <td class="border p-2">
                <a href="index.php?entity=users&action=edit&id=<?php echo $user['id']; ?>" class="text-blue-600">Edit</a>
                <a href="index.php?entity=users&action=delete&id=<?php echo $user['id']; ?>" class="text-red-600 ml-2" onclick="return confirm('Yakin ingin menghapus pengguna ini?');">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
require_once 'views/template/footer.php';
?>
