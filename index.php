<?php
date_default_timezone_set("Europe/Moscow");
require_once "functions.php";
$curTime = time(); //текущее время
$midnightTime = strtotime("tomorrow, 00:00"); //время до полуночи
$is_auth = (bool)rand(0, 1);
$user_name = ' Юрий';
$user_avatar = 'img/user.jpg';
$categories = ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"];
$layout = "templates/layout.php";
$content = renderTemplate("templates/index.php", compact("items", "curTime", "midnightTime"));
echo renderTemplate($layout, compact("categories", "user_name", "is_auth", "user_avatar", "content"));
?>
