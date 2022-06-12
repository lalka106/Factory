<?php
error_reporting(-1);
//session_start();
include("path.php");
include("app/database/db.php");

if(isset($_GET['cart'])) {
    switch ($_GET['cart']) {
        case 'add':
            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
            $product = selectONE('product',['id'=>$id]);
            if(!$product) {
                echo json_encode(['code'=>'error','answer'=>'Требуется авторизация']);
//                header('location:' . BASE_URL . 'aut.php');

            }
            else {
                add_to($product);
                ob_start();
                require __DIR__ . '/basket-modal.php';
                $cart = ob_get_clean();
                echo json_encode(['code' => 'ok', 'answer' => $cart]);
            }
            break;
        case 'show':
            require __DIR__ . '/basket-modal.php';
            break;
        case 'clear':
            if (!empty($_SESSION['cart'])) {
                unset($_SESSION['cart']);
                unset($_SESSION['cart.sum']);
                unset($_SESSION['cart.count']);
            }
            require __DIR__ . '/basket-modal.php';
            break;
    }
}