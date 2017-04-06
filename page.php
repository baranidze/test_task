<?php
	include "rootPath.php";
	include ROOT . "/DBWorker/Db.php";
	include ROOT . "/DBWorker/getUsersInfo.php";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	</head>
	
	<body>
		<h3>User info:</h3>
		<p>User name: <?php echo $userInfo['name'];?></p>
		<p>User email: <?php echo $userInfo['email'];?></p>
		<a href = "index.php">Log out</a>
	</body>
</html>