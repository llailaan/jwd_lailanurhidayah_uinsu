    <h2>Tampil Data Order</h2>

    <a href="order_input.php"></a>

    <?php
    require_once "koneksi.php";

    $sql = "SELECT * FROM tb_order";
    $stmt = $koneksi->prepare($sql);
    $stmt->execute();

    // jadikan dalam variabel array
    $rows = $stmt->fetchAll();
    ?>

    <table border="1S">
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>HP</td>
            <td>Paket</td>
            <td>Tambahan</td>
        </tr>
    

    <?php foreach ($rows as $r){?>
        <tr>
            <td><?php echo $r['order_id'];?></td>
            <td><?php echo $r['order_nama'];?></td>
            <td><?php echo $r['order_hp'];?></td>
            <td><?php echo $r['order_paket'];?></td>
            <td><?php echo $r['order_tambahan'];?></td>
        </tr>
    

    <?php } ?>
    
    </table>