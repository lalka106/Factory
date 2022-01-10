<?php
include SITE_ROOT . "/app/database/db.php";

if (!$_SESSION) {
	header('location:' . BASE_URL . 'aut.php');
}

$errorMessage = [];
$id = '';
$title = '';
$content = '';
$img = '';
$category = '';


$categories = selectAll('categories');
$posts = selectAll('posts');
$postsAdm = selectAllfromPostsWithUsers('posts', 'users');




//create post
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-post'])) {
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

	$title = trim($_POST['title']);
	$content = trim($_POST['content']);
	$category = trim($_POST['category']);
	$publish = isset($_POST['publish']) ? 1 : 0;

	if ($title === '' || $content === '') {
		array_push($errorMessage, 'Не все поля заполненны!');
	} elseif (mb_strlen($title, 'UTF8') < 7) {
		array_push($errorMessage, 'Название поста должно быть более 7-ми символов');
	} else {
		$post = [
			'id_user' => $_SESSION['id'],
			'title' => $title,
			'content' => $content,
			'img' => $_POST['img'],
			'status' => $publish,
			'id_category' => $category
		];

		$post = insert('posts', $post);
		$post = selectONE('posts', ['id' => $id]);
		header('location:' . BASE_URL . 'admin/posts/index.php');
	}
} else {
	$title = '';
	$content = '';
}


// //edit category
// if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
// 	$id = $_GET['id'];
// 	$category = selectONE('categories', ['id' => $id]);
// 	$id = $category['id'];
// 	$name = $category['name'];
// 	$description = $category['description'];
// }
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category-edit'])) {
// 	$name = trim($_POST['name']);
// 	$description = trim($_POST['description']);
// 	if ($name === '' || $description === '') {
// 		$errorMessage = 'Не все поля заполненны!';
// 	} elseif (mb_strlen($name, 'UTF8') < 2) {
// 		$errorMessage = "Название акции должна быть более 2-ух символов";
// 	} else {
// 		$category = [
// 			'name' => $name,
// 			'description' => $description
// 		];
// 		$id = $_POST['id'];
// 		$category_id = update('categories', $id, $category);
// 		header('location:' . BASE_URL . 'admin/categories/index.php');
// 	}
// }



// //delete category
// if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
// 	$id = $_GET['delete_id'];
// 	delete('categories', $id);
// 	header('location:' . BASE_URL . 'admin/categories/index.php');
// }
