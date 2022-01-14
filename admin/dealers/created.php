<?php
include "../../path.php";
include "../../app/controllers/dealers.php";

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
					<a class="col-3 btn btn-success" href="<?php echo BASE_URL . "admin/dealers/created.php" ?>">Add dealer</a>
					<span class="col-1"></span>
					<a class="col-3 btn btn-success" href="<?php echo BASE_URL . "admin/dealers/index.php" ?>">Manage dealers</a>
				</div>
				<div class="row title-table">
					<h2>Добавление дилера</h2>
				</div>
				<div class="error mb-12 col-12 col-md-12">
					<?php include "../../app/helps/error_info.php" ?>
				</div>
				<div class="row add-post">
					<form action="created.php" method="POST" enctype="multipart/form-data">
						<div class="col mb-4">
							<input value="<?= $title; ?>" name="title" type="text" class="form-control" placeholder="Title" aria-label="dealer">
						</div>
						<div class="col mb-4">
							<input value="<?= $adress; ?>" name="adress" type="text" class="form-control" placeholder="adress" aria-label="adress">
						</div>
						<div class="col mb-4">
							<input value="<?= $email; ?>" name="email" type="email" class="form-control" placeholder="email" aria-label="email">
						</div>
						<div class="col mb-4">
							<input value="<?= $phone; ?>" name="phone" type="text" class="form-control" placeholder="phone" aria-label="phone">
						</div>
						<div class="input-group col mb-4 mt-4">
							<input name="img" type="file" class="form-control" id="inputGroupFile02">
							<label class="input-group-text" for="inputGroupFile02">Upload</label>
						</div>
						<label for="">Директор</label>

						<select name="director" class="form-select mb-4" aria-label="Default select example">
							<?php foreach ($directors as $key => $director) : ?>
								<option value="<?= $director['id'] ?>"><?= $director['surname'] . ' ' . $director['name'] . ' ' . $director['patronymic']  ?></option>
							<?php endforeach; ?>
						</select>
						<div class="form-check">
							<input name="publish" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
							<label class="form-check-label" for="flexCheckDefault">
								Опубликовать ?
							</label>
						</div>
						<div class="col col-6">
							<button name="add-dealer" class="btn btn-primary" type="submit">Save</button>
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