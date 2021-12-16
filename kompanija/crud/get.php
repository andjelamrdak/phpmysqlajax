<?php

require '../../DB.php';
require '../../zaposleni/Zaposleni.php';
$db = new DB('zaposleni_kompanije');

$id = $_POST['id'];

$query = "select * from kompanija where id=" . $id;
$data = $db->connection->query($query);

while ($row = $data->fetch_object()) {
    $zaposleni = new Zaposleni();
    $zaposleni->id = $row->id;
    $zaposleni->ime = $row->naziv;
    $zaposleni->prezime = $row->lokacija;
    $zaposleni->plata = $row->broj_zaposlenih;
    $zaposleni->kompanija_id = $row->id;
}

echo json_encode($zaposleni);
