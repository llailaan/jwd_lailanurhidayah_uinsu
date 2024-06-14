<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pemesanan Paket Wisata</title>
    <link rel="stylesheet" href="style.css">
    <style>
        input[type=text], input[type=number], select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }
        
        .btn_simpan {
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h2>Edit Pemesanan Paket Wisata</h2>
    <?php
    try {
        $koneksi = new PDO("mysql:host=localhost;dbname=wisatadb", "root", "");
        $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die();
    }

    if (isset($_GET['id'])) {
        $order_id = $_GET['id'];
        $sql = "SELECT * FROM tb_order WHERE order_id = :order_id";
        $stmt = $koneksi->prepare($sql);
        $stmt->bindParam(':order_id', $order_id);
        $stmt->execute();
        $order = $stmt->fetch();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $order_id = $_POST['order_id'];
        $order_nama = $_POST['order_nama'];
        $order_hp = $_POST['order_hp'];
        $order_waktu = $_POST['order_waktu'];
        $order_kamar = $_POST['order_kamar'];
        $order_paket = $_POST['order_paket'];
        $paket_harga = 0;

        // Penentuan Harga
        // Anda bisa mempertahankan logika penentuan harga seperti sebelumnya,
        // atau sesuaikan dengan struktur data yang sekarang menggunakan data dari tabel 'paket'.

        // Penghitungan Tagihan
        // Anda juga bisa mempertahankan penghitungan tagihan sesuai dengan struktur sebelumnya.

        // Edit Data
        $sql = "UPDATE tb_order SET order_nama = :order_nama, order_hp = :order_hp, order_waktu = :order_waktu, order_kamar = :order_kamar, order_paket = :order_paket, order_tagihan = :order_tagihan WHERE order_id = :order_id";
        $stmt = $koneksi->prepare($sql);
        $stmt->bindParam(':order_nama', $order_nama);
        $stmt->bindParam(':order_hp', $order_hp);
        $stmt->bindParam(':order_waktu', $order_waktu);
        $stmt->bindParam(':order_kamar', $order_kamar);
        $stmt->bindParam(':order_paket', $order_paket);
        $stmt->bindParam(':order_tagihan', $order_tagihan);
        $stmt->bindParam(':order_id', $order_id);

        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil diperbarui'); window.location.href='order_daftar.php';</script>";
        } else {
            echo "<script>alert('Data gagal diperbarui'); window.location.href='order_daftar.php';</script>";
        }
    }
    ?>

    <form method="POST" action="order_edit.php">
        <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
        <table>
            <tr>
                <td>Nama Pemesan</td>
                <td>:</td>
                <td><input type="text" name="order_nama" value="<?php echo $order['order_nama']; ?>" required></td>
            </tr>
            <tr>
                <td>Nomor Telp/HP</td>
                <td>:</td>
                <td><input type="text" name="order_hp" value="<?php echo $order['order_hp']; ?>" required></td>
            </tr>
            <tr>
                <td>Waktu Pelaksanaan</td>
                <td>:</td>
                <td><input type="date" name="order_waktu" value="<?php echo $order['order_waktu']; ?>" required></td>
            </tr>
            <tr>
                <td>Jumlah Kamar</td>
                <td>:</td>
                <td><input type="number" name="order_kamar" value="<?php echo $order['order_kamar']; ?>" required></td>
            </tr>
            <tr>
                <td>Harga Paket</td>
                <td>:</td>
                <td>
                    <select name="order_paket" required>
                        <?php
                        // Query untuk mengambil data paket dari tabel 'paket'
                        $sql_paket = "SELECT nama_paket, harga FROM paket";
                        $stmt_paket = $koneksi->prepare($sql_paket);
                        $stmt_paket->execute();
                        $pakets = $stmt_paket->fetchAll();

                        // Menampilkan opsi berdasarkan hasil query
                        foreach ($pakets as $paket) {
                            $selected = ($order['order_paket'] === $paket['nama_paket']) ? 'selected' : '';
                            echo "<option value='" . $paket['nama_paket'] . "' " . $selected . ">" . $paket['nama_paket'] . " - Rp " . number_format($paket['harga'], 0, ',', '.') . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="3"><button type="submit" class="btn_simpan">Simpan Perubahan</button></td>
            </tr>
        </table>
    </form>
</body>
</html>
