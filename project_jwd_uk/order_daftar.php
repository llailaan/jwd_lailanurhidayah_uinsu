<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pemesanan Paket Wisata</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }
</style>
<body>
    <div class="formDaftar">
    <h2>Daftar Pemesanan Paket Wisata</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Pemesan</th>
            <th>Nomor Telp/HP</th>
            <th>Waktu Pelaksanaan</th>
            <th>Jumlah Kamar</th>
            <th>Paket</th>
            <th>Jumlah Tagihan</th>
            <th>Aksi</th>
        </tr>
        <?php
        try {
            $koneksi = new PDO("mysql:host=localhost;dbname=wisatadb", "root", "");
            $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
        }

        $sql = "SELECT * FROM tb_order";
        $stmt = $koneksi->prepare($sql);
        $stmt->execute();
        $orders = $stmt->fetchAll();

        foreach ($orders as $order) {
            echo "<tr>";
            echo "<td>" . $order['order_id'] . "</td>";
            echo "<td>" . $order['order_nama'] . "</td>";
            echo "<td>" . $order['order_hp'] . "</td>";
            echo "<td>" . $order['order_waktu'] . "</td>";
            echo "<td>" . $order['order_kamar'] . "</td>";
            echo "<td>" . $order['order_paket'] . "</td>";
            echo "<td>" . $order['order_tagihan'] . "</td>";
            echo "<td>
                    <a href='order_edit.php?id=" . $order['order_id'] . "'>Edit</a> | 
                    <a href='order_hapus.php?id=" . $order['order_id'] . "' onclick='return confirm(\"Apakah anda yakin?\")'>Hapus</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
    </div>
</body>
</html>
