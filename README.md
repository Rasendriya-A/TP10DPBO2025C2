# Tugas Praktikum 10

## Janji
Saya Rasendriya Andhika dengan NIM 2305309 mengerjakan Tugas Praktikum 10 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Sistem Booking Lapangan Olahraga (MVVM)
Aplikasi berbasis web yang dikembangkan menggunakan PHP dan menerapkan arsitektur Model-View-ViewModel (MVVM). Sistem ini digunakan untuk mengelola pemesanan lapangan olahraga oleh pengguna. Fitur utama meliputi: penambahan, pengubahan, penghapusan, dan penampilan daftar pengguna, lapangan, serta pemesanan (booking).

## Desain Program
### 1. models/User.php, Field.php, Booking.php (Model)
Class model bertanggung jawab atas interaksi langsung dengan database. Tugasnya meliputi:
- Membuka koneksi database
- Mengeksekusi query SQL (SELECT, INSERT, UPDATE, DELETE)

</br> Contoh method yang tersedia:
- getAll(): Mengambil semua data dari tabel
- getById($id): Mengambil data berdasarkan ID
- create(...): Menambahkan data baru
- update($id, ...): Memperbarui data
- delete($id): Menghapus data

### 2. viewmodel/UsersViewModel.php, FieldsViewModel.php, BookingsViewModel.php (ViewModel)
Class ViewModel menjembatani antara model dan view. Bertugas:
- Menginisialisasi class model
- Memanggil fungsi dari model sesuai aksi pengguna
- Mengelola alur logika, validasi, dan session message

</br>Contoh:
- addUser($nama, $kontak)
- updateField($id, $nama)
- deleteBooking($id)
- Menampilkan pesan sukses/gagal via $_SESSION['success_message'] atau $_SESSION['error_message']

### 3. views/ (Folder View)
Folder ini berisi seluruh file tampilan untuk pengguna.
</br> a. users_list.php
- Menampilkan tabel daftar pengguna
- Terdapat tombol Edit & Hapus

</br> b. users_form.php
- Form tambah/ubah pengguna

</br> c. fields_list.php dan fields_form.php
- Sama seperti users, tetapi untuk entitas lapangan

</br> d. bookings_list.php dan bookings_form.php
- Menampilkan daftar dan form untuk membuat atau mengedit booking

</br> e. template/header.php & footer.php
- Komponen UI global yang disertakan di setiap halaman

### 4. index.php (Router Utama)
- Menerima parameter entity dan action dari URL
- Memuat ViewModel dan view yang sesuai

## Penjelasan Alur
### 1. Inisialisasi Aplikasi
- Pengguna mengakses index.php
- Parameter entity menentukan entitas (users, fields, bookings)
- Parameter action menentukan aksi (list, add, edit, delete)

### 2. Menambahkan Pengguna / Lapangan / Booking
- Klik tombol "Tambah"
- Form ditampilkan (*_form.php)
- Setelah submit, ViewModel memproses dan meneruskan data ke model
- Model menyimpan ke database
- Jika berhasil: redirect ke list dan tampilkan success_message
- Jika gagal: tampilkan error_message

### 3. Mengedit Data
- Klik tombol "Edit" pada data yang diinginkan
- Form terisi data awal
- Setelah submit, ViewModel mengirim ke model untuk update
- Hasil aksi ditampilkan dengan session message

### 4. Menghapus Data
- Klik tombol "Hapus"
- ViewModel memanggil delete()
- Jika data masih digunakan oleh entitas lain (misalnya pengguna masih memiliki booking), akan muncul Integrity constraint error yang ditangani ViewModel
- Pesan kesalahan ditampilkan melalui session

### 5. Menampilkan Daftar
- Setiap halaman daftar (users_list, fields_list, bookings_list)
- ViewModel mengambil data dari model
- View menampilkan dalam tabel dan menyertakan aksi

## Dokumentasi
https://github.com/user-attachments/assets/e00ee242-681d-4ff0-9dc7-5f33ff73317d

