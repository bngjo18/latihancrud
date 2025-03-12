<form action="create.php" method="POST">
NIM: <input type="text" name="nim"><br>
Nama: <input type="text" name="nama"><br>
Jurusan: <input type="text" name="jurusan"><br>
<input type="submit" name="submit" value="Tambah Data">
</form>
<?php
include 'koneksi.php';
if(isset($_POST['submit'])){
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$query = "INSERT INTO mahasiswa (nim, nama, jurusan) VALUES ('$nim',
'$nama', '$jurusan')";
mysqli_query($koneksi, $query);
echo "Data berhasil ditambahkan.";
}
?>