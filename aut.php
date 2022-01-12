<?php include("path.php");

include("app/controllers/users.php"); ?>


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
	<div class="container reg_form">
		<h2>Форма авторизации</h2>

		<form class="row justify-content-center" method="post" action="aut.php">
			<div class="error mb-3 col-12 col-md-4">
				<?php include "app/helps/error_info.php" ?>
			</div>
			<div class="w-100"></div>

			<div class="mb-3 col-12 col-md-4">
				<label for="formGroupExampleInput" class="form-label">Email</label>
				<input name="email" value="<?= $email ?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			</div>
			<div class="w-100"></div>
			<div class="mb-3 col-12 col-md-4">
				<label for="exampleInputPassword1" class="form-label">Пароль</label>
				<input name="pass" type="password" class="form-control" id="exampleInputPassword1">
			</div>
			<div class="w-100"></div>

			<div class="mb-3 col-12 col-md-4">
				<button type="submit" name="button-log" class="btn btn-primary">Авторизоваться</button>
				<a href="reg.php">Зарегистрироваться</a>
			</div>

		</form>
	</div>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>