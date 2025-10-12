<!DOCTYPE html>

<head>
    
    <title>Przelicznik Walut</title>

    <link rel="stylesheet" href="styl.css">
    
</head>


<body>

<div class="container">
    

<h2>Przelicznik walut</h2>

<?php if ($blad): ?>
<p class="blad"><?= htmlspecialchars($blad) ?></p>
<?php endif; ?>

<form method="post">

<label>Kwota:</label>

<input type="number" step="0.01" name="kwota" required><br>

<label>Kurs:</label>

<input type="number" step="0.0001" name="kurs" required><br>

        
<button type="submit">Przelicz</button>

</form>

<?php if ($wynik !== null): ?>

<h3>Wynik: <?= number_format($wynik, 2, ',', ' ') ?></h3>

<?php endif; ?>


</div>
</body>
</html>
