<?php
include 'koneksi.php';

// Nama mapel langsung didefinisikan di sini
$mapel = 'Bahasa Indonesia'; // Ganti sesuai mapel di halaman ini

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $guruNames = $_POST['guru']; // Array of selected guru names

    foreach ($guruNames as $guruName) {
        $query = "INSERT INTO mapel (mapel, nama_guru) VALUES ('$mapel', '$guruName')";
        mysqli_query($koneksi, $query);
    }

    header('Location: otoritas_gm_indo.php');
}
?>