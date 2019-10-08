<?php
//require_once("config/redirect.php");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <title>Cut Url</title>
</head>
<body>
    
    <header>
        <a href="admin.php" class="btn1">админпанель</a>
    </header>
    <main>
        <h1>Я СОКРАЩАЮ ССЫЛКИ</h1>
        <h2>ЭТО ПРОСТО - ПОПРОБУЙ</h2>
    </main>
    <section>
        <form id="cut" method="post">
        <input type="url" name="url" id="url" placeholder="Введи ссылку, которую нужно 'cut-cut'" required>
        <button class="btn2" type="submit">Сократить ссылку</button>
    </form>
    <div id="log"></div>
    </section>
    <canvas id="canvas"></canvas>
    <script src="assets/animate.js"></script>
    <script src="assets/main.js"></script>
</body>
</html>