<?php
	// подключение библиотек
	require "secure/session.inc.php";
	require "../inc/lib.inc.php";
	require "../inc/config.inc.php";

	// Получить и отфильтровать данные из формы:
$title = clearStr($_POST['title']);
$autor = clearStr($_POST['autor']);
$pubyear = clearInt($_POST['pubyear']);
$price = clearInt($_POST['price']);

	// Вызоваьть функцию addItemToCatalog для сохранения нового товара в базе данных:
if(!addItemToCatalog($title, $author, $pubyear, $price)){
	echo 'Произошла ошибка при добавлении товара в каталог';
}
else {
	header("Location: add2cat.php"); // редирект (переадресация) на "add2cat.php"
	exit;
}