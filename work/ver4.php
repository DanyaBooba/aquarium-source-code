<?php
// Устанавливаем заголовок Content-Type как image/png
header('Content-Type: image/png');

// Получаем параметры из URL
$name = $_GET['name'] ?? 'Даниил Дыбка';
$description = $_GET['desc'] ?? 'Веб-разработчик.';
$subscribers = $_GET['subs'] ?? 1500;
$subscriptions = $_GET['subscr'] ?? 120;
$achievements = $_GET['achiev'] ?? 25;

// Размеры изображения
$width = 1200;
$height = 630;
$image = imagecreate($width, $height);

// Устанавливаем цвета
$backgroundColor = imagecolorallocate($image, 255, 255, 255); // Белый фон
$textColor = imagecolorallocate($image, 0, 0, 0); // Черный текст
$accentColor = imagecolorallocate($image, 100, 149, 237); // Акцентный цвет (CornflowerBlue)

// Загружаем шрифты
$fontTitle = __DIR__ . '/resistsans.ttf';
$fontText = __DIR__ . '/inter.ttf';

// Загружаем изображение для аватара
$avatarPath = __DIR__ . '/avatar.png'; // Путь к изображению аватара
$avatar = imagecreatefrompng($avatarPath);

// Размеры аватара
$avatarWidth = imagesx($avatar);
$avatarHeight = imagesy($avatar);
$avatarX = 50; // Аватар остается слева
$avatarY = 50;

// Добавляем аватар на основное изображение (без скругления)
imagecopy($image, $avatar, $avatarX, $avatarY, 0, 0, $avatarWidth, $avatarHeight);

// Координаты для текста (под аватаром)
$textX = $avatarX; // Текст начинается слева, под аватаром
$textY = $avatarY + $avatarHeight + 100; // Отступ под аватаром

// Добавляем текст на изображение (имя)
imagettftext($image, 40, 0, $textX, $textY, $textColor, $fontTitle, $name);

// Добавляем текст на изображение (описание)
imagettftext($image, 20, 0, $textX, $textY + 50, $textColor, $fontText, $description);

// Добавляем блок с подписчиками, подписками и достижениями
$blockY = $textY + 150; // Отступ под текстом
$blockX = $textX;
$blockSpacing = 200;

// Подписчики
imagettftext($image, 30, 0, $blockX, $blockY, $accentColor, $fontTitle, $subscribers);
imagettftext($image, 20, 0, $blockX, $blockY + 40, $textColor, $fontText, 'подписчики');

// Подписки
imagettftext($image, 30, 0, $blockX + $blockSpacing, $blockY, $accentColor, $fontTitle, $subscriptions);
imagettftext($image, 20, 0, $blockX + $blockSpacing, $blockY + 40, $textColor, $fontText, 'подписки');

// Достижения
imagettftext($image, 30, 0, $blockX + 2 * $blockSpacing, $blockY, $accentColor, $fontTitle, $achievements);
imagettftext($image, 20, 0, $blockX + 2 * $blockSpacing, $blockY + 40, $textColor, $fontText, 'достижения');

// Загружаем логотип
$logoPath = __DIR__ . '/logo.png'; // Путь к логотипу
$logo = imagecreatefrompng($logoPath);

// Размеры логотипа
$logoWidth = imagesx($logo);
$logoHeight = imagesy($logo);
$logoX = $width - $logoWidth - 50;
$logoY = 50;

// Добавляем логотип на изображение
imagecopy($image, $logo, $logoX, $logoY, 0, 0, $logoWidth, $logoHeight);

// Выводим изображение в формате PNG
imagepng($image);

// Освобождаем память
imagedestroy($image);
imagedestroy($avatar);
imagedestroy($logo);
