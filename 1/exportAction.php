<?php
header('content-type:text/html;charset=utf-8');
header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment;filename=game.xls");
header('Cache-Control: max-age=0');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0
$key = $_GET['game'];
if (strlen($key) <= 0) {
    die('<h1>导出失败！请返回上级</h1>');
}
@ob_start();
require_once 'Classes/PHPExcel/IOFactory.php';
include_once 'lib/BmobObject.class.php';
include_once 'lib/BmobUser.class.php';
/**
 * Error reporting
 */
error_reporting(E_ALL);
ini_set('display_errors', false);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Asia/ShangHai');

$objPHPExcel = new PHPExcel();
// Set document properties
// $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
// ->setLastModifiedBy("Maarten Balliauw")
// ->setTitle("Office 2007 XLSX Test Document")
// ->setSubject("Office 2007 XLSX Test Document")
// ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
// ->setKeywords("office 2007 openxml php")
// ->setCategory("Test result file");

$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', '比赛编号')
    ->setCellValue('B1', '姓名')
    ->setCellValue('C1', '性别')
    ->setCellValue('D1', '年龄')
    ->setCellValue('E1', '项目')
    ->setCellValue('F1', '单位')
    ->setCellValue('G1', '组别')
    ->setCellValue('H1', '联系电话')
    ->setCellValue('I1', '身份证')
    ->setCellValue('J1', '场地号')
    ->setCellValue('K1', 'ID');

$e = $objPHPExcel->setActiveSheetIndex(0);
$player = new BmobObject('register');
$res = $player->get("", array(
    'where={"game":"' . $key . '"}'
));
$index = 2;
foreach ($res as $val) {
    foreach ($val as $v) {
        $e->setCellValue('A' . $index, '请设置')
            ->setCellValue('B' . $index, $v->name)
            ->setCellValue('C' . $index, $v->sex)
            ->setCellValue('D' . $index, $v->age)
            ->setCellValue('E' . $index, $v->project)
            ->setCellValue('F' . $index, $v->from)
            ->setCellValue('G' . $index, $v->level)
            ->setCellValue('H' . $index, $v->tel)
            ->setCellValue('I' . $index, $v->idCard)
            ->setCellValue('J' . $index, '请设置')
            ->setCellValue('K' . $index, $key);
        $index ++;
    }
}

$objPHPExcel->getActiveSheet()->setTitle('Game Sheet');

$objPHPExcel->setActiveSheetIndex(0);

@ob_end_flush();
@ob_end_clean(); // 清除缓冲区,避免乱码

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit();
?>



