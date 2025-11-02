<?php

require_once dirname(__FILE__).'/../config.php';
$kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
$kurs = isset($_REQUEST['kurs']) ? $_REQUEST['kurs'] : null;












$messages = array();




















if ($kwota === null || $kwota === '') {
$messages[] = 'Proszę podać kwotę.';
}
if ($kurs === null || $kurs === '') {
$messages[] = 'Proszę podać kurs.';
}











if (empty($messages)) {
if (!is_numeric($kwota)) {
$messages[] = 'Kwota nie jest liczbą.';
}
if (!is_numeric($kurs)) {
$messages[] = 'Kurs nie jest liczbą.';
}
}














if (empty($messages)) {

$result = floatval($kwota) * floatval($kurs);
}

















include 'calc_view.php';
?>