<?php

include SITE_ROOT . "/app/database/db.php";


$errorMessage = [];
$id = '';
$description ='';
$orders = selectAll('product_order');
$product_status = selectAll('product_status');
//edit order
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $order = selectONE('product_order', ['id' => $id]);
    $status = $order['id_status'];
    $description = $order['description'];
    $id = $order['id'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-order'])) {
    $description = trim($_POST['description']);
    $status = trim($_POST['status']);
    $id = $_POST['id'];
    $changes = [
        'description' => $description,
        'id_status' => $status
    ];

//    tt($changes);
    $order_id = update('product_order', $id, $changes);
    header('location:' . BASE_URL . 'admin/orders/index.php');
}
