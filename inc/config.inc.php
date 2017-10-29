<?php

			/* Основные настройки */

define(DB_HOST, "localhost"); // константа
define(DB_LOGIN, "web_master");
define(DB_PASSWORD, "628072"); // константа, значение - пустая строка
define(DB_NAME, "eshop");
define(ORDERS_LOG, "orders.log"); // имя файла с личными данными пользователей
$basket = []; // создаю пустой массив для хранения корзины пользователя
$count = 0; // для хранения количества товаров в корзине пользователя
$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME); // соединение с БД и выбор БД (or die - удалить)

// Отслеживаем ошибки при соединении с БД
if( !$link){
     echo 'Ошибка: '
          . mysqli_connect_errno()
          . ': '
          . mysqli_connect_error();
}


			/* / Основные настройки */