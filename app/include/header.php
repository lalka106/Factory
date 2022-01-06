<header class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-4">
				<h1>Завод СВТ</h1>
			</div>
			<nav class="col-8">
				<ul>
					<li><a href="index.php">Главная</a></li>
					<li><a href="#">О компании</a>
						<ul>
							<li><a href="#">Продукция</a></li>
							<li><a href="#">Контакты</a></li>
						</ul>
					</li>
					<li><a href="news.php">Новости</a></li>
					<li><a href="#">Дилеры</a></li>
					<li>
						<?php if (isset($_SESSION['id'])) : ?>
							<a href="#">
								<i class="fa fa-user" aria-hidden="true"></i>
								<?php echo $_SESSION['username']; ?>
							</a>
							<ul>
								<?php if ($_SESSION['admin']) : ?>
									<li><a href="#">Админ панель</a></li>
								<?php endif; ?>
								<li><a href="#">Выход</a></li>
							</ul>
					</li>

				<?php else : ?>
					<a href="#">
						<i class="fa fa-user" aria-hidden="true"></i>
						Вход
					</a>
					<ul>
						<li><a href="reg.php">Регистрация</a></li>
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