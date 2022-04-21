<?php include("path.php");
include("app/database/db.php");
// $dealers = selectAll('dealers', ['status' => 1]);
$dealers = selectAllDirectorsForDealers('dealers', 'directors');
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
	<title>Дилеры</title>
</head>

<body>
	<?php include("app/include/header.php"); ?>



	<div class="container">
		<div class="container row">

			<!-- <?php include("app/include/sidebar-catalog.php"); ?> -->

			<div class="main-content col-md-9 col-12">
				<h2>Дилеры</h2>

				<?php foreach ($dealers as $dealer) : ?>
					<div class="post row">
						<div class="post_img col-12 col-md-4">
							<img class="img-thumbnail" src="<?= BASE_URL . 'assets/img/dealers/' . $dealer['img'] ?>" alt="<?= $dealer['title'] ?>">
						</div>
						<div class="post_text col-12 col-md-8">
							<h4><?= $dealer['title'] ?></h4>
							<p class="diler-text">
								Адрес –
								<i class="fa fa-map-marker" aria-hidden="true"></i>
								<?= $dealer['adress'] ?>
							</p>
							<p class="diler-text">
								Директор –
								<i class="fa fa-id-card" aria-hidden="true"></i><?= $dealer['surname'] . ' ' . $dealer['name'] . ' ' . $dealer['patronymic'] ?>
							</p>
							<p class="diler-text">
								Телефон –
								<i class="fa fa-phone" aria-hidden="true"></i><?= $dealer['phone'] ?>
							</p>
							<p class="diler-text">
								E-mail –
								<i class="fa fa-envelope" aria-hidden="true"></i><?= $dealer['email'] ?>
							</p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<?php include("app/include/sidebar_catalog.php"); ?>

		</div>
	</div>
    <?php include('app/include/modal+scripts.php'); ?>

</body>

</html>