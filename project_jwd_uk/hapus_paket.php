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

    // Hapus data paket berdasarkan ID
    $sql = "DELETE FROM paket WHERE id = :id";
    $stmt = $koneksi->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "<script>alert('Paket berhasil dihapus'); window.location.href='daftar_paket.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus paket'); window.location.href='daftar_paket.php';</script>";
    }
} else {
    echo "ID paket tidak ditemukan.";
}
?>
