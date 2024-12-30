<?php 
include 'koneksi.php';

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "add") {
        $nisn = $_POST['nisn'];
        $nama_siswa = $_POST['nama_siswa']; 
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $foto = "img5.jpg"; // Anda mungkin ingin menambahkan logika untuk mengupload foto
        $alamat = $_POST['alamat'];

        // Debug: Tampilkan data yang diterima
        print_r($_POST); // Ini akan mencetak isi dari array POST

        // Menggunakan prepared statements untuk keamanan
        $stmt = $conn->prepare("INSERT INTO tb_siswa (nisn, nama_siswa, jenis_kelamin, foto, alamat) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nisn, $nama_siswa, $jenis_kelamin, $foto, $alamat);

        if ($stmt->execute()) {
            echo "Data Berhasil Ditambahkan <a href='index.php'>[Home]</a>";
        } else {
            echo "Error: " . $stmt->error; // Ini akan menunjukkan kesalahan SQL
        }

        $stmt->close();
    } else if ($_POST['aksi'] == "edit") {
        echo "Edit Data <a href='index.php'>[Home]</a>";
    }
}

if (isset($_GET['hapus'])) {
    echo "Hapus Data <a href='index.php'>[Home]</a>";
}
?>