<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Paket Wisata</title>
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
    <h2>Daftar Paket Wisata</h2>
    <table border="1">
    <a href='tambah_paket.php?id=" . $paket['id'] . "'>Tambah</a>
        <tr>
            <th>ID</th>
            <th>Nama Paket</th>
            <th>Harga</th>
            <th>Deskripsi</th>
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

        $sql = "SELECT * FROM paket";
        $stmt = $koneksi->prepare($sql);
        $stmt->execute();
        $pakets = $stmt->fetchAll();

        foreach ($pakets as $paket) {
            echo "<tr>";
            echo "<td>" . $paket['id'] . "</td>";
            echo "<td>" . $paket['nama_paket'] . "</td>";
            echo "<td>" . $paket['harga'] . "</td>";
            echo "<td>" . $paket['deskripsi'] . "</td>";
            echo "<td>
                    <a href='edit_paket.php?id=" . $paket['id'] . "'>Edit</a> |
                    <a href='hapus_paket.php?id=" . $paket['id'] . "' onclick='return confirm(\"Apakah anda yakin?\")'>Hapus</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
    </div>
</body>
</html>
