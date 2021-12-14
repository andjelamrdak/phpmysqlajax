<?php

require '../../DB.php';
require '../Zaposleni.php';
$db = new DB('zaposleni_kompanije');

$zaposleni = new Zaposleni();
$zaposleni->ime = $_POST['ime'];
$zaposleni->prezime = $_POST['prezime'];
$zaposleni->plata = $_POST['plata'];
$zaposleni->kompanija_id = $_POST['kompanija'];

$query = "insert into zaposleni (ime, prezime, plata, kompanija_id) 
    values ('$zaposleni->ime', '$zaposleni->prezime', '$zaposleni->plata', '$zaposleni->kompanija_id')";

if ($db->connection->query($query)) {
    echo "Zaposleni je uspešno sačuvan!";
} else {
    echo "Došlo je do greške! Zaposleni nije sačuvan!";
}
