<?php
include("path.php");
include SITE_ROOT . '/app/database/db.php';
require_once "vendor/autoload.php";

$order = selectONE('product_order',['id'=> $_GET['id_product']]);
$user = selectONE('users',['id'=>$order['id_user']]);
$product = selectONE('product',['id'=>$order['id_product']]);
//tt($user);
$document = new \PhpOffice\PhpWord\TemplateProcessor('./111.docx');

$uploadDir = __DIR__;
$outputFile = "заказИТОГ.docx";

$fio = $user['username'];
$id = $order['id'];
$name = $product['name'];
$count = $order['count'];
$result = $order['result'];

$document->setValue("fio",$fio);
$document->setValue("id",$id);
$document->setValue("count",$count);
$document->setValue("name",$name);
$document->setValue("result",$result);

$document->saveAs($outputFile);

$downloadFile = $outputFile;
header("Content-Type: application/octet-stream");
header("Accept-Ranges: bytes");
header("Content-Length: " .filesize($downloadFile));
header("Content-Disposition: attachment; filename=".$downloadFile);
readfile($downloadFile);
//header('location:' . BASE_URL . 'profile.php');
