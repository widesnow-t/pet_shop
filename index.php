<?php
require_once __DIR__ . '/function.php';
$dbh = connectDb();
$sql = 'SELECT * FROM animals WHERE description LIKE :keyword';
$stmt = $dbh->prepare($sql);
$keyword = 'おっとり';
$keyword = '%' . $keyword . '%';
$stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
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
    <?php if (empty($_GET)): ?>
    <form method="get">
        キーワード:<input type="text" name="keyword">
        <input type="submit">
        <ul>
            <?php foreach ($animals as $animal) : ?>
                <li><?= h($animal['type'] . 'の' . $animal['classification'] . 'ちゃん') ?></li>
                <li><?= h($animal['description']) ?></li>
                <li><?= h($animal['birthplace']) ?></li>
                <li><?= h($animal['birthday']) ?></li>
                <hr>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>

</body>

</html>