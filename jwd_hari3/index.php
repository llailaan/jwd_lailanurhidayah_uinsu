<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Desa Wisata</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="jumbotron">
            <span class="efek-ngetik"></span>
            </div>
        </header>

        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php?page=order_input">Pemesanan</a></li>
                <li><a href="index.php?page=order_tampil">Daftar Pesanan</a></li>
                <li><a href="index.php?page=kontak">Kontak</a></li>
                <li><a href="index.php?page=about">About</a></li>
            </ul>
        </nav>

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