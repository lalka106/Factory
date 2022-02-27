<?php
include("path.php");
include("app/database/db.php");

$types = selectAll('type_catalog');
// tt($_FILES);
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


	<div class="main">

		<div class="container">
			<div class="main__row row">
				<!-- <div class="main__catalog">
					<h2 class="main__title">Уважаемые клиенты!
					</h2>
				</div> -->
				<div class="sidebar col-md-3 col-12">
					<div class="section catalog">
						<h3>Каталог</h3>
						<ul>
							<li><a href="">Радиоизмерительная техника</a></li>
							<li><a href="">Дозиметры</a></li>
							<li><a href="">ЖК-мониторы</a></li>
							<li><a href="">Автотракторная электроника</a></li>
							<li><a href="">Моноблоки INFOTON</a></li>
							<li><a href="">Видеонаблюдение</a></li>
							<li><a href="">Поверхностный монтаж SMD компонентов</a></li>
							<li><a href="">Автоматизация рабочих мест</a></li>
							<li><a href="">Лаборатория проверка</a></li>
						</ul>
					</div>
				</div>
				<div class="catalog col">
					<div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3">
						<?php foreach ($types as $type) : ?>

							<div class="card">
								<img src="<?= BASE_URL . 'assets/img/type/' . $type['img'] ?>" alt="<?= $type['name'] ?>">
								<div class="card__title"><a href="<?= BASE_URL . 'radio-tech.php?type=' . $type['id']; ?>"><?= $type['name'] ?></a></div>
								<div class="card__subtitle"><?= $type['content'] ?></div>
							</div>
						<?php endforeach; ?>
						<!-- 
						<div class="card">
							<img src="assets/img/dozimetri.jpg" alt="">
							<div class="card__title"><a href="">Дозиметры</a></div>
							<div class="card__subtitle">Измерение ионизирующего излучения</div>
						</div>

						<div class="card">
							<img src="assets/img/monitors.jpg" alt="">
							<div class="card__title"><a href="">ЖК-мониторы</a></div>
							<div class="card__subtitle">Белорусские мониторы INFOTON</div>
						</div>

						<div class="card">
							<img src="assets/img/monoblock.jpg" alt="">
							<div class="card__title"><a href="">Моноблоки INFOTON</a></div>
							<div class="card__subtitle">INFOTON Standart, Optima, Pro</div>
						</div>

						<div class="card">
							<img src="assets/img/kameri.jpg" alt="">
							<div class="card__title"><a href="">Видеонаблюдение</a></div>
							<div class="card__subtitle">Проектирование, монтаж и ТО систем видеонаблюдения</div>
						</div>
						<div class="card">
							<img src="assets/img/electronika.jpg" alt="">
							<div class="card__title"><a href="">Автотракторная электроника</a></div>
							<div class="card__subtitle">Автотракторная электроника и компоненты</div>
						</div>
						<div class="card">
							<img src="assets/img/komponent.jpg" alt="">
							<div class="card__title"><a href="">Поверхностный монтаж SMD компонентов</a></div>
							<div class="card__subtitle">Поверхностный монтаж SMD компонентов</div>
						</div>
						<div class="card">
							<img src="assets/img/avtomatization.jpg" alt="">
							<div class="card__title"><a href="">Автоматизация рабочих мест</a></div>
							<div class="card__subtitle">Создание автоматизированных рабочих мест,разработка и внедрение автоматизированных испытательных и метрологических стендов и др.</div>
						</div>
						<div class="card">
							<img src="assets/img/laboratory.jpg" alt="">
							<div class="card__title"><a href="">Лаборатория поверки</a></div>
							<div class="card__subtitle">Лаборатория поверки</div>
						</div> -->

					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>