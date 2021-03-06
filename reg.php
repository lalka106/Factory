<?php include("path.php"); ?>
<?php include("app/controllers/users.php"); ?>

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
		<h2>Форма регистрации</h2>

		<form class="row justify-content-center" method="post" action="reg.php">
			<div class="error mb-3 col-12 col-md-4">
				<?php include "app/helps/error_info.php" ?>
			</div>
			<div class="w-100"></div>

			<div class="mb-3 col-12 col-md-4">
				<label for="formGroupExampleInput" class="form-label">Логин</label>
				<input name="login" value="<?= $login ?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
			</div>
			<div class="w-100"></div>
			<div class="mb-3 col-12 col-md-4">
				<label for="exampleInputEmail1" class="form-label">Email</label>
				<input name="email" value="<?= $email ?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
			</div>
            <div class="w-100"></div>

            <div class="mb-3 col-12 col-md-4">
				<label for="exampleInputEmail1" class="form-label">ФИО</label>
				<input name="fio" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			</div>
			<div class="w-100"></div>

			<div class="mb-3 col-12 col-md-4">
				<label for="exampleInputPassword1" class="form-label">Пароль</label>
				<input name="pass1" type="password" class="form-control" id="exampleInputPassword1">
			</div>
			<div class="w-100"></div>

			<div class="mb-3 col-12 col-md-4">
				<label for="exampleInputPassword2" class="form-label">Повтор пароля</label>
				<input name="pass2" type="password" class="form-control" id="exampleInputPassword2">
			</div>
			<div class="w-100"></div>

			<div class="mb-3 col-12 col-md-4">
				<button name="button-reg" type="submit" class="btn btn-primary">Зарегистрироваться</button>
				<a href="aut.php">Авторизоваться</a>
			</div>

		</form>
	</div>
    <?php include('app/include/modal+scripts.php'); ?>
</body>

</html>