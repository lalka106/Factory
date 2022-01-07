<header class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-4">
				<h1>Завод СВТ</h1>
			</div>
			<nav class="col-8">
				<ul>
					<li>
						<a href="#">
							<i class="fa fa-user" aria-hidden="true"></i>
							<?php echo $_SESSION['login']; ?>
						</a>
					</li>
					<li><a href="<?php echo BASE_URL . "logout.php" ?>">Выход</a></li>
				</ul>
			</nav>

			<div class="header__burger">
				<span></span>
			</div>
		</div>
	</div>

</header>