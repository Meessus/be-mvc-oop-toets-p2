<form action="<?= URLROOT; ?>/countries/update" method="post">
    <table>
        <tbody>
            <tr>
                <td><input type="text" name="Name" value="<?php echo $data['row']->Name ?>"></td>
            </tr>
            <tr>
                <td><input type="text" name="capitalCity" value="<?php echo $data['row']->CapitalCity ?>"></td>
            </tr>
            <tr>
                <td>
                    <select name="Continent">
                        <option value="Europa" <?php if($data['row']->Continent == 'Europa') echo 'selected' ?>>Europa</option>
                        <option value="Azië" <?php if($data['row']->Continent == 'Azië') echo 'selected' ?>>Azië</option>
                        <option value="Noord-Amerika" <?php if($data['row']->Continent == 'Noord-Amerika') echo 'selected' ?>>Noord-Amerika</option>
                        <option value="Zuid-Amerika" <?php if($data['row']->Continent == 'Zuid-Amerika') echo 'selected' ?>>Zuid-Amerika</option>
                        <option value="Oceanië" <?php if($data['row']->Continent == 'Oceanië') echo 'selected' ?>>Oceanië</option>
                        <option value="Antartica" <?php if($data['row']->Continent == 'Antartica') echo 'selected' ?>>Antartica</option>
                        <option value="Afrika" <?php if($data['row']->Continent == 'Afrika') echo 'selected' ?>>Africa</option> 
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="number" name="Population" value="<?php echo $data['row']->Population ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="Id" value="<?php echo $data['row']->id ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Update"></td>
            </tr>
        </tbody>
    </table>
</form>