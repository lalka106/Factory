<?php
include("path.php");
include "app/controllers/types_catalog.php";
$product = selectONE('product', ['id' => $_GET['product']]);
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
	<title>Продукт</title>
</head>

<body>
	<?php include("app/include/header.php"); ?>


	<div class="main">

		<div class="container">
			<div class="main__row row">
				<!-- <div class="main__catalog">
					<h2 class="main__title">Уважаемые клиенты!
					</h2>
				</div> -->
				<div class="sidebar col-md-3 col-12">
					<div class="section catalog">
						<h3>Каталог</h3>
						<ul>
							<li><a href="">Радиоизмерительная техника</a></li>
							<li><a href="">Дозиметры</a></li>
							<li><a href="">ЖК-мониторы</a></li>
							<li><a href="">Автотракторная электроника</a></li>
							<li><a href="">Моноблоки INFOTON</a></li>
							<li><a href="">Видеонаблюдение</a></li>
							<li><a href="">Поверхностный монтаж SMD компонентов</a></li>
							<li><a href="">Автоматизация рабочих мест</a></li>
							<li><a href="">Лаборатория проверка</a></li>
						</ul>
					</div>
				</div>
				<div class="catalog col">
					<div class="info">
						<h2><?= $product['name'] ?></h2>
						<div class="single_post_img col-12 ">
							<img class="img-thumbnail" src="<?= BASE_URL . 'assets/img/news/' . $product['img'] ?>" alt="">
						</div>
						<p>Описание <?= $product['description'] ?></p>
						<p><?= $product['characteristic'] ?></p>
						<p>Цена <?= $product['price'] ?> руб.</p>
						<p>Количество <?= $product['count'] ?></p>
					</div>
					<div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3">

					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>