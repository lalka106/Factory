<?php
include("path.php");
include "app/controllers/categories.php";
$posts = selectAll('posts', ['status' => 1]);
// tt($posts);
?>

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

	<!-- slider -->
	<div class="container">
		<!-- <h2 class="carousel-title">
			Последние новости
		</h2> -->
		<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
			</div>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<a href=""><img src="assets/img/akcia.jpg" class="d-block w-100" alt="..."></a>
					<div class="carousel-caption d-none d-md-block">
						<!-- <h5><a href="#">Обновление оборудования поверочной лаборатории</a></h5> -->
						<!-- <p>Оборудование нашей поверочной лаборатории пополнилось калибратором Н4-17. </p> -->
					</div>
				</div>
				<div class="carousel-item">
					<a href=""><img src="assets/img/mono.jpg" class="d-block w-100" alt="..."></a>
					<div class="carousel-caption d-none d-md-block">
						<!-- <h5><a href="">Продление срока действия сертификата соответствия</a></h5> -->
						<!-- <p>Some representative placeholder content for the second slide.</p> -->
					</div>
				</div>
				<div class="carousel-item">
					<a href=""><img src="assets/img/osci.jpg" class="d-block w-100" alt="..."></a>
					<div class="carousel-caption d-none d-md-block">
						<!-- <h5><a href="">Лаборатория поверки</a></h5> -->
						<!-- <p>Some representative placeholder content for the third slide.</p> -->
					</div>
				</div>
				<div class="carousel-item">
					<a href=""><img src="assets/img/s1-127jki.jpg" class="d-block w-100" alt="..."></a>
					<div class="carousel-caption d-none d-md-block">
						<!-- <h5><a href="">Лаборатория поверки</a></h5> -->
						<!-- <p>Some representative placeholder content for the third slide.</p> -->
					</div>
				</div>
				<div class="carousel-item">
					<a href=""><img src="assets/img/video.jpg" class="d-block w-100" alt="..."></a>
					<div class="carousel-caption d-none d-md-block">
						<!-- <h5><a href="">Лаборатория поверки</a></h5> -->
						<!-- <p>Some representative placeholder content for the third slide.</p> -->
					</div>
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
	</div>
	<!-- end -->


	<div class="main">

		<div class="container">
			<div class="main__row row">
				<!-- <div class="main__catalog">
					<h2 class="main__title">Уважаемые клиенты!
					</h2>
				</div> -->
				<?php include("app/include/sidebar_catalog.php"); ?>


				<div class="main__info col-md-6 col-12">
					<h2 class="main__title">Уважаемые клиенты!
					</h2>
					<h3 class="main__subtitle">
						<p>Мы рады приветствовать Вас на нашем сайте!</p>
						<p> Производственное унитарное предприятие "Завод СВТ" представляет широчайший ассортимент радиоизмерительных приборов: от профессиональных, предназначенных для решения сложнейших технических задач, до изделий, облегчающих Ваш труд по решению ежесекундных проблем в радиоэлектронике. И независимо от того, какое изделие Вы выберете для себя, его характеристики, функциональные возможности и продуманные эргономические решения позволят Вам решать необходимые задачи на высшем техническом уровне. Производственные мощности предприятия расположены в г. Минске, однако выпускаемая продукция хорошо известна не только на территории Республики Беларусь, но и за ее пределами: Российская Федерация, Казахстан, Литва, Германия, Япония.</p>
						<p> Осуществляется производство ЖК-мониторов и моноблоков для корпоративных и частных клиентов. Специалисты завода также готовы разработать и изготовить средства отображения информации «под ключ», включая системы видеонаблюдения, видеостены, информационные табло, промышленные и коммерческие дисплеи любых размеров и функционального назначения.</p>
						<p> Наши изделия мы адресуем не только профессионалам, но и требовательным рядовым пользователям. Предприятие "Завод СВТ" сегодня предлагает Вам наиболее передовые решения для реализации программ, связанных с использованием средств измерений и отображения. Обладая оптимальным сочетанием рабочих характеристик и сфокусированности на запросах потребителей, продукция производственного унитарного предприятия "Завод СВТ" обеспечит Вам эффективную работу, удовлетворение от своего труда и качественный результат.</p>
					</h3>
				</div>
				<div class="sidebar col-md-2 col-12">
					<div class="section search">
						<h3>Поиск</h3>
						<form action="search.php" method="post">
							<input type="text" name="search-term" class="text-input" placeholder="Введите искомое слово...">
						</form>
					</div>
					<div class="section topics">
						<h3>Новости</h3>
						<ul>
							<?php foreach ($posts as $key => $post) : ?>
								<li><a href="<?= BASE_URL . 'single_news.php?post=' . $post['id'] ?>"><?= $post['title']; ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="section categories">
						<h3>Категории</h3>
						<ul>
							<?php foreach ($categories as $key => $category) : ?>
								<li><a href="<?= BASE_URL . 'category.php?id=' . $category['id'] ?>"><?= $category['name']; ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<!-- <div class="main__search">
					<h2 class="main__title">Уважаемые клиенты!
					</h2>
				</div> -->
			</div>

		</div>
	</div>

	<footer class="footer container-fluid">
		<div class="footer-content container">
			<div class="row">
				<div class="footer-section about col-md-4 col-12">
					<h6> 2022 УП "Завод СВТ". Все права защищены.</h5>
				</div>
			</div>
		</div>
	</footer>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>