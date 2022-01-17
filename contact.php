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

				<div class="contact col">
					<div class="row">
						<strong><i>Реквизиты предприятия:</i></strong>
						<ul class="rubles">
							<li><i><a href="">в белорусских рублях</a></i></li>
							<li><i><a href="">в российских рублях</a></i></li>
							<li><i><a href="">в евро</a></i></li>
						</ul>
					</div>
					<div class="row">
						<i><strong>Директор:</strong> Миклашевич Валентин Альфредович</i>
						<strong><i>Приемная:</i></strong><i>Тел.: +375 17 293-94-68, Факс: +375 17 284-46-47, e-mail: <a href="">office@zsvt.by</a></i>
					</div>
					<div class="row">
						<i><strong>Главный инженер:</strong> Василевский Владимир Викторович</i>
						<i>Тел.: +375 17 290-28-59, моб. тел.: +375 29 505-08-98,
							e-mail: <a href="">glin@zsvt.ru</a></i>
					</div>
					<div class="row">
						<i><strong>Начальник отдела материально-технического снабжения:</strong> Прокопович Владимир Леонидович</i><i>Тел./факс: +375 17 290-97-42, e-mail: <a href="">omts@zsvt.by</a>
						</i>
					</div>
					<div class="row">
						<strong><i>Бухгалтерия:</i></strong><i>Тел: +375 17 290-97-41</a>
						</i>
					</div>
					<div class="row">
						<strong><i>Отдел маркетинга и продаж: </i></strong>
						<i><strong>Началник отдела:</strong> Малышева Алеся Леонидовна</i><i>Тел: +375 17 290-28-59, e-mail: <a href="">marketing@zsvt.ru</a></i>
						<span><i>Отдел продаж:</i></span>
						<i>Многоканальный телефон: +375-17-2902859 (при звонке из РФ набирайте 8-10-37517-2902859)</i>
						<strong><i>Отдел маркетинга и продаж: </i></strong>
						<i>Козлов Владимир</i>
						<i>Тел: +375 17 399-10-54, доб. 129 e-mail: <a href="">remont@zsvt.by</a></i>
					</div>
					<div class="row">
						<i><strong>Главный инженер проекта:</strong> Пасевин Дмитрий Анатольевич</i><i>Тел.: +375 17 399-10-56, e-mail: <a href="">video@zsvt.by</a>
						</i>
					</div>
					<div style="position:relative;overflow:hidden;text-align:center;"><a href="https://yandex.by/maps/157/minsk/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Минск</a><a href="https://yandex.by/maps/157/minsk/?ll=27.588966%2C53.916044&mode=usermaps&um=mymaps%3AeM5YuQhI_j0YM9fRn-OI35BNsIrSwM0j&utm_medium=mapframe&utm_source=maps&z=16" style="color:#eee;font-size:12px;position:absolute;top:14px;">Яндекс.Карты — транспорт, навигация, поиск мест</a><iframe src="https://yandex.by/map-widget/v1/-/CCUynGVoSD" width="900" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
				</div>

			</div>
		</div>


		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>