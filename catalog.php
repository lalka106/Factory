<?php
include("path.php");
include("app/database/db.php");

$types = selectAll('type_catalog');
// tt($_FILES);
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
<!--				--><?php //include("app/include/sidebar_catalog.php"); ?>

				<div class="catalog col">
					<div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3">
						<?php foreach ($types as $type) : ?>

							<div class="card">
								<div class="single_post_img">
									<img class="img-thumbnail" src="<?= BASE_URL . 'assets/img/type/' . $type['img'] ?>" alt="">
								</div>
								<div class="card__title"><a href="<?= BASE_URL . 'radio-tech.php?type=' . $type['id']; ?>"><?= $type['name'] ?></a></div>
								<div class="card__subtitle"><?= $type['content'] ?></div>
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