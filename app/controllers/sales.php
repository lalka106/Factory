<?php
include SITE_ROOT . "/app/database/db.php";


$errorMessage = '';
$id = '';
$name = '';
$description = '';
$sales = selectAll('sales');




//create sale
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sale-create'])) {
	$name = trim($_POST['name']);
	$description = trim($_POST['description']);


	if ($name === '' || $description === '') {
		$errorMessage = 'Не все поля заполненны!';
	} elseif (mb_strlen($name, 'UTF8') < 2) {
		$errorMessage = "Название акции должна быть более 2-ух символов";
	} else {
		$existence = selectONE('sales', ['name' => $name]);
		if ($existence['name'] === $name) {
			$errorMessage = "Акция с таким названием уже есть";
		} else {
			$sale = [
				'name' => $name,
				'description' => $description
			];
			$id = insert('sales', $sale);
			$sale = selectONE('sales', ['id' => $id]);
			header('location:' . BASE_URL . 'admin/sales/index.php');
		}
	}
} else {
	$name = '';
	$description = '';
}


//edit sales
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
	$id = $_GET['id'];
	$sale = selectONE('sales', ['id' => $id]);
	$id = $sale['id'];
	$name = $sale['name'];
	$description = $sale['description'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sale-edit'])) {
	$name = trim($_POST['name']);
	$description = trim($_POST['description']);
	if ($name === '' || $description === '') {
		$errorMessage = 'Не все поля заполненны!';
	} elseif (mb_strlen($name, 'UTF8') < 2) {
		$errorMessage = "Название акции должна быть более 2-ух символов";
	} else {
		$sale = [
			'name' => $name,
			'description' => $description
		];
		$id = $_POST['id'];
		$sale_id = update('sales', $id, $sale);
		header('location:' . BASE_URL . 'admin/sales/index.php');
	}
}



//delete sale
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
	$id = $_GET['delete_id'];
	delete('sales', $id);
	header('location:' . BASE_URL . 'admin/sales/index.php');
}
