<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Домашнее задание к лекции 1.4 «Стандартные функции»</title>
</head>
<body>
    <form class="userForm" name="weatherForm" action="index.php" method="get">
        <h1>Погода</h1>
        City:<input type="text" name="city" placeholder="city">
        <input type="submit" name="submit" placeholder="submit">
    </form>
</body>
</html>
<?php
if(isset($_GET)){
    $user_city = $_GET['city'];

    $api_url = "api.openweathermap.org/data/2.5/weather?q=" . $user_city;
    $weather_data = file_get_contents($api_url);
    $json = json_decode($weather_data, TRUE);
}
