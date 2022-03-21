<?php
include "../../path.php";
include "../../app/controllers/order.php";
$orders = selectAll('productcount');
$products = selectAll('product');
//tt($products);
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
        <a href="<?= BASE_URL . 'word1.php' ?>"><button type="submit">Ведомость</button></a>

        <div>
            <canvas id="myChart"></canvas>
        </div>
        <div>
            <canvas id="myChart1"></canvas>
        </div>

    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
<script>
    let arr = new Map([]);
    <?php foreach ($orders as $order) :?>
    arr.set('<?php echo $order['name']?>','<?php echo $order['count'] ?>');
<?php endforeach; ?>
    console.log(arr);
    let labels = [];
    let date = [];
    for (let value of arr.values()) {
        date.push(+value);
    }
    for (let value of arr.keys()) {
        labels.push(value);
    }

    const data = {
        labels: labels,
        datasets: [{
            label: 'Проданные товары',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'black',
            data: date,
        }]
    };
    const config = {
        type: 'bar',
        data: data
        //options: {}
    };
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );

    //2
    const DATA_COUNT = 5;
    const NUMBER_CFG = {count: DATA_COUNT, min: 0, max: 100};
    let arr1 = new Map([]);
    <?php foreach ($products as $product) :?>
    arr1.set('<?php echo $product['name']?>','<?php echo $product['count'] ?>');
    <?php endforeach; ?>
    let labels1 = [];
    let date1 = [];
    for (let value of arr1.values()) {
        date1.push(+value);
    }
    for (let value of arr1.keys()) {
        labels1.push(value);
    }

    const data1 = {
        labels: labels1,
        datasets: [{
            label: 'Товаров в наличии',
            backgroundColor: 'red',
            borderColor: 'black',
            data: date1,
        }]
    };
    const config1 = {
        type: 'pie',
        data: data1,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Учёт запасов продукции на складе'
                }
            }
        },
    };




    const myChart1 = new Chart(
        document.getElementById('myChart1'),
        config1
    );
</script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>