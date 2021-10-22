<?php
require_once __DIR__ . '/function.php';
$dbh = connectDb();
$sql = 'SELECT * FROM animals';
$stmt = $dbh->prepare($sql);
$stmt->execute();
$animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>PET_SHOP</title>
</head>

<body>
    <h2>本日のペットご紹介!</h2>
    <ul>
        <?php foreach ($animals as $animal) : ?>

            <li><?= h($animal['type'] . 'の' . $animal['classification'] . 'ちゃん') ?></li>
            <li><?= h($animal['description']) ?></li>
            <li><?= h($animal['birthplace']) ?></li>
            <li><?= h($animal['birthday']) ?></li>
            <hr>
        <?php endforeach; ?>
    </ul>

</body>

</html>