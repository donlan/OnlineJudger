<?php
header("content-type:text/html;charset=utf-8");
echo "<h1><a href='adminAddPlayer.php'>添加</a></h1>";
$con = mysql_connect(SAE_MYSQL_HOST_M . ':' . SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS);
if ($con) {
    mysql_select_db(SAE_MYSQL_DB, $con);
    $result = mysql_query("select * from player");
    
    echo '<table align="center" border="1px" width="80%" frame="void" cellspacing="0px">';
    echo '<tr bgcolor="#aeaeae"><th>ID</th><th>姓名</th><th>比赛时间</th><th>项目</th><th>最终分数</th><th>分数一</th><th>分数二</th><th>分数三</th><th>分数四</th><th>分数五</th></tr>';
    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td>';
        echo $row['id'];
        echo '</td>';
        
        echo '<td>';
        echo $row['username'];
        echo '</td>';
        
        echo '<td>';
        echo $row['playtime'];
        echo '</td>';
        
        echo '<td>';
        echo $row['project'];
        echo '</td>';
        
        echo '<td>';
        echo $row['score'];
        echo '</td>';
        
        echo '<td>';
        echo $row['score1'];
        echo '</td>';
        
        echo '<td>';
        echo $row['score2'];
        echo '</td>';
        
        echo '<td>';
        echo $row['score3'];
        echo '</td>';
        
        echo '<td>';
        echo $row['score4'];
        echo '</td>';
        
        echo '<td>';
        echo $row['score5'];
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
    mysql_close($con);
} else {
    echo mysql_errno();
    echo '<h3 align="center">链接服务器失败！</h3>';
}