<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukit Lawang</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
</style>
<body>
    <div class="container">
        <header>
            <div class="jumbotron">
            <span class="efek-ngetik"></span>
            </div>
        </header>

        <div class="navbar">
  <a href="admin.php?page=order_daftar">Daftar Pemesanan</a>
  <a href="admin.php?page=daftar_paket">Daftar Paket</a>
  <a href="index.php">Logout</a>

</div>

        <main>
            <?php
            if (isset($_GET['page'])){
                require $_GET['page'].".php";
            } else {
                require "order_daftar.php";
            }
            ?>


        </main>

        <footer>
            <small>Copyright &copy; 2024 - Laila Nurhidayah - Junior Web Developer</small>

        </footer>

    </div>
    <script src="js/efek.js"></script>
</body>
</html>