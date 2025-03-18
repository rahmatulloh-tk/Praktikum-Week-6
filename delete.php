<?php
include_once("koneksi.php");

$id = $_GET['id']; 
$query = "DELETE FROM tb_buku WHERE id_buku = '$id'";
$hasil = mysqli_query($conn, $query);

if ($hasil) {
    echo "<script>alert('Buku berhasil dihapus!'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus buku!'); window.location='index.php';</script>";
}
?>
