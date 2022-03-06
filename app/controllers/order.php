<?php
include SITE_ROOT . "/app/database/db.php";

if (!$_SESSION) {
	header('location:' . BASE_URL . 'aut.php');
}

$errorMessage = [];
$id = '';
$id_user = '';
$fio = '';
$count = '';
$result = '';
$id_product = '';

// tt($_GET);
$product = selectONE('product', ['id' => $_GET['product']]);
$user = selectONE('users', ['id' => $_SESSION['id']]);
// tt($product);



//create post
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['product'])) {
	// tt($_GET);
	$id = $_GET['product'];
	$product = selectONE('product', ['id' => $id]);
	$id = $product['id'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order'])) {

	$id_product = $_POST['id'];
	$fio = trim($_POST['fio']);
	$id_user = trim($_SESSION['id']);
	$count = trim($_POST['count']);
	$result = trim($_POST['result']);
	// if ($count > $product['count']) {
	// 	array_push($errorMessage, 'неверное количество');
	// }
	$order = [
		'id_product' => $id_product,
		'count' => $count,
		'id_user' => $id_user,
		'result' => $result
	];
	// tt($order);
	$order = insert('product_order', $order);
	$order = selectONE('product_order', ['id' => $id]);
	header('location:' . BASE_URL . 'index.php');
} else {
	$fio = '';
	$result = '';
	$count = '';
}


// //edit post
// if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
// 	$id = $_GET['product'];
// 	$product = selectONE('product', ['id' => $id]);
// 	$id = $product['id'];
// 	$name = $product['name'];
// 	$description = $product['description'];
// 	$characteristic = $product['characteristic'];
// 	$price = $product['price'];
// 	// $img = $product['img'];
// 	$count = $product['count'];
// 	$category = $product['id_type_product'];
// }
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order'])) {
// 	$id = $_POST['id'];
// 	$name = trim($_POST['name']);
// 	$description = trim($_POST['description']);
// 	$characteristic = trim($_POST['characteristic']);
// 	$price = trim($_POST['price']);
// 	$count = trim($_POST['count']);
// 	$category = trim($_POST['category']);

// 	if ($name === '' || $description === '') {
// 		array_push($errorMessage, 'Не все поля заполненны!');
// 	} elseif (mb_strlen($name, 'UTF8') < 5) {
// 		array_push($errorMessage, 'Название поста должно быть более 7-ми символов');
// 	} else {
// 		$product = [
// 			'name' => $name,
// 			'description' => $description,
// 			// 'img' => $_POST['img'],
// 			'price' => $price,
// 			'count' => $count,
// 			'characteristic' => $characteristic,
// 			'id_type_product' => $category
// 		];
// 		// tt($product);
// 		$product = update('product', $id, $product);
// 		header('location:' . BASE_URL . 'admin/products/index.php');
// 	}
// }




// //delete post
// if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
// 	$id = $_GET['delete_id'];
// 	delete('product', $id);
// 	header('location:' . BASE_URL . 'admin/products/index.php');
// }