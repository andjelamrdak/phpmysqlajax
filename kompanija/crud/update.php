<?php

require('../../DB.php');
require('../../zaposleni/Zaposleni.php');
$db = new DB('zaposleni_kompanije');

$zaposleni = new Zaposleni();
$zaposleni->id = $_POST['id'];
$zaposleni->ime = $_POST['naziv'];
$zaposleni->prezime = $_POST['lokacija'];
$zaposleni->plata = $_POST['broj_zaposlenih'];

$query = "update kompanija set naziv='$zaposleni->ime', lokacija='$zaposleni->prezime', broj_zaposlenih='$zaposleni->plata' where id=$zaposleni->id";
$db->connection->query($query);

if ($db) {
    echo 'Kompanija je uspešno izmenjena!';
} else {
    echo 'Došlo je do greške! Kompanija nije izmenjena!';
}
