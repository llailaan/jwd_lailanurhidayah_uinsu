<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data Order</title>
</head>
<body>
    <h2>Tampil Data Order</h2>

    <?php
    require_once "koneksi.php";

    $sql = "SELECT * FROM tb_order";
    $stmt = $koneksi->prepare($sql);
    $stmt->execute();

    // jadikan dalam variabel array
    $rows = $stmt->fetchAll();
    ?>

    <table>
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>HP</td>
            <td>Paket</td>
            <td>Tambahan</td>
        </tr>
    </table>

    <?php foreach ($rows as $r){?>
        <tr>
            <td><?php echo $r['order_id'];?></td>
            <td><?php echo $r['order_nama'];?></td>
            <td><?php echo $r['order_hp'];?></td>
            <td><?php echo $r['order_paket'];?></td>
            <td><?php echo $r['order_tambahan'];?></td>
        </tr>
    

    <?php } ?>
</body>
</html>