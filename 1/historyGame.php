<!DOCTYPE html>
<?php
include_once 'lib/BmobObject.class.php';
include_once 'lib/BmobUser.class.php';
$username = @$_GET['username'];
$id = @$_GET['id'];
if (strlen($id) == 0) {
    echo '<script type="text/javascript">
        alert("登录失效请重新登录！");
	   document.location.href="login.php";
	   </script>';
}
?>
<html>
<head>
<meta charset="UTF-8">
<title></title>
<style>
th {
	padding: 10px;
	background-color: lightseagreen;
	color: #FFFFFF;
}

td {
	padding: 10px;
	text-align: center;
	background-color: oldlace;
}
input{
	
	background-color: lightseagreen;
	color: #FFFFFF;
	padding-left: 20px;
	padding-right: 20px;
	padding-top: 8px;
	padding-bottom: 8px;
	border-radius:20px;
	border-width: 1px; 
}
.hide{
	width: 0px;
	height: 0px;
}
</style>
</head>
<body background="images/bg600.jpg">
	
	   <?php
    $gameList = array(
        0
    );
    $players = array(
        0
    );
    $first = true;
    $inStr = '[';
    $game = new BmobObject('game1');
    $res = $game->get("", array(
        'where={"ower":"' . $id . '"}'
    ));
    foreach ($res as $val) {
        foreach ($val as $v) {
            $gameList[$v->objectId] = $v;
            $inStr .= '"' . $v->objectId . '",';
        }
    }
    $inStr[strlen($inStr) - 1] = ']';
    $player = new BmobObject('player1');
    $res = $player->get("", array(
        'where={"game":{"$in":' . $inStr . '}}'
    ));
    echo '<form action="exportAction.php" method="GET" ><table width="90%" frame="void" cellpadding="10px" align="center"
		cellspacing="1px">';
    echo '<tr><th>选手编号</th><th>姓名</th><th>参赛项目</th><th>最终得分</th><th>比赛时间</th><th>所属单位</th><th>比赛场地号</th><th>联系电话</th></tr>';
    $old='1';
    foreach ($res as $val) {
        foreach ($val as $v) {
            $players[] = $v;
            if ($v->game->objectId != $old) {
                
                $old = $v->game->objectId;
                echo '<tr>';
                echo "<td colspan='8'><input type='submit' name='info' value='导出  {$gameList[$old]->name} 的比赛信息  序列号:{$gameList[$old]->objectId}' />
                        ";
                echo '</tr>';
                echo '<tr>';
                echo '<td colspan="8"><h2>' . $gameList[$old]->name . '</h2></td>';
                echo '</tr>';
            }
            echo '<tr>';
            echo '<td>'.$v->no.'</td>';
            echo '<td>'.$v->name.'</td>';
            echo '<td>'.$v->project.'</td>';
            echo '<td>'.$v->score.'</td>';
            echo '<td>'.$v->playTime.'</td>';
            echo '<td>'.$v->from.'</td>';
            echo '<td>'.$v->courseNo.'</td>';
            echo '<td>'.$v->phone.'</td>';
            echo '</tr>';
        }
    }
    echo '</table></form>';
    ?>
</body>
</html>
