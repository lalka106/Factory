<?php
// session_start();
include "../../path.php";
include SITE_ROOT . "/app/controllers/sales.php";
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
				<div class="button row">
					<a class="col-3 btn btn-success" href="<?php echo BASE_URL . "admin/sales/created.php" ?>">Add sale</a>
					<span class="col-1"></span>
					<a class="col-3 btn btn-success" href="<?php echo BASE_URL . "admin/sales/index.php" ?>">Manage sales</a>
				</div>
				<div class="row title-table">
					<h2>Управление акциями</h2>
					<div class=" col-1">ID</div>
					<div class=" col-4">TITLE</div>
					<div class=" col-4">Manage</div>
				</div>
				<?php foreach ($sales as $key => $sale) : ?>
					<div class="row post">
						<div class="id col-1"><?= $key + 1; ?></div>
						<div class="title col-4"><?= $sale['name']; ?></div>
						<div class="edit col-2"><a href="edit.php?id=<?= $sale['id']; ?>">Edit</a></div>
						<div class="delete col-2"><a href="edit.php?delete_id=<?= $sale['id']; ?>">Delete</a></div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>



	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>