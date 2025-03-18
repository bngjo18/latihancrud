<form action="update.php" method="POST">
    Pilih Kolom yang Akan Diupdate:
    <select name="kolom">
        <option value="nama">Nama</option>
        <option value="jurusan">Jurusan</option>
        <option value="nim">NIM</option>
    </select><br>

    NIM (sebagai acuan): <input type="text" name="nim"><br>
    Nilai Baru: <input type="text" name="nilai_baru"><br>
    <input type="submit" name="submit" value="Update Data">
</form>

<?php
include 'koneksi.php';

if(isset($_POST['submit'])){
    // Pastikan key 'kolom', 'nim', dan 'nilai_baru' ada di $_POST
    if(isset($_POST['kolom']) && isset($_POST['nim']) && isset($_POST['nilai_baru'])){
        $kolom = $_POST['kolom']; // Kolom yang akan diupdate (nama, jurusan, atau nim)
        $nim = $_POST['nim']; // NIM sebagai acuan
        $nilai_baru = $_POST['nilai_baru']; // Nilai baru untuk kolom yang dipilih

        // Validasi input
        if(empty($nim) || empty($nilai_baru)){
            die("NIM dan Nilai Baru harus diisi!");
        }

        // Query dinamis berdasarkan kolom yang dipilih
        if($kolom == 'nim'){
            // Jika kolom yang diupdate adalah 'nim', pastikan 'nim' baru tidak bertabrakan
            $query = "UPDATE mahasiswa SET nim = ? WHERE nim = ?";
            $stmt = mysqli_prepare($koneksi, $query);
            mysqli_stmt_bind_param($stmt, 'ss', $nilai_baru, $nim);
        } else {
            // Jika kolom yang diupdate adalah 'nama' atau 'jurusan'
            $query = "UPDATE mahasiswa SET $kolom = ? WHERE nim = ?";
            $stmt = mysqli_prepare($koneksi, $query);
            mysqli_stmt_bind_param($stmt, 'ss', $nilai_baru, $nim);
        }

        if($stmt){
            // Eksekusi query
            if(mysqli_stmt_execute($stmt)){
                echo "Data berhasil diupdate.";
            } else {
                echo "Gagal mengupdate data: " . mysqli_stmt_error($stmt); // Debug error statement
            }

            // Tutup statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Error dalam menyiapkan query: " . mysqli_error($koneksi); // Debug error koneksi
        }
    } else {
        echo "Semua field harus diisi!";
    }
}

mysqli_close($koneksi);
?>