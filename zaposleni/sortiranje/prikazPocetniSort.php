<?php

require "../../DB.php";
$db = new DB('zaposleni_kompanije');
?>

<table class="table table-bordered mt-2">
    <thead>
        <tr class="text-center">
            <th id="id" name="asc">ID</th>
            <th id="ime" name="asc">Ime</th>
            <th id="prezime" name="asc">Prezime</th>
            <th id="plata" name="asc">Plata - RSD</th>
            <th id="naziv" name="asc">Kompanija</th>
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
            </tr>
        <?php endwhile; ?>

    </tbody>


</table>