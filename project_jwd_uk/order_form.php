<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Pemesanan Paket Wisata</title>
    <link rel="stylesheet" href="style.css">
    <style>
        input[type=text], input[type=date], input[type=number], select {
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
    <div class="formOrder">
        <h2>Form Pemesanan Paket Wisata</h2>
        <form method="POST" action="order_simpan.php">
            <table>
                <tr>
                    <td>Nama Pemesan</td>
                    <td><input type="text" name="order_nama" required></td>
                </tr>
                <tr>
                    <td>Nomer Telp/HP</td>
                    <td><input type="text" name="order_hp" required></td>
                </tr>
                <tr>
                    <td>Waktu Pelaksanaan</td>
                    <td><input type="date" name="order_waktu" required></td>
                </tr>
                <tr>
                    <td>Kamar</td>
                    <td><input type="number" name="order_kamar" required></td>
                </tr>
                <tr>
                    <td>Harga Paket</td>
                    <td>
                        <select name="order_paket" id="order_paket" required>
                            <?php
                            try {
                                $koneksi = new PDO("mysql:host=localhost;dbname=wisatadb", "root", "");
                                $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                // Query untuk mengambil nama_paket dan harga dari tabel paket
                                $sql = "SELECT nama_paket, harga FROM paket";
                                $stmt = $koneksi->prepare($sql);
                                $stmt->execute();
                                $pakets = $stmt->fetchAll();

                                foreach ($pakets as $paket) {
                                    echo "<option value='" . $paket['harga'] . "'>" . $paket['nama_paket'] . " - Rp " . number_format($paket['harga'], 0, ',', '.') . "</option>";
                                }

                            } catch (PDOException $e) {
                                echo "Connection failed: " . $e->getMessage();
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Jumlah Tagihan</td>
                    <td><input type="text" id="order_tagihan" readonly></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2"><button type="submit" class="btn_simpan">Simpan</button></td>
                </tr>
            </table>
        </form>
    </div>

    <script>
        // Event listener untuk menghitung tagihan berdasarkan perubahan pada form
        document.querySelector('form').addEventListener('change', function() {
            const orderPaket = document.getElementById('order_paket').value;
            const orderKamar = document.querySelector('input[name="order_kamar"]').value;
            const paketHarga = parseFloat(orderPaket.replace(/\D/g, ''));

            // Hitung tagihan berdasarkan harga paket dan jumlah kamar
            const orderTagihan = orderKamar * paketHarga;
            document.getElementById('order_tagihan').value = orderTagihan;
        });
    </script>
</body>
</html>
