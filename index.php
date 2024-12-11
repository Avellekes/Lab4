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
