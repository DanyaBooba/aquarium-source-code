<?php

if (!function_exists('truncate_text')) {
    function truncate_text($text, $len, $dotted = false)
    {
        // Если текст уже короче или равен требуемой длине, возвращаем его как есть
        if (mb_strlen($text) <= $len) {
            return $text;
        }

        // Обрезаем текст до нужной длины
        $truncated = mb_substr($text, 0, $len);

        // Находим последний пробел в обрезанном тексте
        $lastSpace = mb_strrpos($truncated, ' ');

        // Если пробел найден, обрезаем текст до последнего пробела
        if ($lastSpace !== false) {
            $truncated = mb_substr($truncated, 0, $lastSpace);
        }

        // Добавляем многоточие, если требуется
        if ($dotted) {
            $truncated .= '...';
        }

        return $truncated;
    }
}
