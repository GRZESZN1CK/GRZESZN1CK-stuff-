<?php







function przeliczWalute($kwota, $kurs) {
    return $kwota * $kurs;
}

$wynik = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kwota = (float)$_POST["kwota"];
    $kurs  = (float)$_POST["kurs"];
    $wynik = przeliczWalute($kwota, $kurs);
}
?>















<!DOCTYPE html>



<head>
    
    <title>PRZELICZNIK WALUT</title>


</head>





<body>
    <h2>przelicznik walut</h2>

<form method="post"> 

Kwota: <input type="number" step="0.01" name="kwota" required><br>
Kurs:  <input type="number" step="0.0001" name="kurs" required><br>

<button type="submit">Przelicz</button>

</form>

    <?php if ($wynik !== null): ?>
        <h3>Wynik: <?= number_format($wynik, 2, ',', ' ') ?></h3>
    <?php endif; ?>

    
</body>
</html>
