<?php

require '../../DB.php';
require '../Zaposleni.php';
$db = new DB('zaposleni_kompanije');

$id = $_POST['id'];

$query = "select * from zaposleni where id=" . $id;
$data = $db->connection->query($query);

while ($row = $data->fetch_object()) {
    $zaposleni = new Zaposleni();
    $zaposleni->id = $row->id;
    $zaposleni->ime = $row->ime;
    $zaposleni->prezime = $row->prezime;
    $zaposleni->plata = $row->plata;
    $zaposleni->kompanija_id = $row->kompanija_id;
}

echo json_encode($zaposleni);
