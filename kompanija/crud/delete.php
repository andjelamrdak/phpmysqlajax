<?php

require '../../DB.php';
$db = new DB('zaposleni_kompanije');

$id = $_POST['id'];

$query = "delete from kompanija where id=" . $id;

if ($db->connection->query($query)) {
    echo 'Kompanija je uspešno obrisana!';
} else {
    echo 'Došlo je do greške! Kompanija nije obrisana!';
}
