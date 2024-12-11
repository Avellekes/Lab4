<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    $credentials = file('index.txt', FILE_IGNORE_NEW_LINES);
    $validLogin = false;

    foreach ($credentials as $line) {
        list($storedUsername, $storedPassword) = explode(':', $line);
        if ($username === $storedUsername && $password === $storedPassword) {
            $validLogin = true;
            break;
        }
    }

    if ($validLogin) {
        echo "Ви залогінені!";
    } else {
        echo "Невірний логін або пароль!";
    }
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Форма логіну</title>
</head>
<body>
    <form method="POST" action="index.php">
        <label for="login">Логін:</label>
        <input type="text" id="login" name="login" required>
        <br>
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Увійти</button>
    </form>
</body>
</html>