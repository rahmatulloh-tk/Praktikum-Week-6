<?php 
include_once("koneksi.php");
$query = "SELECT * FROM tb_buku";
$hasil = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Koleksi Buku</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="alert alert-success text-center" role="alert">
        <h2>DATA KOLEKSI BUKU PERPUSTAKAAN</h2>
    </div>
    <a href="tambahbuku.php" class="btn btn-primary mb-1 mt-1">Tambah Buku</a>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID Buku</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Pengarang</th>
                <th scope="col">Tahun Terbit</th>
                <th scope="col">Kategori</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($data = mysqli_fetch_array($hasil)) { ?>
                <tr>
                    <td><?php echo $data['id_buku']; ?></td>
                    <td><?php echo $data['judul_buku']; ?></td>
                    <td><?php echo $data['pengarang']; ?></td>
                    <td><?php echo $data['tahun_terbit']; ?></td>
                    <td><?php echo $data['kategori']; ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $data['id_buku']; ?>" class="btn btn-warning">Update</a>
                        <button class="btn btn-danger" onclick="confirmDelete(<?php echo $data['id_buku']; ?>)">Delete</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    
    <script>
        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus buku ini?')) {
                window.location.href = 'delete.php?id=' + id;
            }
        }
    </script>
</body>
</html>
