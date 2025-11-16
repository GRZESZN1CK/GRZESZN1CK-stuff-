<?php
session_start();






































$uzytkownicy = [
    "admin"     => ["haslo" => "admin",     "rola" => "szef"],
    "pracownik" => ["haslo" => "pracownik", "rola" => "pracownik"]
];








if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}























if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"]) && isset($_POST["haslo"])) {
    $login = $_POST["login"];
    $haslo = $_POST["haslo"];

    if (isset($uzytkownicy[$login]) && $uzytkownicy[$login]["haslo"] === $haslo) {
        $_SESSION["zalogowany"] = true;
        $_SESSION["rola"] = $uzytkownicy[$login]["rola"];
        $_SESSION["login"] = $login;
    } else {
        $blad = "Niepoprawny login lub hasło!";
    }
}






















function przeliczWalute($kwota, $kurs) {
    return $kwota * $kurs;
}

$wynik = null;























if (isset($_SESSION["zalogowany"]) && $_SESSION["zalogowany"] === true) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["kwota"]) && isset($_POST["kurs"])) {
        $kwota = (float)$_POST["kwota"];
        $kurs  = (float)$_POST["kurs"];
        $wynik = przeliczWalute($kwota, $kurs);
    }
}














?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>PRZELICZNIK WALUT</title>
</head>
<body>

















<?php if (!isset($_SESSION["zalogowany"]) || $_SESSION["zalogowany"] !== true): ?>





















    <h2>Logowanie</h2>
    <?php if (isset($blad)): ?>
        <p style="color:red;"><?= htmlspecialchars($blad) ?></p>
    <?php endif; ?>

    <form method="post">
        Login: <input type="text" name="login" required><br>
        Hasło: <input type="password" name="haslo" required><br>
        <button type="submit">Zaloguj</button>
    </form>


























<?php else: ?>







    <h2>Witaj, <?= htmlspecialchars($_SESSION["login"]) ?>!</h2>
    <p>Funkcje dostępu przyznane dla : <b><?= $_SESSION["rola"] ?></b></p>

    <h2>Przelicznik walut</h2>
    <form method="post">
        Kwota: <input type="number" step="0.01" name="kwota" required><br>
        Kurs:  <input type="number" step="0.0001" name="kurs" required><br>
        <button type="submit">Przelicz</button>
    </form>

    <?php if ($wynik !== null): ?>
        <?php if ($_SESSION["rola"] === "szef"): ?>
            <h3>Wynik: <?= number_format($wynik, 2, ',', ' ') ?></h3>
        <?php else: ?>
            <h3 style="color:red;">Pracownik nie ma uprawnień do wyświetlania wyniku.</h3>
        <?php endif; ?>
    <?php endif; ?>

    <p><a href="?logout=1">Wyloguj</a></p>












<?php endif; ?>

</body>
</html>
