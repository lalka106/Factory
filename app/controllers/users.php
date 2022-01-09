<?php
include("app/database/db.php");



function userAut($array)
{
	$_SESSION['id'] = $array['id'];
	$_SESSION['login'] = $array['username'];
	$_SESSION['admin'] = $array['admin'];

	if ($_SESSION['admin']) {
		header('location:' . BASE_URL . 'admin/posts/index.php');
	} else {
		header('location: ' . BASE_URL);
	}
}
$errorMessage = '';
$status = '';
//registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])) {
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
			$user = selectONE('users', ['id' => $id]);
			userAut($user);
		}
	}
} else {
	$login = '';
	$email = '';
}
//login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])) {
	$email = trim($_POST['email']);
	$pass = trim($_POST['pass']);
	if ($email === '' ||  $pass === '') {
		$errorMessage = 'Не все поля заполненны!';
	} else {
		$existence = selectONE('users', ['email' => $email]);
		if ($existence && password_verify($pass, $existence['password'])) {
			userAut($existence);
		} else {
			$errorMessage = "Почта либо пароль введены неверно!";
		}
	}
} else {
	$email = '';
}

	// $pass = password_hash($_POST['pass2'], PASSWORD_DEFAULT);
