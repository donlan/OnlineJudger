<?php
$filename = @$_FILES['file']['name'];
if (strlen($filename) <= 0 && $TAG) {
    return;
}
$FLAG = @$_POST['1'];
$DATA= null;
if ($FLAG == 'A') {
    error_reporting(E_STRICT);
    date_default_timezone_set('Asia/ShangHai');
    
    require_once 'Classes/PHPExcel/IOFactory.php';
    
    if (@$_FILES['file']['error'] > 0) {
        echo '<script>alert("出错代码：' . $_FILES['file']['error'] . '")</script>';
    } else {
        if (strpos($filename, '.xls')) {
            $path = 'upload/' . $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], $path);
            if (! file_exists($path)) {
                echo '<script>alert("' . $path . '不存在！")</script>';
                exit();
            }
            $reader = PHPExcel_IOFactory::createReader('Excel5'); // 设置以Excel5格式(Excel97-2003工作簿)
            $PHPExcel = $reader->load($path); // 载入excel文件
            $sheet = $PHPExcel->getSheet(0); // 读取第一個工作表
            $highestRow = $sheet->getHighestRow(); // 取得总行数
            $highestColumm = $sheet->getHighestColumn(); // 取得总列数
            
            if ($highestColumm != 9) {
                echo '<script>alert("导入xls格式不对！！")</script>';
                exit();
            }
            if ($highestRow <1) {
                echo '<script>alert("表格数据空！")</script>';
                exit();
            }
            /**
             * 循环读取每个单元格的数据
             */
            echo '<script>$("rmRang").remove();$("#rangUserTable").show();$("#regUserTable").hide();</script>';
            
            $DATA =array(0);
            for ($row = 1; $row <= $highestRow; $row ++) { // 行数是以第1行开始
                
                $id = $sheet->getCell('A' . 9)->getValue();
                $name = $sheet->getCell('B' . $row)->getValue();
                $sex = $sheet->getCell('C' . $row)->getValue();
                $age = $sheet->getCell('D' . $row)->getValue();
                $project = $sheet->getCell('E' . $row)->getValue();
                $from = $sheet->getCell('F' . $row)->getValue();
                $level = $sheet->getCell('G' . $row)->getValue();
                $tel = $sheet->getCell('H' . $row)->getValue();
                $no = $sheet->getCell('I' . $row)->getValue() ;
                $DATA[] = array($id,$no,$name,$sex,$age,$project,$from,$level,$tel);
                echo "<script>$('#rangUserTable').append(\"<tr class='rmRang' id='reg" . $id . "'></tr>\");</script>";
                echo "<script>$('#rang" . $id . ").append('<td>'" . $sheet->getCell('A' . $row)->getValue() . "'</td>');</script>";
                echo "<script>$('#rang" . $id . ").append('<td>'" . $name . "'</td>');</script>";
                echo "<script>$('#rang" . $id . ").append('<td>'" . $sex . "'</td>');</script>";
                echo "<script>$('#rang" . $id . ").append('<td>'" . $age . "'</td>');</script>";
                echo "<script>$('#rang" . $id . ").append('<td>'" . $project . "'</td>');</script>";
                echo "<script>$('#rang" . $id . ").append('<td>'" . $from . "'</td>');</script>";
                echo "<script>$('#rang" . $id . ").append('<td>'" . $level . "'</td>');</script>";
                echo "<script>$('#rang" . $id . ").append('<td>'" . $tel . "'</td>');</script>";
                echo "<script>$('#rang" . $id . ").append('<td>'" . $no. "'</td>');</script>";
            }
            $TAG = true;
        } else {
            echo '<script>alert("不能导入非xls格式的表格文件！！")</script>';
        }
    }
} else 
    if ($FLAG == 'B') {
        if($DATA==null){
        echo '<script>alert("没有导入的编排信息！")</script>';
        }else{
            include_once 'lib/BmobObject.class.php';
            include_once 'lib/BmobUser.class.php';
            foreach ($DATA as $v){
                
            }
        }
    }

?>
