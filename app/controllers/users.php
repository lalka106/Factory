<?php
include SITE_ROOT . "/app/database/db.php";




function userAut($array)
{
	$_SESSION['id'] = $array['id'];
	$_SESSION['login'] = $array['username'];
	$_SESSION['admin'] = $array['admin'];
    $_SESSION['fio'] = $array['fio'];
	if ($_SESSION['admin']) {
		header('location:' . BASE_URL . 'admin/posts/index.php');
	} else {
		header('location: ' . BASE_URL);
	}
}
$errorMessage = [];
$status = '';
$users = selectAll('users');



//registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])) {
	$admin = 0;
	$login = trim($_POST['login']);
    $fio = trim($_POST['fio']);
	$email = trim($_POST['email']);
	$pass1 = trim($_POST['pass1']);
	$pass2 = trim($_POST['pass2']);

	if ($login === '' || $email === '' || $pass1 === '' ) {
		array_push($errorMessage, 'Не все поля заполненны!');
	} elseif (mb_strlen($login, 'UTF8') < 2) {
		array_push($errorMessage, 'Логин должен быть более 2-ух символов');
	} elseif ($pass1 !== $pass2) {
		array_push($errorMessage, 'Пароли должны совпадать');
	} elseif (!preg_match("/^[a-zа-яё\d]*$/iu", $login)) {
        array_push($errorMessage, 'Некорректный логин');
    } elseif (!preg_match("/^[a-zа-яё\s]*$/iu", $fio)) {
        array_push($errorMessage, 'Некорректное ФИО');

    } else {
		$existence = selectONE('users', ['email' => $email]);
		if (!empty($existence['email']) && $existence['email'] === $email) {
			array_push($errorMessage, 'Пользователь с такой почтой уже зарегистрирован');
		} else {
			$pass = password_hash($pass1, PASSWORD_DEFAULT);
			$post = [
				'admin' => $admin,
				'username' => $login,
                'fio' => $fio,
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
    $fio = '';
}


//login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])) {
	$email = trim($_POST['email']);
	$pass = trim($_POST['pass']);
	if ($email === '' ||  $pass === '') {
		array_push($errorMessage, 'Не все поля заполненны!');
	} else {
		$existence = selectONE('users', ['email' => $email]);
		if ($existence && password_verify($pass, $existence['password'])) {
			userAut($existence);
		} else {
			array_push($errorMessage, 'Почта либо пароль введены неверно!');
		}
	}
} else {
	$email = '';
}

// $pass = password_hash($_POST['pass2'], PASSWORD_DEFAULT);


//add user into admin panel
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user'])) {

	$admin = 0;
	$login = trim($_POST['login']);
    $fio = trim($_POST['fio']);
	$email = trim($_POST['email']);
	$pass1 = trim($_POST['pass1']);
	$pass2 = trim($_POST['pass2']);

	if ($login === '' || $email === '' || $pass1 === '') {
		array_push($errorMessage, 'Не все поля заполненны!');
	} elseif (mb_strlen($login, 'UTF8') < 2) {
		array_push($errorMessage, 'Логин должен быть более 2-ух символов');
	} elseif ($pass1 !== $pass2) {
		array_push($errorMessage, 'Пароли должны совпадать');
	} else {
		$existence = selectONE('users', ['email' => $email]);
		if (!empty($existence['email']) && $existence['email'] === $email) {
			array_push($errorMessage, 'Пользователь с такой почтой уже зарегистрирован');
		} else {
			$pass = password_hash($pass1, PASSWORD_DEFAULT);
			if (isset($_POST['admin'])) {
				$admin = 1;
			}
			$user = [
				'admin' => $admin,
				'username' => $login,
                'fio' => $fio,
				'email' => $email,
				'password' => $pass
			];
			$id = insert('users', $user);
			$user = selectONE('users', ['id' => $id]);
			header('location:' . BASE_URL . 'admin/users/index.php');
		}
	}
} else {
	$login = '';
	$email = '';
}

//edit user
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])) {
	$id = $_GET['edit_id'];
	$user = selectONE('users', ['id' => $id]);
	$id = $user['id'];
	$admin = $user['admin'];
	$username = $user['username'];
    $fio = $user['fio'];
	$email = $user['email'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-user'])) {
	$id = $_POST['id'];
	$email = trim($_POST['email']);
	$login = trim($_POST['login']);
    $fio = trim($_POST['fio']);
	$pass1 = trim($_POST['pass1']);
	$pass2 = trim($_POST['pass2']);
	$admin = isset($_POST['admin']) ? 1 : 0;
	if ($login === '') {
		array_push($errorMessage, 'Не все поля заполненны!');
	} elseif (mb_strlen($login, 'UTF8') < 2) {
		array_push($errorMessage, 'Логин должнен быть более 2-ух символов');
	} elseif ($pass1 !== $pass2) {
		array_push($errorMessage, 'Пароли должны совпадать');
	} else {
		$pass = password_hash($pass1, PASSWORD_DEFAULT);
		$user = [
			'admin' => $admin,
			'username' => $login,
            'fio' => $fio,
			'password' => $pass,
		];

		$user = update('users', $id, $user);
		header('location:' . BASE_URL . 'admin/users/index.php');
	}
}





//delete user
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
	$id = $_GET['delete_id'];
	delete('users', $id);
	header('location:' . BASE_URL . 'admin/users/index.php');
}
