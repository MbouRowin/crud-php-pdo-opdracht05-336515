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
    die("De inschrijving is aangemaakt.");
}

$vestigingen = $pdo->query("SELECT * FROM vestiging");

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BASIC-FIT Utrecht</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div>
            <h1>BASIC-FIT Utrecht</h1>
            <a href="read.php">Read</a>

            <form method="post">
                <div class="mt-2">
                    Kies je homeclub:

                    <select class="mt-1 select" name="homeclub" id="homeclub">
                        <?php while ($row = $vestigingen->fetch()) : ?>
                            <?php $value = $row["straatnaam"] . " " . $row["huisnummer"] ?>
                            <option value="<?= $value ?>"><?= $value ?></option>
                        <?php endwhile ?>
                    </select>
                </div>

                <div class="mt-2">
                    Selecteer een lidmaatschap:

                    <div class="mt-1">
                        <input type="radio" name="lidmaatschap" id="comfort">
                        <label for="comfort">Comfort</label>

                        <input type="radio" name="lidmaatschap" id="premium">
                        <label for="premium">Premium</label>

                        <input type="radio" name="lidmaatschap" id="all-in">
                        <label for="all-in">All in</label>
                    </div>
                </div>

                <div class="mt-2">
                    Selecteer een looptijd:

                    <div class="mt-1">
                        <input type="radio" name="looptijd" id="jaar">
                        <label for="jaar">Jaarlidmaatschap</label>

                        <input type="radio" name="looptijd" id="flex">
                        <label for="flex">Flex optie</label>
                    </div>
                </div>

                <div class="mt-2">
                    Selecteer je extra's:

                    <div class="mt-1">
                        <input type="checkbox" name="extra[]" value="Yanga sportswater" id="sportswater">
                        <label for="sportswater" class="">Yanga sportswater $2,50 per 4 weken</label>
                    </div>

                    <div class="mt-1">
                        <input type="checkbox" name="extra[]" value="Personal online coach" id="online-coach">
                        <label for="online-coach" class="">Personal online coach $60 eenmalig</label>
                    </div>

                    <div class="mt-1">
                        <input type="checkbox" name="extra[]" value="Personal training intro" id="training-intro">
                        <label for="training-intro" class="">Personal training intro $25 eenmalig</label>
                    </div>
                </div>

                <div class="mt-2">
                    <label for="email" class="block">Uw e-mailadres:</label>
                    <input type="email" name="email" id="email" class="input mt-1" required>
                </div>

                <div class="row mt-2">
                    <button class="button">Sla op</button>
                    <button type="reset" class="button">Reset</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>