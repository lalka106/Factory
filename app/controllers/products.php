<?php
include SITE_ROOT . "/app/database/db.php";

if (!$_SESSION) {
    header('location:' . BASE_URL . 'aut.php');
}

$errorMessage = [];
$id = '';
$name = '';
$description = '';
$characteristic = '';
$img = '';
$price = '';
$count = '';
$category = '';


$products = selectAll('product');
$types_product = selectAll('type_product');


//create post
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-product'])) {
    if (!empty($_FILES['img']['name'])) {
        $imageName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . '\assets\img\news\\' . $imageName;

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
    $description = trim($_POST['description']);
    $characteristic = trim($_POST['characteristic']);
    $price = $_POST['price'];
    $count = $_POST['count'];
    if ($count <= 0 || $price <= 0) {
        array_push($errorMessage, '>0');
        return;
    }
    $category = trim($_POST['category']);
    if ($name === '' || $description === '') {
        array_push($errorMessage, 'Не все поля заполненны!');
    } elseif (mb_strlen($name, 'UTF8') < 3) {
        array_push($errorMessage, 'Название товара должно быть более 3-х символов');
    } elseif (mb_strlen($characteristic, 'UTF8') > 1000) {
        array_push($errorMessage, 'Характеристика должна быть менее 1000-и символов');
    } elseif (mb_strlen($description, 'UTF8') > 255) {
        array_push($errorMessage, 'Описание должно быть менее 255-и символов');
    } else {
        $existence = selectONE('product', ['name' => $name]);

        if (!empty($existence['name']) && $existence['name'] === $name) {
            array_push($errorMessage, 'Такой продукт уже существует');
        } else {
            $product = [
                'name' => $name,
                'description' => $description,
                'img' => $_POST['img'],
                'price' => $price,
                'count' => $count,
                'characteristic' => $characteristic,
                'id_type_product' => $category
            ];
            $product = insert('product', $product);
            $product = selectONE('product', ['id' => $id]);
            header('location:' . BASE_URL . 'admin/products/index.php');
        }
    }
} else {
    $name = '';
    $description = '';
    $characteristic = '';
    $img = '';
    $price = '';
    $count = '';
}


//edit post
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = selectONE('product', ['id' => $id]);
    $id = $product['id'];
    $name = $product['name'];
    $description = $product['description'];
    $characteristic = $product['characteristic'];
    $price = $product['price'];
    $img = $product['img'];
    $count = $product['count'];
    $category = $product['id_type_product'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-product'])) {
    if (!empty($_FILES['img']['name'])) {
        $imageName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . '\assets\img\news\\' . $imageName;

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
    }
    else {
        array_push($errorMessage, 'Ошибка получения изображения');
    }
    $id = $_POST['id'];
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $characteristic = trim($_POST['characteristic']);
    $price = trim($_POST['price']);
    $count = trim($_POST['count']);
    if ($count <= 0 || $price <= 0) {
        array_push($errorMessage, '>0');
        return;
    }
    $category = trim($_POST['category']);

    if ($name === '' || $description === '') {
        array_push($errorMessage, 'Не все поля заполненны!');
    } elseif (mb_strlen($name, 'UTF8') < 3) {
        array_push($errorMessage, 'Название поста должно быть более 3-х символов');

    } elseif (mb_strlen($characteristic, 'UTF8') > 1000) {
        array_push($errorMessage, 'Характеристика должна быть менее 1000-и символов');
    } elseif (mb_strlen($description, 'UTF8') > 255) {
        array_push($errorMessage, 'Описание должно быть менее 255-и символов');
    } else {
        $product = [
            'name' => $name,
            'description' => $description,
            // 'img' => $_POST['img'],
            'price' => $price,
            'count' => $count,
            'characteristic' => $characteristic,
            'id_type_product' => $category
        ];
        // tt($product);
        $product = update('product', $id, $product);
        header('location:' . BASE_URL . 'admin/products/index.php');
    }
}


//delete post
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete('product', $id);
    header('location:' . BASE_URL . 'admin/products/index.php');
}
