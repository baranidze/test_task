<?php
	function clear_data($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	$db = Db::getConnection();
	
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$login = clear_data($_GET['login']);
		$userInfo = $db->query("SELECT email, name FROM user WHERE login='$login'");
		$userInfo->setFetchMode(PDO::FETCH_ASSOC);
		$userInfo = $userInfo->fetch();

	}
?>