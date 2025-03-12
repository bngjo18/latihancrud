<?php
include 'koneksi.php';
$query = "SELECT * FROM mahasiswa";
$result = mysqli_query($koneksi, $query);
echo "<table border='1'>
<tr>
<th>ID</th>
<th>NIM</th>
<th>Nama</th>
<th>Jurusan</th>
<th>Aksi</th>
</tr>";
while($data = mysqli_fetch_assoc($result)){
echo "<tr>
<td>".$data['id']."</td>
<td>".$data['nim']."</td>
<td>".$data['nama']."</td>
<td>".$data['jurusan']."</td>
<td><a href='update.php?id=".$data['id']."'>Edit</a> | <a
href='delete.php?id=".$data['id']."'>Hapus</a></td>
</tr>";
}
echo "</table>";
?>