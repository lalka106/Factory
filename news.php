<?php include("path.php");
include("app/database/db.php");
$posts = selectAll('posts', ['status' => 1]);
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

				<?php foreach ($posts as $post) : ?>
					<div class="post row">
						<div class="post_img col-12 col-md-4">
							<img class="img-thumbnail" src="<?= BASE_URL . 'assets/img/news/' . $post['img'] ?>" alt="<?= $post['title'] ?>">
						</div>
						<div class="post_text col-12 col-md-8">
							<h3><a href="<?= BASE_URL . 'single_news.php?post=' . $post['id']; ?>"><?= mb_substr($post['title'], 0, 30, 'UTF-8') . '...' ?></a></h3>
							<i class="far fa-calendar"><?= $post['created_date'] ?></i>
							<p class="preview-text">
								<?= mb_substr($post['content'], 0, 200, 'UTF-8') . '...' ?>
							</p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
<!--			--><?php //include("app/include/sidebar_catalog.php"); ?>

		</div>
	</div>
    <?php include('app/include/modal+scripts.php'); ?>
</body>

</html>