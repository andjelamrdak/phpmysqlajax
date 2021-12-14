<?php

require "../../DB.php";
$db = new DB('zaposleni_kompanije');
?>

<table class="table table-bordered mt-2">
    <thead>
        <tr class="text-center">
            <th>ID</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Plata - RSD</th>
            <th>Kompanija</th>
            <th>Operacije</th>
        </tr>
    </thead>

    <tbody>
        <?php

        $query = "select z.id, z.ime, z.prezime, z.plata, k.naziv from zaposleni z join kompanija k on z.kompanija_id=k.id order by z.id asc";
        $data = $db->connection->query($query);

        while ($row = $data->fetch_object()) :
        ?>
            <tr class="text-center">
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->ime;  ?></td>
                <td><?php echo $row->prezime;  ?></td>
                <td><?php echo $row->plata;  ?></td>
                <td><?php echo $row->naziv; ?></td>
                <td>
                    <button class="btn btn-primary" id="btn_edit" value="<?php echo $row->id; ?>">Izmeni</button>
                    <button class="btn btn-danger" id="btn_delete" value="<?php echo $row->id; ?>">Obriši</button>
                </td>
            </tr>
        <?php endwhile; ?>

    </tbody>


</table>