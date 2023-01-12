<h3><?= $data['title']; ?></h3>

<form action="<?= URLROOT; ?>/countries/create" method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    <label for="text">Land:</label>
                    <input type="text" name="Name">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="text">Hoofdstad:</label>
                    <input type="text" name="capitalCity">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="text">Continent:</label>
                    <select name="Continent">
                        <option value="Europa">Europa</option>
                        <option value="Azië">Azië</option>
                        <option value="Noord-Amerika">Noord-Amerika</option>
                        <option value="Zuid-Amerika">Zuid-Amerika</option>
                        <option value="Oceanië">Oceanië</option>
                        <option value="Antartica">Antartica</option>
                        <option value="Afrika">Africa</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="text">Bevolking:</label>
                    <input type="number" name="Population">
                </td>
            </tr>
            <tr>
                <td><input type="submit"></td>
            </tr>
        </tbody>
    </table>
</form>