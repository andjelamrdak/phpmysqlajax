<?php

require '../../DB.php';
$db = new DB('zaposleni_kompanije');

$id = $_POST['id'];

$query = "delete from zaposleni where id=" . $id;

if ($db->connection->query($query)) {
    echo 'Zaposleni je uspešno obrisan!';
} else {
    echo 'Došlo je do greške! Zaposleni nije obrisan!';
}
