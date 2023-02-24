<?php

require_once "database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $kleur1 = $_POST["kleur-1"] ?? "";
    $kleur2 = $_POST["kleur-2"] ?? "";
    $kleur3 = $_POST["kleur-3"] ?? "";
    $kleur4 = $_POST["kleur-4"] ?? "";
    $basiskleuren = implode(", ", [$kleur1, $kleur2, $kleur3, $kleur4]);
    $tel = $_POST["tel"] ?? "";
    $email = $_POST["email"] ?? "";
    $afspraakdatum = $_POST["datum"] ?? "";
    $behandeling = $_POST["behandeling"] ?? [];
    $behandeling = implode(", ", $behandeling);
    $now = $_POST["now"] ?? "";

    $stmt = $pdo->prepare("INSERT INTO afspraak VALUES (NULL, ?, ?, ?, ?, ?, ?)");
    $stmt->bindValue(1, $basiskleuren);
    $stmt->bindValue(2, $tel);
    $stmt->bindValue(3, $email);
    $stmt->bindValue(4, $afspraakdatum);
    $stmt->bindValue(5, $behandeling);
    $stmt->bindValue(6, $now);

    $stmt->execute();

    header("Refresh: 2; url=/read.php");
    die("De afspraak is aangemaakt.");
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bling Bling Nagelstudio Chantal</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div>
            <h1>Bling Bling Nagelstudio Chantal</h1>
            <a href="read.php">Read</a>

            <form method="post" class="mt-1">
                <div>
                    Kies 4 basiskleuren voor uw nagels:
                    <div class="row mt-1">
                        <input type="color" name="kleur-1" value="#ff0000">
                        <input type="color" name="kleur-2" value="#ffffff">
                        <input type="color" name="kleur-3" value="#0000ff">
                        <input type="color" name="kleur-4" value="#ffa500">
                    </div>
                </div>

                <div class="mt-1">
                    <label for="tel" class="block">Uw telefoonnummer:</label>
                    <input type="tel" name="tel" id="tel" class="input" pattern="[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}" required>
                </div>

                <div class="mt-1">
                    <label for="email" class="block">Uw e-mailadres:</label>
                    <input type="email" name="email" id="email" class="input" required>
                </div>

                <div class="mt-1">
                    <label for="land" class="block">Afspraak datum:</label>
                    <input type="datetime-local" name="datum" id="datum" class="input" required>
                </div>

                <div class="mt-1">
                    Soort behandeling:

                    <div class="mt-1">
                        <input type="checkbox" name="behandeling[]" value="Nagelbijt" id="nagelbijt">
                        <label for="nagelbijt" class="">Nagelbijt arrangement (termijnbetaling mogelijk) $180</label>
                    </div>

                    <div class="mt-1">
                        <input type="checkbox" name="behandeling[]" value="Luxe manicure" id="manicure">
                        <label for="manicure" class="">Luxe manicure (massage en handpakking) $30</label>
                    </div>

                    <div class="mt-1">
                        <input type="checkbox" name="behandeling[]" value="Nagelreparatie" id="reparatie">
                        <label for="reparatie" class="">Nagelreparatie per nagel (in eerste week gratis) $5</label>
                    </div>
                </div>

                <input type="hidden" name="now" value="<?= date(DATE_RFC2822); ?>">

                <div class="row mt-1">
                    <button class="button">Sla op</button>
                    <button type="reset" class="button">Reset</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>