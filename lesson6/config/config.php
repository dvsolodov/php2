<?php

/**
 * Работа с файловой структурой
 */

// Корневая директория файловой структуры проекта
define('ROOT', dirname(__DIR__));
// Разделитель директорий в адресах
define('DIR_SEP', DIRECTORY_SEPARATOR);

/**
 * HTML-шаблоны 
 */

// Путь к папке с html-шаблонами
define('TEMPLATE', ROOT . '/views/');

/**
 * Отзывы на товар 
 */

// Минимальное количество символов в имени пользователя
define('MIN_NAME', 3);
// Максимальное количество символов в имени пользователя
define('MAX_NAME', 20);
// Минимальное количество символов в комментарии
define('MIN_COMMENT', 1);
// Максимальное количество символов в комментарии
define('MAX_COMMENT', 1000);
// Время редактирования комментария 
define('COMMENT_EDIT_TIME', 600);

/**
 * Пагинация 
 */

// Количество товаров, выводимых за один вызов 
define('PROD_PER_PAGE', 1);

/**
 * Регистрация и авторизация
 */

// Минимальное количество символов в логине 
define('MIN_LOGIN', 3);
// Максимальное количество символов в логине 
define('MAX_LOGIN', 10);
// Минимальное количество символов в пароле 
define('MIN_PASS', 3);
// Максимальное количество символов в пароле 
define('MAX_PASS', 20);
