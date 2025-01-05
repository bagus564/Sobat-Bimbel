<?php
include 'koneksi.php';

// Ambil data dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$tempat = $_POST['tempat'];
$ttl = $_POST['ttl'];
$jk = $_POST['jk'];
$sekolah = $_POST['sekolah'];
$email = $_POST['email'];

// Hash password
$password = password_hash('123456', PASSWORD_DEFAULT);
$role = 'siswa';

// Simpan data ke tabel siswa
$inputSiswa = mysqli_query($koneksi, "INSERT INTO siswa (id, nama, tempat, ttl, jk, sekolah, email) VALUES('$id', '$nama', '$tempat', '$ttl', '$jk', '$sekolah', '$email')");

if($inputSiswa){
    // Simpan data ke tabel user
    $inputUser = mysqli_query($koneksi, "INSERT INTO user (id, username, password, role) VALUES('$id', '$nama', '$password', '$role')");
    
    if($inputUser){
        echo "<script>
                alert('Data Berhasil Disimpan');
                window.location.href = 'data_siswa.php';
              </script>";
    } else {
        // Hapus data siswa jika gagal menambahkan ke tabel user
        mysqli_query($koneksi, "DELETE FROM siswa WHERE id = '$id'");
        echo "<script>
                alert('Gagal Menyimpan Data ke Tabel User');
                window.location.href = 'data_siswa.php';
              </script>";
    }
} else {
    echo "<script>
            alert('Gagal Menyimpan Data');
            window.location.href = 'data_siswa.php';
          </script>";
}
?>
