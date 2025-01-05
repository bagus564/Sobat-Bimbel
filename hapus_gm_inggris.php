<?php
include 'koneksi.php';
$nama_guru = $_GET['id'];
$result = mysqli_query($koneksi, "DELETE FROM pelajaran WHERE nama_guru='$nama_guru' AND mata_pelajaran='Bahasa Inggris'");
header("Location:otoritas_gm_inggris.php");
?>