<form action="delete.php" method="POST">
NIM: <input type="text" name="nim"><br>
Nama: <input type="text" name="nama"><br>
Jurusan: <input type="text" name="jurusan"><br>
<input type="submit" name="submit" value="Hapus Data">
</form>
<?php
include 'koneksi.php';
if(isset($_POST['submit'])){
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$query = "DELETE FROM mahasiswa WHERE nim = ?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, 's', $nim);
if(mysqli_stmt_execute($stmt)){
    echo "Data berhasil dihapus.";
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}

mysqli_stmt_close($stmt);
}
?>