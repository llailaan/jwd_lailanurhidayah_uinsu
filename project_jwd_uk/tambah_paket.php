<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Paket Wisata</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
        input[type=text], input[type=number], select {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
        }
        
        .btn_simpan{
            padding: 10px;
            border-radius: 5px;
        }
    </style>
<body>
    <h2>Tambah Paket Wisata</h2>
    <?php
    try {
        $koneksi = new PDO("mysql:host=localhost;dbname=wisatadb", "root", "");
        $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_paket = $_POST['nama_paket'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];
        
            $sql = "INSERT INTO paket (nama_paket, harga, deskripsi) VALUES (:nama_paket, :harga, :deskripsi)";
            $stmt = $koneksi->prepare($sql);
            $stmt->bindParam(':nama_paket', $nama_paket);
            $stmt->bindParam(':harga', $harga);
            $stmt->bindParam(':deskripsi', $deskripsi);

            if ($stmt->execute()) {
                echo "<script>alert('Data berhasil ditambahkan'); window.location.href='admin.php?page=daftar_paket';</script>";
            } else {
                echo "<script>alert('Data gagal ditambahkan'); window.location.href='tambah_paket.php';</script>";
            }
        }
    ?>

    <form method="POST" action="tambah_paket.php" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nama Paket</td>
                <td>:</td>
                <td><input type="text" name="nama_paket" required></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td><input type="number" step="0.01" name="harga" required></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td><textarea name="deskripsi" required></textarea></td>
            </tr>
            <tr>
                <td colspan="3"><button type="submit" class="btn_simpan">Tambah Paket</button></td>
            </tr>
        </table>
    </form>
</body>
</html>
