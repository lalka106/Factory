<?php

include SITE_ROOT . "/app/database/db.php";


$errorMessage = [];
$id = '';
$description ='';
$orders = selectAll('product_order');

//edit order
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $order = selectONE('product_order', ['id' => $id]);
    $id = $order['id'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-order'])) {
    $description = trim($_POST['status']);
    $id = $_POST['id'];
    $order_id = update('product_order', $id, ['description'=>$description]);
    header('location:' . BASE_URL . 'admin/orders/index.php');
}
