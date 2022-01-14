<?php
include SITE_ROOT . "/app/database/db.php";


$errorMessage = [];
$id = '';
$name = '';
$description = '';
$categories = selectAll('categories');




//create category
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category-create'])) {
	$name = trim($_POST['name']);
	$description = trim($_POST['description']);


	if ($name === '' || $description === '') {
		array_push($errorMessage, 'Не все поля заполненны!');
	} elseif (mb_strlen($name, 'UTF8') < 2) {
		array_push($errorMessage, 'Название категории должно быть более 2-ух символов');
	} else {
		$existence = selectONE('categories', ['name' => $name]);
		if ($existence['name'] === $name) {
			array_push($errorMessage, 'Категория с таким названием уже есть');
		} else {
			$category = [
				'name' => $name,
				'description' => $description
			];
			$id = insert('categories', $category);
			$category = selectONE('categories', ['id' => $id]);
			header('location:' . BASE_URL . 'admin/categories/index.php');
		}
	}
} else {
	$name = '';
	$description = '';
}

//edit category
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
	$id = $_GET['id'];
	$category = selectONE('categories', ['id' => $id]);
	$id = $category['id'];
	$name = $category['name'];
	$description = $category['description'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category-edit'])) {
	$name = trim($_POST['name']);
	$description = trim($_POST['description']);
	if ($name === '' || $description === '') {
		array_push($errorMessage, 'Не все поля заполненны!');
	} elseif (mb_strlen($name, 'UTF8') < 2) {
		array_push($errorMessage, 'Название категории должно быть более 2-ух символов');
	} else {
		$category = [
			'name' => $name,
			'description' => $description
		];
		$id = $_POST['id'];
		$category_id = update('categories', $id, $category);
		header('location:' . BASE_URL . 'admin/categories/index.php');
	}
}



//delete category
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
	$id = $_GET['delete_id'];
	delete('categories', $id);
	header('location:' . BASE_URL . 'admin/categories/index.php');
}
