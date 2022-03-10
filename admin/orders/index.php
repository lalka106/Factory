<?php
include "../../path.php";
include "../../app/controllers/order.php";
$orders = selectAll('product_order',[]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link rel="stylesheet" href="../../css/style.css">
	<title>Главная</title>
</head>

<body>
	<?php include("../../app/include/header_admin.php"); ?>

	<div class="container">
		<div class="row">
			<?php include("../../app/include/sidebar-admin.php"); ?>

			<div class="posts col-9">
<!--				<div class="button row">-->
<!--					<a class="col-3 btn btn-success" href="--><?php //echo BASE_URL . "admin/posts/created.php" ?><!--">Add Post</a>-->
<!--					<span class="col-1"></span>-->
<!--					<a class="col-3 btn btn-success" href="--><?php //echo BASE_URL . "admin/posts/index.php" ?><!--">Manage Posts</a>-->
<!--				</div>-->
				<div class="row title-table">
					<h2>Управление заказами</h2>
					<div class=" col-1">ID</div>
					<div class=" col-2">Товар</div>
					<div class=" col-2">Количество</div>
					<div class=" col-2">Заказчик</div>
					<div class=" col-2">Итого</div>
                    <div class=" col-2">Статус</div>
				</div>
				<?php foreach ($orders as $key => $order) : ?>
					<div class="row post">
						<div class="id col-1"><?= $key + 1; ?></div>
						<div class="title col-2"><?= $order['id_product'] ?></div>
						<div class="title col-2"><?= $order['count'] ?></div>
						<div class="title col-2"><?= $order['id_user'] ?></div>
                        <div class="title col-2"><?= $order['result'] ?></div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>



	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>