<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Order</title>
</head>
<body>
    <h2>Input Data Order</h2>
    <form action="order_proses.php" method="post">
    <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="order_nama"></td>
            </tr>
            <tr>
                <td>HP</td>
                <td><input type="text" name="order_hp"></td>
            </tr>
            <tr>
                <td>Paket</td>
                <td>
                    <select name="order_paket">
                        <option value="1">Paket 1</option>
                        <option value="2">Paket 2</option>
                        <option value="3">Paket 3</option>
                        <option value="4">Paket 4</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tambahan</td>
                <td><input type="text" name="order_tambahan"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Simpan" name="b_simpan">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>