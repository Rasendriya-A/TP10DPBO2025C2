<?php
require_once 'viewmodel/FieldsViewModel.php';
require_once 'viewmodel/UsersViewModel.php';
require_once 'viewmodel/BookingsViewModel.php';

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'fields';  // Default ke fields
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($entity == 'fields') {
    $viewModel = new FieldsViewModel();

    if ($action == 'list') {
        $fieldList = $viewModel->getFieldList();
        require_once 'views/fields_list.php';

    } elseif ($action == 'add') {
        require_once 'views/fields_form.php';

    } elseif ($action == 'edit') {
        $field = $viewModel->getFieldById($_GET['id']);
        require_once 'views/fields_form.php';

    } elseif ($action == 'save') {
        $viewModel->addField($_POST['nama_lapangan'], $_POST['jenis'], $_POST['harga_per_jam']);
        header('Location: index.php?entity=fields');
        exit;

    } elseif ($action == 'update') {
        $viewModel->updateField($_GET['id'], $_POST['nama_lapangan'], $_POST['jenis'], $_POST['harga_per_jam']);
        header('Location: index.php?entity=fields');
        exit;

    } elseif ($action == 'delete') {
        $viewModel->deleteField($_GET['id']);
        header('Location: index.php?entity=fields');
        exit;
    }

} elseif ($entity == 'users') {
    $viewModel = new UsersViewModel();

    if ($action == 'list') {
        $userList = $viewModel->getUserList();
        require_once 'views/users_list.php';

    } elseif ($action == 'add') {
        require_once 'views/users_form.php';

    } elseif ($action == 'edit') {
        $user = $viewModel->getUserById($_GET['id']);
        require_once 'views/users_form.php';

    } elseif ($action == 'save') {
        $viewModel->addUser($_POST['nama'], $_POST['kontak']);
        header('Location: index.php?entity=users');
        exit;

    } elseif ($action == 'update') {
        $viewModel->updateUser($_GET['id'], $_POST['nama'], $_POST['kontak']);
        header('Location: index.php?entity=users');
        exit;

    } elseif ($action == 'delete') {
        $viewModel->deleteUser($_GET['id']);
        header('Location: index.php?entity=users');
        exit;
    }

} elseif ($entity == 'bookings') {
    $viewModel = new BookingsViewModel();
    $fieldsViewModel = new FieldsViewModel(); // Untuk daftar lapangan di form
    $usersViewModel = new UsersViewModel();   // Untuk daftar user di form

    if ($action == 'list') {
        $bookingList = $viewModel->getBookingList();
        require_once 'views/bookings_list.php';

    } elseif ($action == 'add') {
        $fields = $fieldsViewModel->getFieldList();
        $users = $usersViewModel->getUserList();
        require_once 'views/bookings_form.php';

    } elseif ($action == 'edit') {
        $booking = $viewModel->getBookingById($_GET['id']);
        $fields = $fieldsViewModel->getFieldList();
        $users = $usersViewModel->getUserList();
        require_once 'views/bookings_form.php';

    } elseif ($action == 'save') {
        $viewModel->addBooking($_POST['field_id'], $_POST['user_id'], $_POST['tanggal'], $_POST['jam_mulai'], $_POST['jam_selesai']);
        header('Location: index.php?entity=bookings');
        exit;

    } elseif ($action == 'update') {
        $viewModel->updateBooking($_GET['id'], $_POST['field_id'], $_POST['user_id'], $_POST['tanggal'], $_POST['jam_mulai'], $_POST['jam_selesai']);
        header('Location: index.php?entity=bookings');
        exit;

    } elseif ($action == 'delete') {
        $viewModel->deleteBooking($_GET['id']);
        header('Location: index.php?entity=bookings');
        exit;
    }
} else {
    // Default redirect kalau entity tidak dikenali
    header('Location: index.php?entity=fields');
    exit;
}
?>
