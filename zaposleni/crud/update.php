<?php

require('../../DB.php');
require('../Zaposleni.php');
$db = new DB('zaposleni_kompanije');

$zaposleni = new Zaposleni();
$zaposleni->id = $_POST['id'];
$zaposleni->ime = $_POST['ime'];
$zaposleni->prezime = $_POST['prezime'];
$zaposleni->plata = $_POST['plata'];
$zaposleni->kompanija_id = $_POST['kompanija'];

$query = "update zaposleni set ime='$zaposleni->ime', prezime='$zaposleni->prezime', plata='$zaposleni->plata', kompanija_id='$zaposleni->kompanija_id' where id=$zaposleni->id";
$db->connection->query($query);

if ($db) {
    echo 'Zaposleni je uspešno izmenjen!';
} else {
    echo 'Došlo je do greške! Zaposleni nije izmenjen!';
}
