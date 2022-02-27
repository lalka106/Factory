<?php

$driver = 'mysql';
$host = 'localhost';
$db_name = 'factory';
$db_user = 'root';
$db_pass = 'mysql';
$charset = 'utf8';
// Установить режим ошибки PDO в исключение
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

try {
	$pdo = new PDO("$driver:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_pass, $options);
} catch (PDOException $i) {
	die("Error in connection");
}
