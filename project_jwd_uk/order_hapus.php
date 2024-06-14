<?php
try {
    $koneksi = new PDO("mysql:host=localhost;dbname=wisatadb", "root", "");
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['id'])) {
        $order_id = $_GET['id'];
        $sql = "DELETE FROM tb_order WHERE order_id = :order_id";
        $stmt = $koneksi->prepare($sql);
        try {
            $stmt->execute(['order_id' => $order_id]);
            echo "<script>alert('Pesanan berhasil dihapus.');window.location.href='order_daftar.php';</script>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}
?>