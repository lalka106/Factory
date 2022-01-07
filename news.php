<?php include("path.php");
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
				<h2>Последние новости</h2>
				<div class="post row">
					<div class="post_img col-12 col-md-4">
						<img class="img-thumbnail" src="assets/img/1.jpg" alt="">
					</div>
					<div class="post_text col-12 col-md-8">
						<h3><a href="single_news.php">Новость</a></h3>
						<i class="far fa-calendar"> Dec 27, 2022</i>
						<p class="preview-text">
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos hic recusandae in aspernatur corrupti dolores voluptatum suscipit, excepturi, et facere laborum deleniti, soluta quisquam veritatis fugiat nostrum minus dolorum reiciendis!
						</p>
					</div>

				</div>
				<div class="post row">
					<div class="post_img col-12 col-md-4">
						<img class="img-thumbnail" src="assets/img/sertificat.jpg" alt="">
					</div>
					<div class="post_text col-12 col-md-8">
						<h3><a href="">Новость</a></h3>
						<i class="far fa-calendar"> Dec 27, 2022</i>
						<p class="preview-text">
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos hic recusandae in aspernatur corrupti dolores voluptatum suscipit, excepturi, et facere laborum deleniti, soluta quisquam veritatis fugiat nostrum minus dolorum reiciendis!
						</p>
					</div>

				</div>
				<div class="post row">
					<div class="post_img col-12 col-md-4">
						<img class="img-thumbnail" src="assets/img/1.jpg" alt="">
					</div>
					<div class="post_text col-12 col-md-8">
						<h3><a href="">Новость</a></h3>
						<i class="far fa-calendar"> Dec 27, 2022</i>
						<p class="preview-text">
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos hic recusandae in aspernatur corrupti dolores voluptatum suscipit, excepturi, et facere laborum deleniti, soluta quisquam veritatis fugiat nostrum minus dolorum reiciendis!
						</p>
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
	</div>
</body>

</html>