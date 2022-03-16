<?php
include "../../path.php";
include "../../app/controllers/users.php";

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
					<a class="col-3 btn btn-success" href="<?php echo BASE_URL . "admin/users/created.php" ?>">Add user</a>
					<span class="col-1"></span>
					<a class="col-3 btn btn-success" href="<?php echo BASE_URL . "admin/users/index.php" ?>">Manage users</a>
				</div>
				<div class="row title-table">
					<h2>Редактирование пользователя</h2>
				</div>
				<div class="error mb-12 col-12 col-md-12">
					<?php include "../../app/helps/error_info.php" ?>
				</div>
				<div class="row add-post">
					<form action="edit.php" method="POST">
						<input name="id" value="<?= $id; ?>" type="hidden">

						<div class="col">
							<label for="formGroupExampleInput" class="form-label">Логин</label>
							<input name="login" value="<?= $username; ?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
						</div>
						<div class="col">
							<label for="exampleInputEmail1" class="form-label">Email</label>
							<input readonly name="email" value="<?= $email; ?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
							<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
						</div>
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">ФИО</label>
                            <input name="fio" value="<?= $fio; ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
						<div class="col">
							<label for="exampleInputPassword1" class="form-label">Пароль</label>
							<input name="pass1" type="password" class="form-control" id="exampleInputPassword1">
						</div>

						<div class="col">
							<label for="exampleInputPassword2" class="form-label">Повтор пароля</label>
							<input name="pass2" type="password" class="form-control" id="exampleInputPassword2">
						</div>
						<div class="form-check">
							<?php if (empty($admin) && $admin == 0) : ?>
								<input name="admin" class="form-check-input" value="1" type="checkbox" id="flexCheckDefault">
								<label class="form-check-label" for="flexCheckDefault">
									Admin ?
								</label>
							<?php else : ?>
								<input name="admin" class="form-check-input" value="1" type="checkbox" id="flexCheckDefault" checked>
								<label class="form-check-label" for="flexCheckDefault">
									Admin ?
								</label>
							<?php endif; ?>

						</div>
						<div class="col">
							<button name="update-user" class="btn btn-primary" type="submit">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>



	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>