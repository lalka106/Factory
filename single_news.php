<?php include("path.php");
include("app/database/db.php");
$post = selectONE('posts', ['id' => $_GET['post']]);
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
	<title>Новости</title>
</head>

<body>
	<?php include("app/include/header.php"); ?>



	<div class="container">
		<div class="container row">

			<!-- <?php include("app/include/sidebar-catalog.php"); ?> -->

			<div class="main-content col-md-9 col-12">
				<h2>Обновление оборудования поверочной лаборатории</h2>
				<div class="single_post row">

					<div class="single_post_text col-12 ">
						<div class="single_post_info">
							Создано <i class="far fa-calendar"> 30.03.2021 в 08:29</i>

						</div>
						<p>Оборудование нашей поверочной лаборатории пополнилось калибратором Н4-17. Прибор приобретен взамен устаревшего калибратора -вольтметра В1-28 в дополнение к уже имеющемуся калибратору Н4-7. Это позволяет улучшить качество и надежность поверки электроизмерительных приборов в соответствии с областью аккредитации, сократить сроки поставки изделий потребителям, в перспективе организовать автоматизированное рабочее место поверки электроизмерительных приборов. </p>
						<p>В ближайшем будущем планируется приобретение оборудования для организации рабочего места по поверке частотомеров электронных и проведение работ по расширению области аккредитации лаборатории.</p>
					</div>
					<div class="single_post_img col-12 ">
						<img class="img-thumbnail" src="assets/img/1.jpg" alt="">
					</div>
				</div>
			</div>
			<div class="sidebar col-md-3 col-12">
				<div class="section catalog_news">
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
		</div>
</body>

</html>