<header class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-4">
				<h1>Завод СВТ</h1>
			</div>
			<nav class="col-8">
				<ul>
					<li><a href="<?php echo BASE_URL . "index.php" ?>">Главная</a></li>
					<li><a href="#">О компании</a>
						<ul>
							<li><a href="#">Продукция</a></li>
							<li><a href="#">Контакты</a></li>
						</ul>
					</li>
					<li><a href="<?php echo BASE_URL . "news.php" ?>">Новости</a></li>
					<li><a href="<?php echo BASE_URL . "dealers.php" ?>">Дилеры</a></li>
					<li>
						<?php if (isset($_SESSION['id'])) : ?>
							<a href="#">
								<i class="fa fa-user" aria-hidden="true"></i>
								<?php echo $_SESSION['login']; ?>
							</a>
							<ul>
								<?php if ($_SESSION['admin']) : ?>
									<li><a href="<?php echo BASE_URL . "admin/posts/index.php" ?>">Админ панель</a></li>
								<?php endif; ?>
								<li><a href="<?php echo BASE_URL . "logout.php" ?>">Выход</a></li>
							</ul>

						<?php else : ?>
							<a href="<?php echo BASE_URL . "aut.php" ?>">
								<i class="fa fa-user" aria-hidden="true"></i>
								Вход
							</a>
							<ul>
								<li><a href="<?php echo BASE_URL . "reg.php" ?>">Регистрация</a></li>
							</ul>
						<?php endif; ?>
					</li>

				</ul>
			</nav>

			<div class="header__burger">
				<span></span>
			</div>
		</div>
	</div>

</header>