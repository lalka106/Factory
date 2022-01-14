<?php
include SITE_ROOT . "/app/database/db.php";

if (!$_SESSION) {
	header('location:' . BASE_URL . 'aut.php');
}

$errorMessage = [];
$id = '';
$title = '';
$adress = '';
$phone = '';
$email = '';
$img = '';
$director = '';


$directors = selectAll('directors');
$dealers = selectAll('dealers');




//create dealer
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-dealer'])) {
	if (!empty($_FILES['img']['name'])) {
		$imageName = time() . "_" . $_FILES['img']['name'];
		$fileTmpName = $_FILES['img']['tmp_name'];
		$fileType = $_FILES['img']['type'];
		$destination = ROOT_PATH . '\assets\img\dealers\\' . $imageName;

		if (strpos($fileType, 'image') === false) {
			array_push($errorMessage, 'Загружаемый файл не является изображением');
		} else {

			$result = move_uploaded_file($fileTmpName, $destination);

			if ($result) {
				$_POST['img'] = $imageName;
			} else {
				array_push($errorMessage, 'Ошибка при загрузке изображения на сервер');
			}
		}
	} else {
		array_push($errorMessage, 'Ошибка получения изображения');
	}
	$title = trim($_POST['title']);
	$adress = trim($_POST['adress']);
	$director = trim($_POST['director']);
	$phone = trim($_POST['phone']);
	$email = trim($_POST['email']);
	$publish = isset($_POST['publish']) ? 1 : 0;

	if ($title === '' || $adress === '') {
		array_push($errorMessage, 'Не все поля заполненны!');
	} elseif (mb_strlen($title, 'UTF8') < 7) {
		array_push($errorMessage, 'Наименование дилера должно быть более 7-ми символов');
	} else {
		$dealer = [
			'title' => $title,
			'adress' => $adress,
			'email' => $email,
			'phone' => $phone,
			'img' => $_POST['img'],
			'id_director' => $director,
			'status' => $publish
		];
		$dealer = insert('dealers', $dealer);
		$dealer = selectONE('dealers', ['id' => $id]);
		header('location:' . BASE_URL . 'admin/dealers/index.php');
	}
}
// else {
// 	$id = '';
// 	$title = '';
// 	$content = '';
// 	$publish  = '';
// 	$category = '';
// }


//edit dealer
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
	$id = $_GET['id'];
	$dealer = selectONE('dealers', ['id' => $id]);
	$id = $dealer['id'];
	$title = $dealer['title'];
	$adress = $dealer['adress'];
	$phone = $dealer['phone'];
	$email = $dealer['email'];
	// $img = $dealer['img'];
	$director = $dealer['id_director'];
	$publish = $dealer['status'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-dealer'])) {
	$id = $_POST['id'];
	$title = trim($_POST['title']);
	$adress = trim($_POST['adress']);
	$email = trim($_POST['email']);
	$phone = trim($_POST['phone']);
	$director = trim($_POST['director']);
	$publish = isset($_POST['publish']) ? 1 : 0;

	if ($title === '' || $adress === '') {
		array_push($errorMessage, 'Не все поля заполненны!');
	} elseif (mb_strlen($title, 'UTF8') < 7) {
		array_push($errorMessage, 'Наименование дилера должно быть более 7-ми символов');
	} else {
		$dealer = [
			'title' => $title,
			'adress' => $adress,
			'email' => $email,
			'phone' => $phone,
			// 'img' => $_POST['img'],
			'id_director' => $director,
			'status' => $publish
		];
		$dealer = update('dealers', $id, $dealer);
		header('location:' . BASE_URL . 'admin/dealers/index.php');
	}
}

//status dealer'a
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])) {
	$id = $_GET['pub_id'];
	$publish = $_GET['publish'];
	$postID = update('dealers', $id, ['status' => $publish]);
	header('location:' . BASE_URL . 'admin/dealers/index.php');
	die();
}



//delete dealer
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
	$id = $_GET['delete_id'];
	delete('dealers', $id);
	header('location:' . BASE_URL . 'admin/dealers/index.php');
}
