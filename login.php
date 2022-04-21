<?php
include("path.php");
// include("app/database/db.php");
include("app/controllers/users.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Вход</title>
</head>

<body>
	<!-- @@include('_header.html') -->
	<?php include("app/include/header.php"); ?>

	<div class="login">
		<div class="container">
			<div class="login__title">ВХОД</div>
			<div class="login__form">
				<form action="login.php" method="POST">
					<input name="login" type="text" placeholder="Логин" class="login__input" required>
					<input name="email" type="email" placeholder="Email" class="login__input" required>
					<input name="pass1" type="password" class="login__input" placeholder="Пароль" required>
					<input name="pass2" type="password" class="login__input" placeholder="Повтор пароля" required>
					<div class="login__forgot">
						<input type="checkbox" id="login__checkbox">
						<label for="login__checkbox">Запомнить меня</label>
						<a href="">
							<div>Забыли пароль?</div>
						</a>
					</div>
					<div class="login__button"><button type="submit" name="button_reg">Войти</button></div>
				</form>
			</div>
		</div>
	</div>

	<?php include('app/include/modal+scripts.php'); ?>

</body>

</html>