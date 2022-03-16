<?php
include "../../path.php";
include SITE_ROOT . "/app/database/db.php";

$histories = selectAll('historyorders',null);
//tt($histories);
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
	<title>History</title>
</head>

<body>
	<?php include("../../app/include/header_admin.php"); ?>

	<div class="container">
		<div class="row">
			<?php include("../../app/include/sidebar-admin.php"); ?>

			<div class="posts col">
                <div class="button row">
                    <a class="col-3 btn btn-success" href="<?php echo BASE_URL . "admin/orders/index.php" ?>">Back</a>
                </div>
<!--                <div class="row title-table">-->
<!--                    <h2>История заказов</h2>-->
<!--                    <div class=" col">Номер заказа</div>-->
<!--                    <div class=" col">Наименование товара</div>-->
<!--                    <div class=" col">Количество</div>-->
<!--                    <div class=" col">Итого</div>-->
<!--                    <div class=" col">Дата оформления</div>-->
<!--                    <div class=" col">Покупатель</div>-->
<!--                    <div class=" col">Статус</div>-->
<!--                </div>-->
<!--                --><?php
//                foreach ($histories as $key => $history) : ?>
<!--                    <div class="row post">-->
<!--                        <div class="id col">--><?//= $history['id'] ?><!--</div>-->
<!--                        <div class="title col">--><?//= $history['name'] ?><!--</div>-->
<!--                        <div class="title col">--><?//= $history['count'] ?><!--</div>-->
<!--                        <div class="title col">--><?//= $history['result']?><!-- руб.</div>-->
<!--                        <div class="title col">--><?//= $history['created'] ?><!--</div>-->
<!--                        <div class="title col">--><?//= $history['fio'] ?><!--</div>-->
<!--                        <div class="title col">--><?//= $history['Статус'] ?><!--</div>-->
<!--                    </div>-->
<!--                --><?php //endforeach; ?>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Номер заказа</th>
                        <th scope="col">Товар</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Стоимость</th>
                        <th scope="col">Дата оформления</th>
                        <th scope="col">Покупатель</th>
                        <th scope="col">Статус</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($histories as $key => $history) :
                        ?>
                        <tr>
                            <th scope="row"><?= $history['id'] ?></th>
                            <td><?=$history['name'] ?></td>
                            <td><?=$history['count'] ?> руб.</td>
                            <td><?=$history['result']?></td>
                            <td><?=$history['created']?></td>
                            <td><?=$history['fio']?></td>
                            <td><?=$history['Статус']?></td>

                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
					</div>
			</div>
		</div>



		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>