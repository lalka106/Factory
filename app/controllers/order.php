<?php
//include_once("path.php");

include_once SITE_ROOT . "/app/database/db.php";

//if (empty($_SESSION['id'])) {
////    array_push($errorMessage,'Требуется вход');
//    header('location:' . BASE_URL . 'aut.php');
//}

$errorMessage = [];
$id = '';
$id_user = '';
$fio = '';
$count = '';
$result = '';
$id_product = '';

// tt($_GET);
//$product = selectONE('product', ['id' => $_GET['product']]);
//$user = selectONE('users', ['id' => $_SESSION['id']]);
// tt($product);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order'])) {
    foreach ($_SESSION['cart'] as $id => $item) {
        $id_product = $id;
//        tt($id);
//        $product = selectONE('product', ['id' => $id_product]);
        $fio = trim($_SESSION['fio']);
        $id_user = trim($_SESSION['id']);
        $count = trim($item['count_choose']);
        if ($count > $item['count']) {
            echo "<script>alert(\"Нехватает количества.\");</script>";
//            header('location:' . BASE_URL . 'single_product');
            return;
        } elseif ($count == 0) {
            alert('>0');
            return;
        }

        $order = [
            'id_product' => $id_product,
            'count' => $count,
            'id_user' => $id_user,
            'result' => $item['total_sum']
        ];
//	 tt($order);
        $order = insert('product_order', $order);
        //$order = selectONE('product_order', ['id' => $id]);
        if (!empty($_SESSION['cart'])) {
            unset($_SESSION['cart']);
            unset($_SESSION['cart.sum']);
            unset($_SESSION['cart.count']);
        }
        header('location:' . BASE_URL . 'profile.php');
        update('product', $id_product, ['count' => $item['count'] - $count]);
    }
} else {
    $fio = '';
    $result = '';
    $count = '';
}






//for old version

////create post
//if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['product'])) {
//	$id = $_GET['product'];
//	$product = selectONE('product', ['id' => $id]);
//    $id = $product['id'];
//}
//if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order'])) {
//
//	$id_product = $_POST['id'];
//    $product = selectONE('product',['id'=>$id_product]);
//	$fio = trim($_POST['fio']);
//	$id_user = trim($_SESSION['id']);
//	$count = trim($_POST['count']);
//	 if ($count > $product['count']) {
//	 	array_push($errorMessage,'Нехватает количества');
//         return;
//	 } elseif ($count < 0) {
//         array_push($errorMessage,'>0');
//         return;
//     }
//    $result = $product['price']*$count;
//
//    $order = [
//		'id_product' => $id_product,
//		'count' => $count,
//		'id_user' => $id_user,
//		'result' => $result
//	];
////	 tt($order);
//	$order = insert('product_order', $order);
//	$order = selectONE('product_order', ['id' => $id]);
//	header('location:' . BASE_URL . 'profile.php');
//    update('product', $id_product, ['count' => $product['count'] - $count]);
//} else {
//	$fio = '';
//	$result = '';
//	$count = '';
//}


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
