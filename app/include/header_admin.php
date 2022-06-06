<header class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-2">
				<h1>Завод СВТ</h1>
			</div>
			<nav class="col-8">
				<ul>
                    <li style="text-align: center" >
                        <a style="text-align: center" href="<?php echo BASE_URL . "spravka_admin.php" ?>"><h6>Справка<i style="text-align: center" class="fa fa-question" aria-hidden="true"></i></h6></a>
                    </li>
					<li>
						<a href="<?php echo BASE_URL . "admin/posts/index.php" ?>">
							<i class="fa fa-user" aria-hidden="true"></i>
							<?php echo $_SESSION['login']; ?>
						</a>
					</li>
					<li><a href="<?php echo BASE_URL . "index.php" ?>">Выход</a></li>
				</ul>
			</nav>

			<div class="header__burger">
				<span></span>
			</div>
		</div>
	</div>

</header>