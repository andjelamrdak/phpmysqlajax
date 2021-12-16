<?php

require "../../DB.php";
$db = new DB('zaposleni_kompanije');
?>

<table class="table table-bordered mt-2">
    <thead>
        <tr class="text-center">
            <th>ID</th>
            <th>Naziv</th>
            <th>Lokacija</th>
            <th>Broj zaposlenih</th>
            <th>Operacije</th>
        </tr>
    </thead>

    <tbody>
        <?php

        $query = "select * from kompanija";
        $data = $db->connection->query($query);

        while ($row = $data->fetch_object()) :
        ?>
            <tr class="text-center">
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->naziv;  ?></td>
                <td><?php echo $row->lokacija;  ?></td>
                <td><?php echo $row->broj_zaposlenih;  ?></td>
                <td>
                    <button class="btn btn-primary" id="btn_edit" value="<?php echo $row->id; ?>">Izmeni</button>
                    <button class="btn btn-danger" id="btn_delete" value="<?php echo $row->id; ?>">Obriši</button>
                </td>
            </tr>
        <?php endwhile; ?>

    </tbody>


</table>