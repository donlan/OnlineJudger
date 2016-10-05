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
	padding: 4px;
}
.Th {
	text-align: center;
	color: #FFFAF0;
	background-color: forestgreen;
	padding: 12px;
}

.c {
	border-radius: 4px;
	width: auto;
	height: 40px;
	border: none;
	font-size: large;
	text-align: center;
	background-color:#008200;
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
		<h1 id="info" align="center">
			请确保比赛ID，代表队ID的准确无误，否则将不能导入选手信息
		</h1>
		<input id="submitPlayer" class="c" value="导入以下选手信息" type="submit">
	</div>

	<script type="text/javascript">
	var index = null;
	var query = null;
	var ID = null;
	var GAME = null;
	var task = [];
	var bad = [];
	
	BmobInit();
	
		$('#submitPlayer').click(
			function(){
				ID = $("#gameId0").text().trim();
				console.log(ID);
				if(ID==null) 
				{
					alert("没有比赛ID号，修改编排表的时候请勿删除导出的比赛ID号！！！");
				}else
				{
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
							console.log(e);
							alert("链接失败！！获取比赛信息失败，请确认比赛ID是否正确:"+e.message);
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
		



var doUpdate = function(index,teamObj){
		var Obj  = Bmob.Object.extend("player1");
		var obj = new Obj();
		
		console.log($("#no"+index).text());
		var idCard = $('#idCard'+index).text().trim();
		obj.set('no',$("#no"+index).text());
		obj.set('name',$('#name'+index).text());
		obj.set('sex',$('#sex'+index).text());
		obj.set('age',Number($('#age'+index).text()).valueOf());
		obj.set('project',$('#project'+index).text());
		obj.set('level',$('#level'+index).text());
		obj.set('from',$('#from'+index).text());
		obj.set('vip_id',$('#vipId'+index).text());
		obj.set('courseNo',$('#course'+index).text());
		obj.set('phone',$('#tel'+index).text());
		obj.set('idCard',idCard);
		obj.set('birth', idCard.substr(6,4)+"年 "+idCard.substr(10,2)+"月");
		obj.set('gameNo', GAME.get('no'));
		obj.set('game',GAME);
		if(teamObj!=undefined)
			obj.set('team',teamObj);
		obj.set("tag",1);
		obj.set('score',0.0);
		obj.set('score1',0.0);
		obj.set('score2',0.0);
		obj.set('score3',0.0);
		obj.set('score4',0.0);
		obj.set('score5',0.0);
		obj.set('endScore',0.0);
		obj.save(null,
			{
				success:function(player){
					$('#row'+index).remove();
					console.log(index+" _ "+$('#name'+index).text());
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
        if ($highestRow < 2) {
            echo '<script>alert("表格数据空！");</script>';
            exit();
        }
        if ($sheet->getCell('M2')->getValue()=="" || $sheet->getCell('N2')->getValue()!="") {
            echo '<script>alert("导入xls格式不对！！");</script>';
            exit();
        }
        
       
        $F = <<<T
                <table class='rmRang' id="rangUserTable" align="center" width="98%" cellspacing="0px"
			    frame="void" border="1px" bordercolor="forestgreen">
			     <tr>
				<td class="Th">编号</td>
				<td class="Th">姓名</td>
				<td class="Th">年龄</td>
				<td class="Th">性别</td>
				<td class="Th">参赛项目</td>
				<td class="Th">组别</td>
				<td class="Th">单位</td>
				<td class="Th">联系电话</td>
				<td class="Th">身份证</td>
				<td class="Th">武术协会证号</td>
				<td class="Th">场地号</td>
                <td class="Th">比赛ID</td>
				<td class="Th">代表队</td>
			     </tr>
    
T;
        echo $F;
        $DATA = array(0);
        $index=0;
        for ($row = 2; $row <= $highestRow; $row ++) { // 行数是以第1行开始
			$no = $sheet->getCell('A' . $row)->getValue();
            $name = $sheet->getCell('B' . $row)->getValue();
			$age = $sheet->getCell('C' . $row)->getValue();
            $sex = $sheet->getCell('D' . $row)->getValue();
            $project = $sheet->getCell('E' . $row)->getValue();
			$level = $sheet->getCell('F' . $row)->getValue();
            $from = $sheet->getCell('G' . $row)->getValue();
            $tel = $sheet->getCell('H' . $row)->getValue();
            $idCard = $sheet->getCell('I' . $row)->getValue();
			$vipId = $sheet->getCell('J' . $row)->getValue();
            $course = $sheet->getCell('K' . $row)->getValue();
            $gameId = $sheet->getCell('L' . $row)->getValue();
			$team = $sheet->getCell('G' . $row)->getValue();
			
            $DATA[$index] = array(
                'no'=>$no,
                'name'=>$name,
                'sex'=>$sex,
                'age'=>$age,
                'project'=>$project,
                'from'=>$from,
                'level'=>$level,
                'tel'=>$tel,
                'idCard'=>$idCard,
                'vipId'=>$vipId,
                'course'=>$course,
                'gameId'=>$gameId,
                'team'=>$team
            );
            
            
            
            echo "<tr id='row".$index."'>";
			echo "<td id='no".$index."'>" . $no . "</td>";
            echo "<td id='name".$index."'>" . $name . "</td>";
			echo "<td id='age".$index."'>" . $age . "</td>";
            echo "<td id='sex".$index."'>" . $sex . "</td>";
            echo "<td id='project".$index."'>" . $project . "</td>";
			echo "<td id='level".$index."'>" . $level . "</td>";
            echo "<td id='from".$index."'>" . $from . "</td>";
            echo "<td id='tel".$index."'>" . $tel . "</td>";
            echo "<td id='idCard".$index."'>" . $idCard . "</td>";
			echo "<td id='vipId".$index."'>" . $vipId . "</td>";
            echo "<td id='course".$index."'>" . $course . "</td>";
            echo "<td id='gameId".$index."'>" . $gameId . "</td>";
			echo "<td id='team".$index."'>" . $team . "</td>";
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

