<?php include("path.php");
include("app/database/db.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Справка</title>
</head>

<body>
<?php include("app/include/header_admin.php"); ?>


<div class="container">
    <div class="container row">

        <!-- <?php include("app/include/sidebar-catalog.php"); ?> -->

        <div class="main-content col-md-9 col-12">
            <h2>Справочная система</h2>
            <p>В настоящий момент почти любое предприятие имеет собственное веб-приложение, которое помогает
                пользователю иметь актуальное представление об предприятии и облегчает его функционирование. Для этих
                целей возникла необходимость разработки веб-приложения для предприятия «Завод СВТ».</p>
            <p>Функции,доступные для вас:</p>
            <ul>
                <li>управление базой данных - <i>это удаление, редактирование и добавление множеств записей в определенные таблицы базы данных</i></li>
                <li>учет реализованных товаров и товаров на складе - <i>учет реализован через Диаграммы с выбором интересующих параметров,для просмотра нужно зайти в Заказы->Диаграммы</i></li>
                <li>просмотр статистики - <i>для просмотра нужно зайти в Заказы->Диаграммы</i></li>
                <li>построение отчетов - <i>реализуется через конвертацию Диаграмм в определенные виды файлов</i></li>
                <li>построение ведомости - <i>возможность скачать "Ведомость наличия товаров", для скачки нужно зайти в Заказы->Диаграммы</i></li>
            </ul>
        </div>
    </div>
    <?php include('app/include/modal+scripts.php'); ?>
</body>

</html>