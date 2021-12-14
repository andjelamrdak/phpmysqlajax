<?php

require "../../DB.php";
$db = new DB('zaposleni_kompanije');
?>

<table class="table table-bordered">
    <thead>
        <tr class="text-center">
            <th>ID</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Plata - RSD</th>
            <th>Kompanija</th>
        </tr>
    </thead>

    <tbody>
        <?php

        $kljuc = $_POST['key'];

        $query = "select z.id, z.ime, z.prezime, z.plata, k.naziv from zaposleni z join kompanija k on z.kompanija_id=k.id where
         z.id like '%" . $kljuc . "%' or z.ime like '%" . $kljuc . "%' or z.prezime like '%" . $kljuc . "%' or z.plata like '%" . $kljuc . "%' or k.naziv like '%" . $kljuc . "%'";
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