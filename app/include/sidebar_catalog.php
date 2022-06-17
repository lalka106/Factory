<?php
$types = selectAll('type_catalog');
?>
<div class="sidebar col-md-3 col-12">
    <div class="section catalog">
        <h3>Каталог</h3>
        <ul>
            <?php foreach ($types as $type) :?>
            <li><a href="radio-tech.php?type=<?= $type['id'] ?>"><?=$type['name']?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>