<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-lot'])) {

    if (!empty($_FILES['img']['name'])) {

        $imgName = addLot . phptime() . $_FILES['img']['name']; // time добавляет время к названию изображения
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $imgSize = $_FILES["img"]["size"];
        if (strpos($fileType, 'image') === false || $imgSize > 2120000) {
            array_push($errMsg, "Можно загружать только изображения, либо размер файла превышает допустимый");
        }
    }
    $lotName = trim($_POST['lot-name']);
    $lotCategory = trim($_POST['category']);
    $lotDescription = trim($_POST['message']);
    $lotPrice = trim($_POST['lot-rate']);
    $lotStep = trim($_POST['lot-step']);
    $lotDate = trim($_POST['lot-date']);

    if ($lotName == '' || $lotCategory == '' || $lotDescription == 'Выберите категорию' || $lotPrice == '' || $lotStep == '' || $lotDate == '') {
        array_push($errMsg, 'Не все поля заполнены!');
    } elseif (strlen($lotName) < 2) {
        array_push($errMsg, 'Длина наименования не может быть короче 2-х символов!');
    } elseif ($lotCategory == "Выберите категорию") {
        array_push($errMsg, 'Необходимо выбрать категорию товара!');
    } elseif (strlen($lotDescription) < 4) {
        array_push($errMsg, 'Длина описания не может быть короче 4-х символов!');
    } elseif (ctype_digit($lotPrice) != true || ctype_digit($lotStep) != true) {
        array_push($errMsg, 'в поля: "начальная цена" и "шаг ставки" могут быть введены только цифры');
    } elseif (strlen($lotDate) == 0) {
        array_push($errMsg, 'Поле: "дата окончания торгов" должно быть заполнено');
    } else
        $userLot = [
            'lotName' => $lotName,
            'lotCategory' => $lotCategory,
            'lotDescription' => $lotDescription,
            'img' => $fileTmpName,
            'lotPrice' => $lotPrice,
            'lotStep' => $lotStep,
            'lotDate' => $lotDate
        ];
}
