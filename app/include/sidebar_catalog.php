<?php
$types = selectAll('type_catalog');
?>
<div class="sidebar col-md-3 col-12">
	<div class="section catalog">
		<h3>Каталог</h3>
		<ul>
			<li><a href="radio-tech.php?type=<?= $types[0]['id'] ?>">Радиоизмерительная техника</a></li>
			<li><a href="radio-tech.php?type=<?= $types[1]['id'] ?>">Дозиметры</a></li>
			<li><a href="radio-tech.php?type=<?= $types[2]['id'] ?>">ЖК-мониторы</a></li>
<!--			<li><a href="">Автотракторная электроника</a></li>-->
<!--			<li><a href="">Моноблоки INFOTON</a></li>-->
<!--			<li><a href="">Видеонаблюдение</a></li>-->
<!--			<li><a href="">Поверхностный монтаж SMD компонентов</a></li>-->
<!--			<li><a href="">Автоматизация рабочих мест</a></li>-->
<!--			<li><a href="">Лаборатория проверка</a></li>-->
		</ul>
	</div>
</div>