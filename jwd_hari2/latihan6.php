<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Cerdas</title>
</head>
<body>
    <h2>Kalkulator Cerdas</h2>

    <form action="" method="post">
        <table>
            <tr>
                <td>Angka 1</td>
                <td><input type="text" name="a1" id=""></td>
            </tr>
            <tr>
                <td>Angka 2</td>
                <td><input type="text" name="a2" id=""></td>
            </tr>
            <tr>
                <td></td>
                <td>
                <input type="submit" value="Jumlahkan" id="" name="proses">
                </td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['proses'])){
        $a1 = $_POST['a1'];
        $a2 = $_POST['a2'];

        $jumlah = $a1 + $a2;

        echo $jumlah;
    }
    ?>
</body>
</html>