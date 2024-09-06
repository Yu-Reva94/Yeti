<?php
//Функция шаблонизатор
function renderTemplate($fileName, $data)
{
    if (!file_exists($fileName)) {
        return "шаблон не найден";
    } else {
        ob_start();
        extract($data);
        require("$fileName");
        return ob_get_clean();
    }
}
//форматируем цену лотов и добавляет Р
function priceFormatting($num)
{
    $num = ceil($num);
    if ($num < 1000) {
        return $num . ' ₽';
    } else {
        return number_format($num, 0, ' ', ' ') . " ₽";
    }
}
//таймер: сколько времени осталось до полуночи
function midnightTime($curTime, $midnightTime)
{
    $timeDiff = ($midnightTime - $curTime);
    $hours = floor($timeDiff / 3600);
    $minutes = floor(($timeDiff % 3600) / 60);
    return "$hours:$minutes";
}

