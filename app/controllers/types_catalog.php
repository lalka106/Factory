<?php
include SITE_ROOT . "/app/database/db.php";


$errorMessage = [];
$id = '';
$name = '';
$content = '';
$description = '';
$img = '';
$types = selectAll('type_catalog');




//create category
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['type-create'])) {
	if (!empty($_FILES['img']['name'])) {
		$imageName = time() . "_" . $_FILES['img']['name'];
		$fileTmpName = $_FILES['img']['tmp_name'];
		$fileType = $_FILES['img']['type'];
		$destination = ROOT_PATH . '\assets\img\type\\' . $imageName;

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


	$name = trim($_POST['name']);
	$content = trim($_POST['content']);
	$description = trim($_POST['description']);

	if ($name === '' || $description === '') {
		array_push($errorMessage, 'Не все поля заполненны!');
	} elseif (mb_strlen($name, 'UTF8') < 2) {
		array_push($errorMessage, 'Название категории должно быть более 2-ух символов');
	} else {
		$existence = selectONE('type_catalog', ['name' => $name]);
		if ($existence['name'] === $name) {
			array_push($errorMessage, 'Категория с таким названием уже есть');
		} else {
			$type = [
				'name' => $name,
				'content' => $content,
				'description' => $description,
				'img' => $_POST['img']
			];
			$type = insert('type_catalog', $type);
			$type = selectONE('type_catalog', ['id' => $id]);
			header('location:' . BASE_URL . 'admin/type_catalog/index.php');
		}
	}
} else {
	$name = '';
	$content = '';
	$description = '';
	$img = '';
}

//edit category
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
	$id = $_GET['id'];
	$type = selectONE('type_catalog', ['id' => $id]);
	$id = $type['id'];
	$name = $type['name'];
	$content = $type['content'];
	$description = $type['description'];
	$img = $type['img'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category-edit'])) {
	if (!empty($_FILES['img']['name'])) {
		$imageName = time() . "_" . $_FILES['img']['name'];
		$fileTmpName = $_FILES['img']['tmp_name'];
		$fileType = $_FILES['img']['type'];
		$destination = ROOT_PATH . '\assets\img\type\\' . $imageName;

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

	$name = trim($_POST['name']);
	$content = trim($_POST['content']);
	$description = trim($_POST['description']);
	$img = trim($_POST['img']);
	if ($name === '' || $description === '') {
		array_push($errorMessage, 'Не все поля заполненны!');
	} elseif (mb_strlen($name, 'UTF8') < 2) {
		array_push($errorMessage, 'Название категории должно быть более 2-ух символов');
	} else {
		$type = [
			'name' => $name,
			'content' => $content,
			'description' => $description,
			'img' => $img
		];
		$id = $_POST['id'];
		$type_id = update('type_catalog', $id, $category);
		header('location:' . BASE_URL . 'admin/type_catalog/index.php');
	}
}



// //delete category
// if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
// 	$id = $_GET['delete_id'];
// 	delete('type_catalog', $id);
// 	header('location:' . BASE_URL . 'admin/type_catalog/index.php');
// }
