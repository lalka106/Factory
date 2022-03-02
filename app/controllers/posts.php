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
	$id = '';
	$title = '';
	$content = '';
	$publish  = '';
	$category = '';
}


//edit post
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
	$id = $_GET['id'];
	$post = selectONE('posts', ['id' => $id]);
	$id = $post['id'];
	$title = $post['title'];
	$content = $post['content'];
	$category = $post['id_category'];
	$publish = $post['status'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-post'])) {
	$id = $_POST['id'];
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
		// tt($_POST);
		$post = update('posts', $id, $post);
		header('location:' . BASE_URL . 'admin/posts/index.php');
	}
}

//status post'a
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])) {
	$id = $_GET['pub_id'];
	$publish = $_GET['publish'];
	$postID = update('posts', $id, ['status' => $publish]);
	header('location:' . BASE_URL . 'admin/posts/index.php');
	die();
}



//delete post
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
	$id = $_GET['delete_id'];
	delete('posts', $id);
	header('location:' . BASE_URL . 'admin/posts/index.php');
}
