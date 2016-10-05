<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8" />
</head>
<body bgcolor="#efefef">
	<ul type="disc">
		<li><a href="first.php" target="right">列表一</a></li><br>
		<li><a href="first.php" target="right">列表二</a></li><br>
		<li><a href="first.php" target="right">列表三</a></li><br>
		<li><a href="first.php" target="right">列表四</a></li><br>
		<li><a href="first.php" target="right">列表五</a></li><br>
	</ul>
	<form action="pageAction.php" target="_top" method="post">
	<select name="page">
		<?php echo '<option>JAVA</option><input type="hidden" name="tag" value="TAG">'?>
	</select>
	<input type="submit" value="跳转"/>
	</form>
</body>
</html>
