<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
<script type="text/javascript" src="js/bmob-min.js"></script>
<script type="text/javascript" src="js/Bmob.Config.js"></script>
<script src="sdk/jquery-1.11.1.js"></script>
<style type="text/css">
td {
	text-align: center;
}

.Th {
	text-align: center;
	color: #FFFAF0;
	background-color: forestgreen;
	padding: 8px;
}

.c {
	border-radius: 8px;
	width: auto;
	height: 40px;
	border: none;
	font-size: large;
	text-align: center;
	background-color: #FF9840;
	color: #FFFAF0;
	margin: 20px;
	background: #6A6AFF;
}
body{
	background: -moz-radial-gradient(circle, #D6E9C6, #A9DBA9);
 	background: -webkit-gradient(radial, center center, 0, center center, 460, from(#D6E9C6), to(#A9DBA9));
 	background: -webkit-radial-gradient(circle, #D6E9C6, #A9DBA9);   
	margin: 0
}
</style>
</head>
<body>

	<div>
		<h1 id="info" align="center"></h1>
		<input id="submitPlayer" class="c" value="导入以下编排表信息" type="submit">
	</div>

	<script type="text/javascript">
	var index = null;
	var query = null;
	var ID = null;
	var GAME = null;
	var task = [];
	var bad = [];
	var data = [];
	BmobInit();
	
	var taskObj = function(index,query){
		this.index = index;
		this.query = query;
	}
	
	taskObj.prototype.getIndex = function(){
		return this.index;
	}
	taskObj.prototype.getQuery = function(){
		return this.query;
	}
	
		$('#submitPlayer').click(
			function(){
				ID = $("#gameId0").text();
				if(ID==null) 
				{
					alert("没有比赛ID号，修改编排表的时候请勿删除导出的比赛ID号！！！");
				}else
				{
					console.log(ID);
					var query = new Bmob.Query(Bmob.Object.extend('game1'));
					query.get(ID,{
						success:function(res){
								GAME = res;
								console.log(GAME);
								if(res)
								{
									upload();
								}else
								{
									alert("获取比赛信息失败，请确认比赛ID是否正确");
								}
						},
						error:function(obj,e){
							alert("链接失败！！获取比赛信息失败，请确认比赛ID是否正确");
						}
					});
					
				}
			}
			);
			


		var upload = function(){
			var count= $("tr").length-1;
			if(count>=1)
			{
				for(var n = count-1;n>=0;n--){
					doUpdate(n);
				}
			}
		};
		



var doUpdate = function(index){
	var query  = new Bmob.Query(Bmob.Object.extend("player1"));
	query.get($("#id"+index).text(),{
					success:function(player){
            			player.set('no',$("#no"+index).text());
						player.set('name',$('#name'+index).text());
						player.set('sex',$('#sex'+index).text());
						player.set('age',Number($('#age'+index).text()).valueOf());
						player.set('project',$('#project'+index).text());
						player.set('level',$('#level'+index).text());
						player.set('from',$('#from'+index).text());
						player.set('vip_id',$('#vipId'+index).text());
						player.set('courseNo',$('#course'+index).text());
						player.set('phone',$('#tel'+index).text());
						player.set('idCard',$('#idCard'+index).text());
						player.set("tag",1);
						player.save();
						$('#row'+index).remove();
						console.log(index);
						console.log($('#name'+index).text());
					},
					error:function(object,e){
						console.log(e);
							alert($("#name"+index).text()+" 的报名信息添加失败");
						 bad.push();
					}
				});
	
}
	</script>
<?php
$filename = @$_FILES['file']['name'];
if (strlen($filename) <= 0) {
    echo '<script>alert("未选择导入的表格！");</script>';
    exit();
}

error_reporting(E_STRICT);
date_default_timezone_set('Asia/ShangHai');

require_once 'Classes/PHPExcel/IOFactory.php';

if (@$_FILES['file']['error'] > 0) {
    echo '<script>alert("出错代码：' . $_FILES['file']['error'] . '")</script>';
} else {
    if (strpos($filename, '.xls')) {
        if (! file_exists($_FILES['file']['tmp_name'])) {
            echo '<script>alert("文件不存在！");</script>';
            exit();
        }
        $reader = PHPExcel_IOFactory::createReader('Excel5'); // 设置以Excel5格式(Excel97-2003工作簿)
        $PHPExcel = $reader->load($_FILES['file']['tmp_name']); // 载入excel文件
        
        $sheet = $PHPExcel->getSheet(0); // 读取第一個工作表
        $highestRow = $sheet->getHighestRow(); // 取得总行数
        $highestColumm = $sheet->getHighestColumn(); // 取得总列数
        
        if (!$highestColumm == 15) {
            echo '<script>alert("导入xls格式不对！！");</script>';
            exit();
        }
        if ($highestRow < 2) {
            echo '<script>alert("表格数据空！");</script>';
            exit();
        }
       
        $F = <<<T
                <table class='rmRang' id="rangUserTable" align="center" width="98%" cellspacing="0px"
			    frame="void" border="1px" bordercolor="forestgreen">
			     <tr>
				<td class="Th">姓名</td>
				<td class="Th">编号</td>
				<td class="Th">场地号</td>
				<td class="Th">项目</td>
				<td class="Th">单位</td>
				<td class="Th">裁判1</td>
				<td class="Th">裁判2</td>
				<td class="Th">裁判3</td>
				<td class="Th">裁判4</td>
				<td class="Th">裁判5</td>
				<td class="Th">平均分</td>
				<td class="Th">加减分</td>
                <td class="Th">最后得分</td>
			     </tr>
    
T;
        echo $F;
        $DATA = array(0);
        $index=0;
        for ($row = 2; $row <= $highestRow; $row ++) { // 行数是以第1行开始
            
            $name = $sheet->getCell('A' . $row)->getValue();
            $no = $sheet->getCell('B' . $row)->getValue();
			$courseNo = $sheet->getCell('C' . $row)->getValue();
            $project = $sheet->getCell('D' . $row)->getValue();
			$from = $sheet->getCell('E' . $row)->getValue();
            $judge1 = $sheet->getCell('F' . $row)->getValue();
            $judge2 = $sheet->getCell('G' . $row)->getValue();
			$judge3 = $sheet->getCell('H' . $row)->getValue();
            $judge4 = $sheet->getCell('I' . $row)->getValue();
			$judge5 = $sheet->getCell('J' . $row)->getValue();
            $score = $sheet->getCell('K' . $row)->getValue();
            $alter = $sheet->getCell('L' . $row)->getValue();
			$endScore = $sheet->getCell('M' . $row)->getValue();
			
            $DATA[$index] = array(
            	'name'=>$name,
                'no'=>$no,
                'courseNo'=>$courseNo,
                'project'=>$project,
                'from'=>$from,
                'judge1'=>$judge1,
                'judge2'=>$judge2,
                'judge3'=>$judge3,
                'judge4'=>$judge4,
                'judge5'=>$judge5,
                'score'=>$score,
                'alter'=>$alter,
                'endScore'=>$endScore
            );
            
            
            
            echo "<tr id='name".$index."'>";
			echo "<td id='no".$index."'>" . $seq . "</td>";
            echo "<td id='courseNo".$index."'>" . $id . "</td>";
			echo "<td id='project".$index."'>" . $no . "</td>";
            echo "<td id='from".$index."'>" . $name . "</td>";
			echo "<td id='judge1".$index."'>" . $age . "</td>";
            echo "<td id='judge2".$index."'>" . $sex . "</td>";
            echo "<td id='judge3".$index."'>" . $project . "</td>";
			echo "<td id='judge4".$index."'>" . $level . "</td>";
            echo "<td id='judge5".$index."'>" . $from . "</td>";
			echo "<td id='score".$index."'>" . $team . "</td>";
            echo "<td id='alter".$index."'>" . $tel . "</td>";
            echo "<td id='endScore".$index."'>" . $idCard . "</td>";
            echo "</tr>";
            $index++;
        }
        echo "</table>";
    } else {
        echo '<script>alert("不能导入非xls格式的表格文件！！")</script>';
    }
}
?>

</body>
</html>

