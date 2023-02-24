<?php

require_once "database.php";

$stmt = $pdo->query("SELECT * from afspraak ORDER BY afspraakdatum DESC");

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Afspraken</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Afspraken</h1>
        <a href="index.php">Create</a>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Basiskleuren</th>
                <th>Telefoonnummer</th>
                <th>Email</th>
                <th>Afspraakdatum</th>
                <th>Behandeling</th>
                <th>Datum</th>
            </tr>
            <?php while ($row = $stmt->fetch()) : ?>
                <tr>
                    <td><?= htmlspecialchars($row["id"]) ?></td>
                    <td><?= htmlspecialchars($row["basiskleuren"]) ?></td>
                    <td><?= htmlspecialchars($row["tel"]) ?></td>
                    <td><?= htmlspecialchars($row["email"]) ?></td>
                    <td><?= htmlspecialchars($row["afspraakdatum"]) ?></td>
                    <td><?= htmlspecialchars($row["behandeling"]) ?></td>
                    <td><?= htmlspecialchars($row["datum"]) ?></td>
                    <td><a href="update.php?id=<?= $row["id"] ?>">Update</a></td>
                    <td><a href="delete.php?id=<?= $row["id"] ?>">Delete</a></td>
                </tr>
            <?php endwhile ?>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>