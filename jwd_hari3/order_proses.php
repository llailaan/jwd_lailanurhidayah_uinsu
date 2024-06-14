<?php

//panggil koneksi ke database
require_once "koneksi.php";

if (isset($_POST['b_simpan'])){

    $order_nama = $_POST['order_nama'];
    $order_hp = $_POST['order_hp'];
    $order_paket = $_POST['order_paket'];
    $order_tambahan = $_POST['order_tambahan'];

    //sql untuk input data di database
    $sql = "INSERT INTO tb_order SET
    order_nama=:order_nama, order_hp=:order_hp, 
    order_paket=:order_paket=:order_paket, order_tambahan=:order_tambahan";

    $stmt = $koneksi->prepare($sql);

    $stmt->bindParam(":order_nama", $order_nama);
    $stmt->bindParam(":order_hp", $order_hp);
    $stmt->bindParam(":order_paket", $order_paket);
    $stmt->bindParam(":order_tambahan", $order_tambahan);

    $stmt->execute();

    //redirect ke tampil
    header("location:order_tampil.php");

}