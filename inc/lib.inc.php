<?php

	// отфильтровать принятые из формы данные (в аргумент приходит дата/число)
function clearInt($data){
	return abs((int)$data);
}

	// отфильтровать принятые из формы данные (в аргумент приходит дата/число)
function clearStr($data){
	global $link; // соединение с БД установлено в "config.inc.php"
	return mysqli_real_escape_string($link, trim(strip_tags($data)));
}

	// функция сохраняющая новый товар в таблицу catalog:
function addItemToCatalog ($title, $autor, $bubyear, $price) { 
	global $link;// соединение с БД установлено в "config.inc.php"
	$sql = "INSERT INTO catalog (title, autor, pubyear, price)
		VALUES (?, ?, ?, ?)"; // запрос на вставку данных в таблицу каталог (title... - поля табли)

	// исполнить запрос на вставку даннных:
	if (!$stmt = mysqli_prepare($link, $sql)) {
		return false;	// если функция addItemToCatalog не отработала
		// msqli_prepare() - вот тебе запрос, подготовся, к нему будут идти данные
		// в $stmt прийдет объект или false
	}
	else { // возможно else писать не надо. проверить!
		mysqli_stmt_bind_param($stmt, "ssii", $title, $autor, $pubyear, $price); // привязывает переменные к параметрам подготавливаемого запроса ($stmt - кому передать параметры, "ssii" - параметры какого типа: str/int)
		mysqli_stmt_execute($stmt);	// А теперь, исполни подготовленный запрос с переданными параметрами
		mysqli_stmt_close($stmt);
		return true;
	}
}


/* Доступ к этому файлу в браузере блокирует ".htaccess" */