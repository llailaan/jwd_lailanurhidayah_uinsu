    <h2>Input Data Order</h2>

    <form action="order_proses.php" method="post">
    <table>
        <tr>
            <td>NAMA</td>
            <td><input type="text" name="order_nama"></td>
        </tr>
        <tr>
            <td>HP</td>
            <td><input type="text" name="order_hp"></td>
        </tr>
        <tr>
            <td>PAKET</td>
            <td><select name="order_paket">
                <option value="1">Paket 1</option>
                <option value="2">Paket 2</option>
                <option value="3">Paket 3</option>
                <option value="4">Paket 4</option>
            </select></td>
        </tr>
        <tr>
            <td>TAMBAHAN</td>
            <td><input type="text" name="order_tambahan"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="b_simpan" value="Simpan"></td>
        </tr>
    </table>
    </form>