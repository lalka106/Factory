<?php
include("path.php");
include "app/controllers/order.php";

// include SITE_ROOT . "/app/database/db.php";
// $type = selectONE('type_product', ['id' => $_GET['type']]);

// tt($product);

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link rel="stylesheet" href="css/style.css">
	<title>Покупка</title>
</head>

<body>
	<?php include("app/include/header.php"); ?>
	<div class="order__title">
		<h2>Оформление заказа</h2>
	</div>
	<div class="order col-8">

		<div class="post_img col-12 col-md-4">
			<img class="img-thumbnail" src="<?= BASE_URL . 'assets/img/news/' . $product['img'] ?>" alt="<?= $product['name'] ?>">
		</div>
		<div class="order__info">
			<form action="buy.php" method="POST" enctype="multipart/form-data">

				<div>Название товара: <?= $product['name'] ?></div>
				<div>Стоимость товара: <?= $product['price'] ?> руб.</div>
				<div>Всего товара на складе: <?= $product['count'] ?> </div>
				<!-- <div>Количество товара для покупки: <input value="<?= $count; ?>" name="count" type="number" class="form-control" placeholder="count" aria-label="count"></div> -->
			</form>
		</div>

	</div>
	<div class="posts col-12">
		<div class="row title-table">
			<h2>Контактная информация</h2>
		</div>
		<div class="error mb-12 col-12 col-md-12">
			<?php include "app/helps/error_info.php" ?>
		</div>
		<div class="row add-post">
			<form action="buy.php" method="POST">
				<input value="<?= $product['id']; ?>" name="id" type="hidden">

				<div class="col">
					<label for="formGroupExampleInput" class="form-label">Логин</label>
					<input value="<?= $user['username']; ?>" name="login" disabled type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
				</div>
				<div class="col">
					<label for="exampleInputEmail1" class="form-label">Email</label>
					<input value="<?= $user['email']; ?>" name="email" disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
					<!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
				</div>

				<div class="col">
					<label for="exampleInputPassword1" class="form-label">ФИО</label>
					<input readonly name="fio" value="<?= $user['fio']?>" type="text" class="form-control" id="exampleInputPassword1">
				</div>

				<div class="col">
					<label for="exampleInEmail1" class="form-label">Количество товара для покупки</label>
					<input value="<?= $count ?>" name="count" type="number" class="form-control" placeholder="count" aria-label="count">
				</div>
				<div class="col">
					<label for="exampEmail1" class="form-label">Итого</label>
					<input value="<?= $result  ?>" name="result" type="number" class="form-control" placeholder="result" aria-label="result">
				</div>
				<div class="col">
					<button name="order" class="btn btn-primary" type="submit">Заказать</button>
				</div>
			</form>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="../../assets/js/script.js"></script>

</body>

</html>