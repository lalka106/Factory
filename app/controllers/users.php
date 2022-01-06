<?php
include("app/database/db.php");

$errorMessage = '';
$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$admin = 0;
	$login = trim($_POST['login']);
	$email = trim($_POST['email']);
	$pass1 = trim($_POST['pass1']);
	$pass2 = trim($_POST['pass2']);

	if ($login === '' || $email === '' || $pass1 === '') {
		$errorMessage = 'Не все поля заполненны!';
	} elseif (mb_strlen($login, 'UTF8') < 2) {
		$errorMessage = "Логин должен быть более 2-ух символов";
	} elseif ($pass1 !== $pass2) {
		$errorMessage = "Пароли должны совпадать";
	} else {
		$existence = selectONE('users', ['email' => $email]);
		if (!empty($existence['email']) && $existence['email'] === $email) {
			$errorMessage = "Пользователь с такой почтой уже зарегистрирован";
		} else {
			$pass = password_hash($pass1, PASSWORD_DEFAULT);
			$post = [
				'admin' => $admin,
				'username' => $login,
				'email' => $email,
				'password' => $pass
			];
			$id = insert('users', $post);
			$errorMessage = "Пользователь " . "<strong>" . $login . "</strong>" . " успешно зарегистрирован!";
		}
	}
} else {
	$login = '';
	$email = '';
}

	// $pass = password_hash($_POST['pass2'], PASSWORD_DEFAULT);
