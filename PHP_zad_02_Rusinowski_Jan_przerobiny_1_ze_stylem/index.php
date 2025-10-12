<?php
require_once 'funkcje.php';

$wynik = null;
$blad = null;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kwota = (float)$_POST["kwota"];
    $kurs  = (float)$_POST["kurs"];

    if ($kurs <= 0) {
        $blad = "Kurs musi być większy od zera!";
    } else {
        $wynik = przeliczWalute($kwota, $kurs);
    }
}


include 'widok.php';
?>
