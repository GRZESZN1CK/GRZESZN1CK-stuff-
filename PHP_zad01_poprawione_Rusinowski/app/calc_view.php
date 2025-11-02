<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
<title>Przeliczanie walut</title>
</head>
<body>


<h2>Przeliczanie walut </h2>
















<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
<label for="id_kwota">Kwota:</label>
<input id="id_kwota" type="text" name="kwota" value="<?php echo isset($kwota) ? htmlspecialchars($kwota) : ''; ?>" /><br />


<label for="id_kurs">Kurs:</label>
<input id="id_kurs" type="text" name="kurs" value="<?php echo isset($kurs) ? htmlspecialchars($kurs) : ''; ?>" /><br />


<input type="submit" value="Przelicz" />
</form>


<?php














if (isset($messages) && count($messages) > 0) {
echo '<h3>Wystąpiły błędy:</h3>';
echo '<ol>';
foreach ($messages as $msg) {
echo '<li>'.htmlspecialchars($msg).'</li>';
}
echo '</ol>';
}
?>


<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Wynik (przeliczona kwota): '
.htmlspecialchars(number_format($result, 2, ',', ' ')).
' (jednostki)';
 ?>
</div>
<?php } ?>


</body>
</html>