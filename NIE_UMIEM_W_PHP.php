<?php


function przeliczWalute($kwota, $kurs) {
    return $kwota * $kurs;
}



if ($_SERVER["REQUEST_METHOD"] == "POST") { //albo GET
   
    $kwota = (float)$_POST["KWOTA"];
   
    $kurs = (float)$_POST["KURS WALUTY"];
   
    $wynik = przeliczWalute($kwota, $kurs);
}


?>






<!DOCTYPE html>

<head>

<title>PRZELICZNIE WALUT</title>

</head>

<body>
    



<h2>PRZELICZNIK : </h2>




<form method="post">
       
Kwota: <input type="number" step="0.01" name="kwota" required><br><br>
Kurs: <input type="number" step="0.0001" name="kurs" required><br><br>   
<button type="submit">Przelicz</button>
</form>








    <?php if (isset($wynik)): ?>
        <h3>Wynik: <?php echo number_format($wynik, 2, ',', ' '); ?></h3>
    <?php endif; ?>
</body>
</html>
