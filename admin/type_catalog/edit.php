<?php
// session_start();
include "../../path.php";
include "../../app/controllers/categories.php";
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
				<div class="row title-table">
					<h2>Редактирование акций</h2>
				</div>
				<div class="error mb-12 col-12 col-md-12">
					<?php include "../../app/helps/error_info.php" ?>
				</div>
				<div class="row add-post">
					<form action="edit.php" method="POST">
						<input name="id" value="<?= $id ?>" type="hidden">
						<div class="col mb-4">
							<input name="name" value="<?= $name ?>" type="text" class="form-control" placeholder="Title" aria-label="Название акции">
						</div>
						<div class="col">
							<label for="editor" class="form-label">Описание акции</label>
							<textarea name="description" class="form-control" id="editor" rows="6"><?= $description ?></textarea>
						</div>

						<div class="col mb-4">
							<button name="category-edit" class="btn btn-primary" type="submit">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="../../assets/js/script.js"></script>

</body>

</html>