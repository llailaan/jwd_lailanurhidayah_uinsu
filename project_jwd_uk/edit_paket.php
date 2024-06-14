<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Paket Wisata</title>
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
        
        .btn_edit{
            padding: 10px;
            border-radius: 5px;
        }
    </style>
<body>
    <h2>Edit Paket Wisata</h2>
    <?php
    try {
        $koneksi = new PDO("mysql:host=localhost;dbname=wisatadb", "root", "");
        $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die();
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Ambil data paket berdasarkan ID
        $sql = "SELECT * FROM paket WHERE id = :id";
        $stmt = $koneksi->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $paket = $stmt->fetch();

        if (!$paket) {
            echo "Paket tidak ditemukan.";
            exit;
        }
    } else {
        echo "ID paket tidak ditemukan.";
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_paket = $_POST['nama_paket'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];

        // Update data paket
        $sql = "UPDATE paket SET nama_paket = :nama_paket, harga = :harga, deskripsi = :deskripsi WHERE id = :id";
        $stmt = $koneksi->prepare($sql);
        $stmt->bindParam(':nama_paket', $nama_paket);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':deskripsi', $deskripsi);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil diperbarui'); window.location.href='admin.php?page=daftar_paket';</script>";
        } else {
            echo "<script>alert('Data gagal diperbarui'); window.location.href='daftar_paket.php';</script>";
        }
    }
    ?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $id; ?>">
        <table>
            <tr>
                <td>Nama Paket</td>
                <td>:</td>
                <td><input type="text" name="nama_paket" value="<?php echo $paket['nama_paket']; ?>" required></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td><input type="number" step="0.01" name="harga" value="<?php echo $paket['harga']; ?>" required></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td><textarea name="deskripsi" required><?php echo $paket['deskripsi']; ?></textarea></td>
            </tr>
            <tr>
                <td colspan="3"><button type="submit" class="btn_edit">Simpan Perubahan</button></td>
            </tr>
        </table>
    </form>
</body>
</html>
