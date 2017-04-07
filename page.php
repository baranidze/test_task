<?php
	include_once "rootPath.php";
	include_once ROOT . "/DBWorker/Db.php";
	include_once ROOT . "/DBWorker/getMethods.php";
	
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$userInfo = getUserInfo($_GET['login']);
	}
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