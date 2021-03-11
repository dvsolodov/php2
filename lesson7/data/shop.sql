-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 11 2021 г., 08:09
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `buyer_id` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `quantity`, `price`, `user_id`, `buyer_id`) VALUES
(24, 1, 1, '120.30', 1, '4500175393d8d66c795b536c5bb7fbd2');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`) VALUES
(1, NULL, 'Обувь'),
(2, NULL, 'Одежда'),
(3, 1, 'Сапоги'),
(4, 2, 'Футболки');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_name` varchar(64) NOT NULL,
  `text` text NOT NULL,
  `comment_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `link` varchar(64) NOT NULL,
  `guest_menu` tinyint(1) DEFAULT NULL,
  `user_menu` tinyint(1) DEFAULT NULL,
  `admin_menu` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `guest_menu`, `user_menu`, `admin_menu`) VALUES
(1, 'Главная', 'home', 1, 1, NULL),
(2, 'Каталог', 'products', 2, 2, NULL),
(3, 'Корзина', 'cart', 3, 3, NULL),
(6, 'Регистрация', 'register', 4, NULL, NULL),
(7, 'Вход', 'login', 5, NULL, NULL),
(8, 'Мои заказы', 'myorders', NULL, 4, NULL),
(9, 'Выход', 'logout', NULL, 5, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `buyer_name` varchar(64) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `buyer_id` varchar(33) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `buyer_name`, `phone`, `user_id`, `buyer_id`, `status`) VALUES
(66, 'admin', '54654654645', 1, '4500175393d8d66c795b536c5bb7fbd2', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `name`) VALUES
(1, 'Создан'),
(2, 'Обрабатывается'),
(3, 'Готов');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `img` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `img`) VALUES
(1, 'Сапоги', 'Получили распространение на Руси и Ближнем Востоке от кочевников, для которых мягкие сапоги были удобной обувью для верховой езды. На Руси первое время считались обувью для богатых (простолюдины обыкновенно носили поршни или лапти), в последующем получили распространение твёрдые юфтевые сапоги.\r\n\r\nСафьяновые сапоги упоминаются в русских былинах. В русских летописях, повествующих о X веке, сапоги противопоставляются лаптям как знак принадлежности аристократии[2].\r\n\r\nВ Русском государстве, при царе Алексее Михайловиче, стрельцы носят на ногах высокие сапоги, а полки различались между собой цветом воротников, шапок и иногда сапог[3].\r\n\r\nПопулярность сапог среди знати несколько снизилась после того, как Пётр I ограничил ношение традиционной русской одежды.\r\n\r\nСапоги шили из юфти, с пришивным голенищем или цельные — вытяжные. Чаще всего с прямым срезом голенища. Особым шиком считались складки на голенищах (тогда это называлось сапоги «с моршыной»). Складки имели правильную круглую форму. Для этого в кожу вшивалась кольцом круглая верёвка. На голенище помещалось 5 — 6 таких колец. Морщин должно было быть не менее пяти. Также изготовлялись сапоги «со скрипом» — между подошвой и стелькой делали подкладку из сухой бересты или насыпали туда сахарный песок.\r\n\r\nНоски имели круглую или удлинённую форму. Сапоги с острыми носами в России назывались остроги. Каблуки делались разнообразных фасонов: низкие, высокие, «в рюмку» (то есть обрезанные сзади).\r\n\r\nСапоги, закрывающие колени, получили название ботфортов и были популярны в эпоху барокко. До середины XX века сапоги в России были мужской и женской обувью. Известный генерал А. А. Брусилов писал: «… к 1917 году … чуть ли не всё население России ходило в солдатских сапогах…». Женщины носили коты — укороченные сапожки, отороченные сверху красным сукном или сафьяном[4].\r\n\r\nВ вооружённых силах являлись элементом формы одежды военнослужащих. В Советской Армии ВС Союза ССР военнослужащие носили хромовые, юфтевые (яловые) и кирзовые сапоги.', '120.30', 3, 'sapogi.jpg'),
(2, 'Галоши', 'Кало́ши или гало́ши (устар. мокроступы[1]) (фр. galoches и нем. Galoschen[2]) — непромокаемые (обычно резиновые) накладки, надеваемые на обувь, некоторые виды используются как самостоятельная обувь (садовые, утеплённые, диэлектрические и т. д.).\r\n\r\nГалоши из тонкой резины носят с валенками. В прошлом их носили для защиты обуви, и на туфли, и на ботинки (см. гамаши).\r\n\r\nСравнительное удобство составляет ношение калош как сменной обуви на предприятия, в театр, в школу, так как нет необходимости, идя по улице, нести с собой мешок или пакет с обувью, да и сам процесс переодевания переходит в процесс простого снятия калош, что несомненно, занимает намного меньше времени.\r\n\r\nРазличаются по материалам, отделке и особенностям использования: галоши садовые; галоши на валенки, галоши клеёные на валенки; галоши азиатские хлопчатобумажные мужские, галоши азиатские хлопчатобумажные женские, галоши азиатские хлопчатобумажные детские, галоши азиатские хлопчатобумажные малодетские, галоши азиатские на шерсти; галоши из пластиката поливинилхлоридного чёрные; галоши из пластиката поливинилхлоридного цветные; галоши мальчиковые клеёные резиновые; галоши мальчиковые комбинированные резиновые; галоши резиновые лакированные клеёные девичьи для ношения на обувь; галоши резиновые лакированные клеёные для ношения на обувь; галоши резиновые лакированные клеёные из чёрной резины для ношения на унтах; галоши резиновые лакированные клеёные из чёрной резины.\r\n\r\nПервые резиновые калоши появились в продаже в Бостоне 12 февраля 1831 года.', '100.50', 1, 'galoshy.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(64) NOT NULL,
  `password` tinytext NOT NULL,
  `reg_date` int(11) NOT NULL,
  `buyer_id` varchar(64) NOT NULL,
  `remember` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `reg_date`, `buyer_id`, `remember`) VALUES
(1, 'admin', '$2y$10$/UL5zUY5R07Q4D1Bkc9u5.mTuA.ZCmEFnWgxG.bZrFh5OPZAkezji', 1615266835, '25deb5fb088285d34368da7260d3365b', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT для таблицы `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
