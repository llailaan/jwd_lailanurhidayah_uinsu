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
  <a href="index.php">Home</a>
  <a href="index.php?page=order_form">Pemesanan</a>
    
  <div class="dropdown">
    <button class="dropbtn">Tentang Kami 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="index.php?page=paket">Paket</a>
      <a href="index.php?page=alamat">Lokasi</a>
    </div>
  </div> 
  <!--  <a href="index.php?page=order_daftar">Daftar Pemesanan</a>-->
  <a href="index.php?page=kontak">Hubungi Kami</a>
  <a href="index.php?page=login">Login</a>

</div>

        <main>
            <?php
            if (isset($_GET['page'])){
                require $_GET['page'].".php";
            } else {
                require "main.php";
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