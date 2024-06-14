<?php
try {
    $koneksi = new PDO("mysql:host=localhost;dbname=wisatadb", "root", "");
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

$sql = "SELECT * FROM tb_order ORDER BY order_id DESC LIMIT 1";
$stmt = $koneksi->prepare($sql);
$stmt->execute();
$order = $stmt->fetch(PDO::FETCH_ASSOC);

if ($order) {
    $order_nama = $order['order_nama'];
    $order_hp = $order['order_hp'];
    $order_waktu = $order['order_waktu'];
    $order_kamar = (int)$order['order_kamar'];
    $order_paket = $order['order_paket'];
    $order_tagihan = (float)$order['order_tagihan'];

    switch ($order_paket) {
        case 'Paket 1':
            $paket_harga = 500000;
            break;
        case 'Paket 2':
            $paket_harga = 1000000;
            break;
        case 'Paket 3':
            $paket_harga = 1500000;
            break;
        case 'Paket 4':
            $paket_harga = 2000000;
            break;
        default:
            $paket_harga = 0;
            break;
    }
} else {
    echo "No recent order found.";
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rangkuman Reservasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #ffefd5;
            padding: 20px;
            border-radius: 5px;
            width: 50%;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #ffa07a;
            padding: 10px;
            text-align: center;
            font-weight: bold;
        }
        .content {
            margin: 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .actions {
            text-align: center;
            margin-top: 20px;
        }
        .actions button {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .yes {
            background-color: #8fbc8f;
            color: white;
        }
        .no {
            background-color: #f08080;
            color: white;
        }
    </style>
    <script>
        function handleNoClick() {
            alert('Terimakasih sudah melakukan pemesanan kamar di Bukit Lawang.');
            window.location.href = 'index.php';
        }
        function handleYesClick() {
            window.location.href = 'order_form.php';
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="header">RANGKUMAN PEMESANAN</div>
        <div class="content">
            <table>
                <tr>
                    <th>Nama</th>
                    <td><?php echo htmlspecialchars($order_nama); ?></td>
                </tr>
                <tr>
                    <th>Nomer Telp/HP</th>
                    <td><?php echo htmlspecialchars($order_hp); ?></td>
                </tr>
                <tr>
                    <th>Waktu Pelaksanaan</th>
                    <td><?php echo htmlspecialchars($order_waktu); ?></td>
                </tr>
                <tr>
                    <th>Kamar</th>
                    <td><?php echo htmlspecialchars($order_kamar); ?></td>
                </tr>
                <tr>
                    <th>Harga Paket</th>
                    <td>Rp <?php echo number_format($paket_harga, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <th>Jumlah Tagihan</th>
                    <td>Rp <?php echo number_format($order_tagihan, 0, ',', '.'); ?></td>
                </tr>
            </table>
        </div>
        <div class="actions">
            <button class="yes" onclick="handleYesClick()">Ya</button>
            <button class="no" onclick="handleNoClick()">Tidak</button>
        </div>
    </div>
</body>
</html>
