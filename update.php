<?php

require_once "database.php";

$id = $_GET["id"] ?? "";

if (!$id) {
    header("Location: /read.php");
    die();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $homeclub = $_POST["homeclub"] ?? "";
    $lidmaatschap = $_POST["lidmaatschap"] ?? "";
    $looptijd = $_POST["looptijd"] ?? "";
    $extra = $_POST["extra"] ?? [];
    $extra = implode(", ", $extra);
    $email = $_POST["email"] ?? "";

    $stmt = $pdo->prepare("UPDATE inschrijving SET homeclub = ?, lidmaatschap = ?, looptijd = ?, extra = ?, email = ? WHERE id = ?");
    $stmt->bindValue(1, $homeclub);
    $stmt->bindValue(2, $lidmaatschap);
    $stmt->bindValue(3, $looptijd);
    $stmt->bindValue(4, $extra);
    $stmt->bindValue(5, $email);
    $stmt->bindValue(6, $id);

    $stmt->execute();

    header("Refresh: 2; url=/read.php");
    die("De inschrijving is aangepast!");
}

$vestigingen = $pdo->query("SELECT * FROM vestiging");

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div>
            <h1>Update</h1>
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
                        <input type="radio" name="lidmaatschap" id="comfort" value="Comfort">
                        <label for="comfort">Comfort</label>

                        <input type="radio" name="lidmaatschap" id="premium" value="Premium">
                        <label for="premium">Premium</label>

                        <input type="radio" name="lidmaatschap" id="all-in" value="All in">
                        <label for="all-in">All in</label>
                    </div>
                </div>

                <div class="mt-2">
                    Selecteer een looptijd:

                    <div class="mt-1">
                        <input type="radio" name="looptijd" id="jaar" value="Jaarlidmaatschap">
                        <label for="jaar">Jaarlidmaatschap</label>

                        <input type="radio" name="looptijd" id="flex" value="Flex optie">
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