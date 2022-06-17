<?php
include SITE_ROOT . "/app/database/db.php";


$errorMessage = [];
$id = '';
$name = '';
$description = '';
$img = '';
$types = selectAll('type_catalog');
$types_product = selectAll('type_product');



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
//    $content = trim($_POST['content']);
    $description = trim($_POST['description']);
    $category = trim($_POST['category']);
    if ($name === '' || $description === '') {
        array_push($errorMessage, 'Не все поля заполненны!');
    } elseif (mb_strlen($name, 'UTF8') < 2) {
        array_push($errorMessage, 'Название категории должно быть более 2-ух символов');
    } else {
        $existence = selectONE('type_product', ['name' => $name]);
        if ($existence['name'] === $name) {
            array_push($errorMessage, 'Категория с таким названием уже есть');
        } else {
            $type = [
                'name' => $name,
                'description' => $description,
                'img' => $_POST['img'],
                'id_type_catalog' => $category
            ];
            $type = insert('type_product', $type);
            $type = selectONE('type_product', ['id' => $id]);
            header('location:' . BASE_URL . 'admin/type_product/index.php');
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
    $type = selectONE('type_product', ['id' => $id]);
    $id = $type['id'];
    $name = $type['name'];
//    $content = $type['content'];
    $description = $type['description'];
    $img = $type['img'];
    $category = $type['id_type_catalog'];
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
//    $content = trim($_POST['content']);
    $description = trim($_POST['description']);
    $img = trim($_POST['img']);
    $category = trim($_POST['category']);
    if ($name === '' || $description === '') {
        array_push($errorMessage, 'Не все поля заполненны!');
    } elseif (mb_strlen($name, 'UTF8') < 2) {
        array_push($errorMessage, 'Название категории должно быть более 2-ух символов');
    } else {
        $type = [
            'name' => $name,
            'description' => $description,
            'img' => $img,
            'id_type_catalog' => $category
        ];
        // tt($_POST);
        $id = $_POST['id'];
        $type_id = update('type_product', $id, $type);
        header('location:' . BASE_URL . 'admin/type_product/index.php');
    }
}



//delete category
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete('type_product', $id);
    header('location:' . BASE_URL . 'admin/type_product/index.php');
}
