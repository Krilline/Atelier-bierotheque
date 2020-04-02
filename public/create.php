<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
    <a href="index.php">Home</a>
</header>
<?php

echo "Hello wilder";

require_once '../src/db.php';
if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $pdo = new PDO(DSN, USER, PWD);
    $sql = "INSERT INTO beer (name, brewery, type, country) VALUES (:name, :brewery, :type, :country)";

    $prepared = $pdo->prepare($sql);

    $prepared->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
    $prepared->bindValue(':brewery', $_POST['brewery'], PDO::PARAM_STR);
    $prepared->bindValue(':type', $_POST['type'], PDO::PARAM_STR);
    $prepared->bindValue(':country', $_POST['country'], PDO::PARAM_STR);

    $prepared->execute();
    Header('Location: http://localhost:8000/');
}
?>

<form method="post">
    <div class="champ">
        <label for="name">Name : </label>
        <input type="text" id="name" name="name">
    </div>
    <div class="champ">
        <label for="brewery">Brewery :</label>
        <input type="text" id="brewery" name="brewery">
    </div>
    <div class="champ">
        <label for="type">Type :</label>
        <input type="text" id="type" name="type">
    </div>
    <div class="champ">
        <label for="country">Country :</label>
        <input type="text" id="country" name="country">
    </div>
    <div>
        <button name="send">Send</button>
    </div>
</form>
</body>
</html>