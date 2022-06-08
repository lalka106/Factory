<?php
include("path.php");
include SITE_ROOT . '/app/database/db.php';
require_once "vendor/autoload.php";

$products = selectAll('product');

$phpWord = new \PhpOffice\PhpWord\PhpWord();
//$document = new \PhpOffice\PhpWord\TemplateProcessor('./ostatki.docx');
$uploadDir = __DIR__;
$outputFile = "ostatkiItog.docx";
$tableStyle = array(
//    'borderColor' => 'black',
//    'borderSize'  => 3
);
$cellStyle = array(
    'borderTopSize' =>3,
    'borderRightSize' =>3,
    'borderBottomSize' =>3,
    'borderLeftSize' =>3,
    'align' => 'center'
);
$textStyle = array(
    'align'=>'center'
);
$section = $phpWord->addSection();
$section->addText('ЧУП "Завод СВТ"',array('bold'=>true,'align'=>'center'));
$table = $section->addTable('Ostatki');
$table->addRow(500);
$table->addCell(3000,$cellStyle)->addText('Дата составления',$textStyle);
$table->addRow(500);
$cell = $table->addCell(3000,$cellStyle);
$cell->addText(date("j.n.Y"));
$section->addText('Ведомость наличия товаров',array('bold'=>true,'align'=>'center'));
$firstRowStyle = array('bgColor' => '66BBFF','bold'=>true);
$phpWord->addTableStyle('Ostatki', $tableStyle);
$table = $section->addTable('Ostatki');
$table->addRow(500);
$table->addCell(3000,$cellStyle)->addText('Наименование товара',$textStyle);
$table->addCell(700,$cellStyle)->addText('Категория товара',$textStyle);
$table->addCell(700,$cellStyle)->addText('Количество на складе, шт.',$textStyle);
$table->addCell(2000,$cellStyle)->addText('Учетная стоимость за шт., руб. коп.',$textStyle);
$table->addCell(1000,$cellStyle)->addText('Итоговая стоимость, руб. коп.',$textStyle);
for ($i=0;$i<count($products);$i++){
    $type = selectONE('type_product',['id'=>$products[$i]['id_type_product']]);
    $table->addRow(700);
    $name = $products[$i]['name'];
    $type = $type['name'];
    $count = $products[$i]['count'];
    $price = $products[$i]['price'];
    $cell = $table->addCell(3000,$cellStyle);
    $cell->addText($name);
    $cell = $table->addCell(700,$cellStyle);
    $cell->addText($type);
    $cell = $table->addCell(700,$cellStyle);
    $cell->addText($count);
    $cell = $table->addCell(2000,$cellStyle);
    $cell->addText($price);
    $cell = $table->addCell(1000, $cellStyle);
    $cell->addText($price*$count);

}

$table->addRow(500);
$table->addCell(3000)->addText('Должность______________',$textStyle);
$table->addCell(700)->addText();
$table->addCell(700)->addText();
$table->addCell(2000)->addText();
$table->addCell(1000)->addText('Подпись________________',$textStyle);


header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=ostatki.docx");
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord,"Word2007");
$objWriter->save("php://output");
