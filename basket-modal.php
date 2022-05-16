<?php
include("path.php");
include "app/controllers/order.php";
//tt($_SESSION);


?>
<div class="modal-body">
    <?php if (!empty($_SESSION['cart'])): ?>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Изображение</th>
                <th scope="col">Название</th>
                <th scope="col">Цена</th>
                <th scope="col">Количество</th>
                <th scope="col">Всего</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($_SESSION['cart'] as $id => $item): ?>
                <tr>
                    <td><a href="#"><img src="assets/img/news/<?= $item['img'] ?>" alt="<?= $item['name'] ?>"></a></td>
                    <td><a href="#"><?= $item['name'] ?></a></td>
                    <td><?= $item['price'] ?></td>
                    <td><?= $item['count_choose'] ?></td>
                    <td><?= $item['total_sum'] ?></td>
                </tr>
            <?php endforeach; ?>

            <tr>
                <td colspan="6" align="right">Товаров: <span id="modal-cart-qty"><?= $_SESSION['cart.count'] ?></span>
                    <br> Сумма: <?= $_SESSION['cart.sum'] ?> руб.
                </td>
            </tr>
            </tbody>
        </table>
    <?php else: ?>
        <p>Корзина пуста...</p>
    <?php endif; ?>
</div>
<div class="modal-footer">
    <form action="basket-modal.php" method="post">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <?php if (!empty($_SESSION['cart'])): ?>
       <button name="order" type="submit" class="btn btn-primary">Оформить заказ</button>
        <button type="button" class="btn btn-danger" id="clear-cart">Очистить корзину</button>
    <?php endif; ?>
    </form>
</div>
