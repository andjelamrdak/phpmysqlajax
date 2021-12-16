<?php
require '../../DB.php';

$db = new DB('zaposleni_kompanije');

$naziv = $_POST['naziv'];
$lokacija = $_POST['lokacija'];
$brojzaposlenih = $_POST['brojzaposlenih'];

$query = "insert into kompanija (naziv, lokacija, broj_zaposlenih)
values ('$naziv', '$lokacija', '$brojzaposlenih')";

if ($db->connection->query($query)) {
    echo "Kompanija je uspešno sačuvana!";
} else {
    echo "Došlo je do greške! Kompanija nije sačuvana!";
}
