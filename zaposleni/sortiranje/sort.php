<?php

require "../../DB.php";
$db = new DB('zaposleni_kompanije');

$kolona = $_POST['kolona'];
$sort = $_POST['sort'];
?>


<table class="table table-bordered mt-2">
    <thead>
        <tr class="text-center">
            <th id="id" name="<?php if ($kolona == 'id' && $sort == 'asc') {
                                    echo 'desc';
                                } else {
                                    echo 'asc';
                                } ?>">ID</th>
            <th id="ime" name="<?php if ($kolona == 'ime' && $sort == 'asc') {
                                    echo 'desc';
                                } else {
                                    echo 'asc';
                                } ?>">Ime</th>
            <th id="prezime" name="<?php if ($kolona == 'prezime' && $sort == 'asc') {
                                        echo 'desc';
                                    } else {
                                        echo 'asc';
                                    } ?>">Prezime</th>
            <th id="plata" name="<?php if ($kolona == 'plata' && $sort == 'asc') {
                                        echo 'desc';
                                    } else {
                                        echo 'asc';
                                    } ?>">Plata - RSD</th>
            <th id="naziv" name="<?php if ($kolona == 'naziv' && $sort == 'asc') {
                                            echo 'desc';
                                        } else {
                                            echo 'asc';
                                        } ?>">Kompanija</th>
        </tr>
    </thead>

    <tbody>
        <?php

        $query = "select z.id, z.ime, z.prezime, z.plata, k.naziv from zaposleni z join kompanija k on z.kompanija_id=k.id
         order by " . $kolona . " " . $sort . "";

        $data = $db->connection->query($query);

        while ($row = $data->fetch_object()) :
        ?>
            <tr class=" text-center">
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->ime;  ?></td>
                <td><?php echo $row->prezime;  ?></td>
                <td><?php echo $row->plata;  ?></td>
                <td><?php echo $row->naziv; ?></td>

            </tr>
        <?php endwhile; ?>

    </tbody>


</table>