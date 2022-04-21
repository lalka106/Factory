<?php
include("path.php");
include "app/controllers/types_catalog.php";
$product = selectONE('product', ['id' => $_GET['product']]);
// tt($_SESSION);
//session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

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

				<div class="catalog col">
					<div class="info">
						<h2><?= $product['name'] ?></h2>
						<div class="single_post_img col-12 ">
<!--							<img class="img-thumbnail" src="--><?//= BASE_URL . 'assets/img/news/' . $product['img'] ?><!--" alt="">-->
						</div>
						<p>Описание <?= $product['description'] ?></p>
						<p><?= $product['characteristic'] ?></p>
						<p>Цена: <?= $product['price'] ?> руб.</p>
						<p>Всего в наличии: <?= $product['count'] ?></p>
					</div>
					<div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3">
                        <?php if (!empty($_SESSION['id'])) : ?>
                            <a class="btn btn-success add-to" data-id="<?= $product['id']?>">Buy</a>
<!--                            href="--><?//= BASE_URL . 'buy.php?product=' . $product['id']; ?><!--"-->
                        <?php else : ?>
                            <a href="<?= BASE_URL . 'aut.php'; ?>"><button class="btn btn-success add-to">Купить</button></a>
                        <?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>

    <?php include('app/include/modal+scripts.php'); ?>


</body>

</html>