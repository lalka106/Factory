<header class="header">
	<div class="container">
		<div class="row">
			<div class="col-2">
				<h1>Завод СВТ</h1>
			</div>
			<nav class="col-8">
				<ul class="1">
					<li><a title="Страница с описанией сферы деятельности предприятия" href="<?php echo BASE_URL . "index.php" ?>">Главная</a></li>
					<li><a href="#">О компании</a>
						<ul>
							<li><a title="Каталог товаров, производимых заводом" href="<?php echo BASE_URL . "catalog.php" ?>">Продукция</a></li>
							<li><a title="Способы связи с предприятием" href="<?php echo BASE_URL . "contact.php" ?>">Контакты</a></li>
						</ul>
					</li>
					<li><a title="Последние и актуальные новости" href="<?php echo BASE_URL . "news.php" ?>">Новости</a></li>
					<li><a title="Наши партнеры" href="<?php echo BASE_URL . "dealers.php" ?>">Дилеры</a></li>
					<li>
						<?php if (isset($_SESSION['id'])) : ?>
							<a href="#">
								<i class="fa fa-user" aria-hidden="true"></i>
								<?php echo $_SESSION['login']; ?>
							</a>
							<ul>
								<?php if ($_SESSION['admin']) : ?>
									<li><a title="Страница для управления сайтом" href="<?php echo BASE_URL . "admin/posts/index.php" ?>">Админ панель</a></li>
								<?php endif; ?>
								<li><a title="Ваш профиль, в котором будут находится заказы" href="<?php echo BASE_URL . "profile.php" ?>">Профиль</a></li>

								<li><a title="Выход из аккаунта" href="<?php echo BASE_URL . "logout.php" ?>">Выход</a></li>
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
					<li class="col-2">

						<button id="get-cart" type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart-modal">
							Корзина <span class="badge badge-light mini-cart-qty"><?= $_SESSION['cart.count'] ?? 0 ?></span>
						</button>

					</li>

				</ul>

			</nav>

			<div class="header__burger">
				<span></span>
			</div>

		</div>
	</div>

</header>