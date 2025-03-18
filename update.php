<?php
include_once("koneksi.php");

// Cek apakah ada ID di URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Ambil data berdasarkan ID Buku
    $query = "SELECT * FROM tb_buku WHERE id_buku = '$id'";
    $hasil = mysqli_query($conn, $query);

    // Pastikan data ditemukan
    if ($hasil && mysqli_num_rows($hasil) > 0) {
        $data = mysqli_fetch_assoc($hasil);
    } else {
        echo "<script>alert('Data tidak ditemukan!'); window.location.href='index.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('ID Buku tidak ditemukan!'); window.location.href='index.php';</script>";
    exit();
}

// Jika tombol update ditekan
if (isset($_POST['update'])) {
    $judul = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $tahun = $_POST['tahun_terbit'];
    $kategori = $_POST['kategori'];

    // Query update
    $query = "UPDATE tb_buku SET 
                judul_buku = '$judul',
                pengarang = '$pengarang',
                tahun_terbit = '$tahun',
                kategori = '$kategori' 
              WHERE id_buku = '$id'";

    $hasil = mysqli_query($conn, $query);

    if ($hasil) {
        echo "<script>
                alert('Data berhasil diupdate!');
                window.location.href='index.php';
              </script>";
        exit();
    } else {
        echo "<script>
                alert('Gagal update data!');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Update Buku</title>
    <link rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center">Update Data Buku</h2>
        <form method="POST">
            <div class="form-group">
                <label>ID Buku</label>
                <input type="text" class="form-control" name="id_buku" value="<?php echo htmlspecialchars($data['id_buku']); ?>" readonly>
            </div>
            <div class="form-group">
                <label>Judul Buku</label>
                <input type="text" class="form-control" name="judul_buku" value="<?php echo htmlspecialchars($data['judul_buku']); ?>" required>
            </div>
            <div class="form-group">
                <label>Pengarang</label>
                <input type="text" class="form-control" name="pengarang" value="<?php echo htmlspecialchars($data['pengarang']); ?>" required>
            </div>
            <div class="form-group">
                <label>Tahun Terbit</label>
                <input type="number" class="form-control" name="tahun_terbit" value="<?php echo htmlspecialchars($data['tahun_terbit']); ?>" required>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <input type="text" class="form-control" name="kategori" value="<?php echo htmlspecialchars($data['kategori']); ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
