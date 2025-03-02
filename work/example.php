<?php
// Устанавливаем заголовок Content-Type как image/png
header('Content-Type: image/png');

// Получаем параметры из URL
$name = $_GET['name'] ?? 'Даниил Дыбка';
$description = $_GET['desc'] ?? 'Веб-разработчик.';

$width = 1200;
$height = 630;
$image = imagecreate($width, $height);

$backgroundColor = imagecolorallocate($image, 255, 255, 255);
$textColor = imagecolorallocate($image, 0, 0, 0);

$fontTitle = __DIR__ . '/resistsans.ttf';
$fontText = __DIR__ . '/inter.ttf';

// Добавляем текст на изображение
imagettftext($image, 40, 0, 50, 100, $textColor, $fontTitle, $name);
imagettftext($image, 20, 0, 50, 150, $textColor, $fontText, $description);

// Выводим изображение в формате PNG
imagepng($image);

// Освобождаем память
imagedestroy($image);
