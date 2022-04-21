<?php
include("path.php");
include "app/controllers/types_catalog.php";
// tt($_GET);
$type = selectONE('type_catalog', ['id' => $_GET['type']]);
$type_product = selectAll('type_product', ['id_type_catalog' => $type['id']]);
// tt($type_product);
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
	<title>Главная</title>
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
				<?php include("app/include/sidebar_catalog.php"); ?>

				<div class="catalog col">
					<div class="info">
						<h2><?= $type['name'] ?></h2>
						<?= $type['description'] ?>
					</div>
					<div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3">
						<?php foreach ($type_product as $type) : ?>
							<div class="card">
								<img src="assets/img/laboratory.jpg" alt="">
								<div class="card__title"><a href="<?= BASE_URL . 'products.php?type=' . $type['id']; ?>"><?= $type['name'] ?></a></div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>


    <?php include('app/include/modal+scripts.php'); ?>
</body>

</html>