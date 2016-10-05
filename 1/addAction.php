<?php
header("content-type:text/html;charset=utf-8");
$id = $_POST['id'];
$name = $_POST['username'];
$time = $_POST['playtime'];
$project = $_POST['project'];
$score = $_POST['score'];
$score1 = $_POST['score1'];
$score2 = $_POST['score2'];
$score3 = $_POST['score3'];
$score4 = $_POST['score4'];
$score5 = $_POST['score5'];

$con = mysql_connect(SAE_MYSQL_HOST_M . ':' . SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS);
if ($con) {
    $no =mt_rand(1,1000000);
    mysql_select_db(SAE_MYSQL_DB, $con);
    $query =$sql = "INSERT INTO 'app_dojudge'.'player' ('id', 'score', 'score1', 'score2', 'score3', 'score4', 'score5', 'tag', 'no', 'username', 'project', 'playtime', 'type') VALUES ('{$id}', {$score}, {$score1}, {$score2}, {$score3}, {$score4},{$score5}, 0, $no, '{$name}', '{$project}', '2016-03-12 8:30', 0);";
    if(mysql_query($query))
    {
        header('location:admin.php');
    }else {
        echo mysql_errno();
        echo '添加失败';
    }
}else {
    echo '数据库连接失败';
}
