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
        <h2>Погода</h2>
        City:<input type="text" name="city" placeholder="city">
        <input type="submit" name="submit" placeholder="submit">
    </form>
    <?php
    $appid = '613262e22c6c2a8e8dc3bbe1950a3de3';
    if(isset($_GET)){
        $usercity = $_GET['city'];

        $apiurl = "http://api.openweathermap.org/data/2.5/weather?q=$usercity&appid=$appid&lang=ru";
        $weatherdata = file_get_contents($apiurl);
        $json = json_decode($weatherdata, TRUE);

        $temp = $json['main']['temp'];//temperature
        $humidity = $json['main']['humidity'];//humidity
        $condition = $json['weather'][0]['main'];//weather condition
        $wind = $json['wind']['speed'];//wind speed
        $direction = $json['wind']['deg'];//wind direction

        echo"<strong> City: </strong>" . $usercity . "<br>";
        echo"<strong> Humidity: </strong>" . $humidity . "<br>";
        echo"<strong> Current condition: </strong>" . $condition . "<br>";
        echo"<strong> Wind speed: </strong>" . $wind . "<br>";
        echo"<strong> Wind direction </strong>" . $direction . "<br>";
        echo"<strong> Temperature: </strong>" . $temp . "<br>";

    };
    ?>

    <?php
    if(isset($_GET['submit'])){
        $data = "data.json";
        $json_string = json_encode($_GET, JSON_PRETTY_PRINT);
        file_put_contents($data, $json_string, FILE_APPEND);
    };
    ?>
</body>
</html>


