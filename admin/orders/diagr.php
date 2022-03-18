<?php
include "../../path.php";
include "../../app/controllers/order.php";
$orders = selectAll('product_order');

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

        <div>
            <canvas id="myChart"></canvas>
        </div>

    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
<script>
    let labels = [];
    let arr = new Map([]);
    <?php foreach ($orders as $order) :
        $product = selectONE('product', ['id' => $order['id_product']]);
    ?>
    arr.set('<?php echo $product['name'] ?>','<?php echo $order['count'] ?>');
    labels +=['<?php echo $product['name'] . " "?>'];
<?php endforeach; ?>
    console.log(arr);
    let labe = labels.split(" ");
    let uniqueChars = labe.filter((element, index) => {
        return labe.indexOf(element) === index;
    });

    let date = [];
    for (let value of arr.values()) {
        date.push(+value);
    }

    const data = {
        labels: uniqueChars,
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
</script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>