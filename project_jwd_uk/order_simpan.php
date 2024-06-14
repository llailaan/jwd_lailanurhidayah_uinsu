<?php
try {
    $koneksi = new PDO("mysql:host=localhost;dbname=wisatadb", "root", "");
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_nama = $_POST['order_nama'];
    $order_hp = $_POST['order_hp'];
    $order_waktu = $_POST['order_waktu'];
    $order_kamar = $_POST['order_kamar'];
    $order_paket = $_POST['order_paket'];
    $paket_harga = 0;

    if ($order_paket === 'Paket 1') {
        $paket_harga = 500000;
    } else if ($order_paket === 'Paket 2') {
        $paket_harga = 1000000;
    } else if ($order_paket === 'Paket 3') {
        $paket_harga = 1500000;
    } else if ($order_paket === 'Paket 4') {
        $paket_harga = 2000000;
    }

    $order_tagihan = $order_kamar * $paket_harga;

    $sql = "INSERT INTO tb_order (order_nama, order_hp, order_waktu, order_kamar, order_paket, order_tagihan) 
            VALUES (:order_nama, :order_hp, :order_waktu, :order_kamar, :order_paket, :order_tagihan)";
    $stmt = $koneksi->prepare($sql);
    $stmt->bindParam(':order_nama', $order_nama);
    $stmt->bindParam(':order_hp', $order_hp);
    $stmt->bindParam(':order_waktu', $order_waktu);
    $stmt->bindParam(':order_kamar', $order_kamar);
    $stmt->bindParam(':order_paket', $order_paket);
    $stmt->bindParam(':order_tagihan', $order_tagihan);

    if ($stmt->execute()) {
        echo "<script>alert('Data anda berhasil disimpan'); window.location.href='rangkuman.php';</script>";
    } else {
        echo "<script>alert('Data gagal disimpan'); window.location.href='order_form.php';</script>";
    }
}
?>
