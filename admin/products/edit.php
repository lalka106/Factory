<?php
include "../../path.php";
include "../../app/controllers/products.php";
// $product = selectONE('product', ['id' => $_GET['id']]);
// // tt($product);
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
					<h2>Редактирование продуктов</h2>
				</div>
				<div class="error mb-12 col-12 col-md-12">
					<?php include "../../app/helps/error_info.php" ?>
				</div>
				<div class="row add-post">
					<form action="edit.php" method="POST" enctype="multipart/form-data">
						<input value="<?= $id; ?>" name="id" type="hidden">

						<div class="col mb-4">
							<input value="<?= $product['name'] ?>" name="name" type="text" class="form-control" placeholder="Title" aria-label="Название новости">
						</div>
						<div class="col mb-4">
							<input value="<?= $product['description'] ?>" name="description" type="text" class="form-control" placeholder="Title" aria-label="Название новости">
						</div>
						<div class="col mb-4">
							<label for="editor" class="form-label">Характеристики</label>
							<textarea name="characteristic" class="form-control" id="editor" rows="6"><?= $product['characteristic']; ?></textarea>
						</div>
						<div class="col mb-4">
							<input value="<?= $product['price'] ?>" name="price" type="number" class="form-control" placeholder="Title" aria-label="Название новости">
						</div>
						<div class="col mb-4">
							<input value="<?= $product['count'] ?>" name="count" type="number" class="form-control" placeholder="Title" aria-label="Название новости">
						</div>
						<div class="input-group col mb-4 mt-4">
							<input name="img" type="file" class="form-control" id="inputGroupFile02">
							<label class="input-group-text" for="inputGroupFile02">Upload</label>
						</div>
						<label for="">Категория</label>

						<select name="category" class="form-select mb-4" aria-label="Default select example">
							<?php foreach ($types_product as $key => $category) : ?>
								<option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
							<?php endforeach; ?>
						</select>
						<!-- <div class="form-check">
							<?php if (empty($publish) && $publish == 0) : ?>
								<input name="publish" class="form-check-input" type="checkbox" id="flexCheckDefault">
								<label class="form-check-label" for="flexCheckDefault">
									Опубликовать ?
								</label>
							<?php else : ?>
								<input name="publish" class="form-check-input" type="checkbox" id="flexCheckDefault" checked>
								<label class="form-check-label" for="flexCheckDefault">
									Опубликовать ?
								</label>
							<?php endif; ?>
						</div> -->
						<div class="col col-6">
							<button name="edit-product" class="btn btn-primary" type="submit">Save</button>
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