<?php
include "../../path.php";
include "../../app/controllers/status.php";
//$orders = selectAll('product_order', []);
//tt($orders);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link rel="stylesheet" href="../../css/style.css">
	<title>Главная</title>
</head>

<body>
	<?php include("../../app/include/header_admin.php"); ?>

	<div class="container">
		<div class="row">
			<?php include("../../app/include/sidebar-admin.php"); ?>

			<div class="posts col">
                <div class="button row">
                    <a class="col-3 btn btn-success" href="<?php echo BASE_URL . "admin/orders/history.php" ?>">History</a>
                    <span class="col-1"></span>
                    <a class="col-3 btn btn-success" href="<?php echo BASE_URL . "admin/orders/diagr.php" ?>">Diagramms</a>
                </div>
                <div class="row title-table">
                    <h2>Управление заказами</h2>
                    <div class=" col">ID</div>
                    <div class=" col">Товар</div>
                    <div class=" col">Количество</div>
                    <div class=" col">Итого</div>
                    <div class=" col">DESCR</div>
                    <div class=" col">STATUS</div>
                </div>
                <?php
                foreach ($orders as $key => $order) :
                    $product = selectONE('product',['id' => $order['id_product']]);
                    $status = selectONE('product_status',['id' => $order['id_status']]);

                    ?>
                    <div class="row post">
                        <div class="id col"><?= $key + 1; ?></div>
                        <div class="title col"><?= $product['name'] ?></div>
                        <div class="title col"><?= $order['count'] ?></div>
                        <div class="title col"><?= $order['result']?> руб.</div>
                        <div class="title col"><?= $order['description'] ?></div>
                        <div class="title col"><?= $status['name'] ?></div>
                        <div class="edit col"><a href="edit.php?id=<?= $order['id'] ?>">Edit</a></div>
<!--                        <div class="edit col-2"><a href="edit.php?id=--><?//= $dealer['id'] ?><!--">Edit</a></div>-->
                        <!--                        --><?php //if ($dealer['status']) : ?>
<!--                            <div class="status col-1"><a href="edit.php?publish=0&pub_id=--><?//= $dealer['id'] ?><!--">черновик</a></div>-->
<!--                        --><?php //else : ?>
<!--                            <div class="status col-1"><a href="edit.php?publish=1&pub_id=--><?//= $dealer['id'] ?><!--">опубликовать</a></div>-->
<!--                        --><?php //endif ?>
                    </div>
                <?php endforeach; ?>
					</div>
			</div>
		</div>



		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>