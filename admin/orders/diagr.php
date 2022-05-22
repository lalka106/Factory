<?php
include_once "../../path.php";
include SITE_ROOT . "/app/controllers/order.php";
$orders = selectAll('productcount');
$products = selectAll('product');
$orders1 = selectAll('product_order');
$orders_on_dates = selectOrdersOnDates($_POST['product'],$_POST['date1'],$_POST['date2']);
//tt($orders_on_dates);
//if (isset($_POST['date'])){
//
////    tt($orders_on_dates);
//}

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
       <form method="post" >
           <a href="<?= BASE_URL . 'word1.php' ?>"><button  type="button">Ведомость</button></a>

           <button id="btnDisplay" type="button">Display</button>
           <button id="btnDownload" type="button">Download</button>
           <a href="pdf.php"><button id="btnExcel" type="button">PDF</button></a>
           <a href="phpword.php"><button id="btnExcel" type="button">Word</button></a>
       </form>

    </div>
    <div class="row">
        <div class="col-4">
        <canvas id="myChart"></canvas>
            <img src="" id="imgConverted">

        </div>

    <div class="col-4">
        <canvas id="myChart1"></canvas>
        <img src="" id="imgConverted1">

    </div>

    <div class="col-4">
        <form method="post">

            <label for="product">Название товара</label>
            <input name="product" id="product" type="text">
            <label for="date1">Дата начала</label>
            <input name="date1" id="date1" type="date">
            <label for="date2">Дата начала</label>
            <input  name="date2"  id="date2" type="date">
            <button name="date" type="submit">Старт</button>
        </form>

        <canvas id="myChart2"></canvas>
        <img src="" id="imgConverted2">

    </div>
    </div>
</div>
<script type="module" src="../../assets/js/excel.mjs" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
<script>
    const DATA_COUNT = 5;
    const NUMBER_CFG = {count: DATA_COUNT, min: 0, max: 100};
    let arr = new Map([]);
    let arr_price = new Map([]);
    <?php foreach ($orders as $order) :?>
    arr.set('<?php echo $order['name']?>','<?php echo $order['count'] ?>');
    arr_price.set('<?php echo $order['name']?>','<?php echo $order['result'] ?>');
    <?php endforeach; ?>
    let labels = [];
    let date = [];
    for (let value of arr.values()) {
        date.push(+value);
    }
    for (let value of arr.keys()) {
        labels.push(value);
    }
    let date_price = [];
    for (let value of arr_price.values()) {
        date_price.push(+value);
    }
    // for (let value of arr_price.keys()) {
    //     labels.push(value);
    // }

    const data = {
        labels: labels,
        datasets: [
            {
            label: 'Проданные товары',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'black',
            data: date,
                stack: 'combined',
                type: 'bar'

        },
            {
                label: 'Прибыль',
                backgroundColor: 'cyan',
                borderColor: 'black',
                data: date_price,
                stack: 'combined',

            }
        ]
    };
    const config = {
        type: 'line',
        data: data,
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Прибыль по проданным товарам'
                }
            },
            scales: {
                y: {
                    stacked: true
                }
            }
        },
    };
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );

    //2
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

//3
    let date111= document.querySelector('#date1').value;
    console.log(date111);
    let arr2 = new Map([]);
    let date2 = [];

    const labels2 = []
    <?php foreach ($orders_on_dates as $order) :?>
    if (arr2.has('<?php echo $order['created']?>')){
        labels2.push('<?php echo $order['created']?>');
        date2.push(<?php echo $order['count']?>);
    } else arr2.set('<?php echo $order['created']?>','<?php echo $order['count'] ?>');
    <?php endforeach; ?>
    console.log(arr2);
    for (let value of arr2.values()) {
        date2.push(+value);
    }
    for (let value of arr2.keys()) {
        labels2.push(value);
    }
    console.log(date2);
    console.log(labels2);
    const data2 = {
        labels: labels2,
        datasets: [{
            label: 'Продано',
            backgroundColor: 'red',
            borderColor: 'black',
            data: date2
        }]
    };
    const config2 = {
        type: 'line',
        data: data2,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Проданные товары'
                }
            }
        },
    };
    const myChart2 = new Chart(
        document.getElementById('myChart2'),
        config2
    );
    const btnDisplay = document.querySelector('#btnDisplay');
    const btnDownload = document.querySelector('#btnDownload');
    const imgConverted = document.querySelector('#imgConverted');
    const imgConverted1 = document.querySelector('#imgConverted1');
    const imgConverted2 = document.querySelector('#imgConverted2');
    const myCanvas = document.querySelector('#myChart');
    const myCanvas1 = document.querySelector('#myChart1');
    const myCanvas2 = document.querySelector('#myChart2');
    const arrMyCanvas = [myCanvas,myCanvas1,myCanvas2];
    console.log(arrMyCanvas);
    btnDisplay.addEventListener("click",function () {
       const dataURI = myCanvas.toDataURL("");
       const dataURI1 = myCanvas1.toDataURL("");
       const dataURI2 = myCanvas2.toDataURL("");
       imgConverted.src = dataURI;
       imgConverted1.src = dataURI1;
       imgConverted2.src = dataURI2;
    });
    btnDownload.addEventListener("click",function () {
        for (let i =0;i<arrMyCanvas.length; i++) {
            let a = document.createElement("a");
            document.body.appendChild(a);
            a.href = arrMyCanvas[i].toDataURL();
            a.download = "canvas-image" + i + ".png";
            a.click();
            document.body.removeChild(a);


        }


    });
    // const btnExcel = document.querySelector("#btnExcel");
    //
    // btnExcel.addEventListener("click",function () {
    //     let imgData = myCanvas.toDataURL();
    //     console.log(imgData);
    //     let doc = new jsPDF();
    //
    //     doc.setFontSize(40);
    //     doc.text("Диаграммы", 35, 25);
    //     // for (let i =0;i<3;i++) {
    //     doc.addImage(imgData, "JPEG", 15, 40, 180, 180);
    //     // }
    //     doc.save('a4.pdf'); // will save the file in the current working directory
    //
    // });



</script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>