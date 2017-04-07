<?php

	include_once ROOT . "/DBWorker/Db.php";	
	
	
	function userFieldFilled($field){
		
		if (!empty($field)) {
			return true;
		}
		
		else {
			return false;
		}
		
	}
	
	function userNameWellFormed($name){
		
		if (preg_match("/^[a-zA-Z ]*$/",$name)) {
			return true;
		}
		
		else {
			return false;
		}
	}
		
	function userEmailWellFormed($email){
		
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		}
		
		else {
			return false;
		}
		
	}
	
	function userEmailExists($email){
		
		$db = Db::getConnection();
		
		$sql = 'SELECT COUNT(*) FROM user WHERE email = :email';
		$result = $db->prepare($sql);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->execute();
		
		if ($result->fetchColumn()) {
			return true;
		}
		
		else {
			return false;
		}
	}
	
	function userPasswordConfirmed($password, $confirmPassword){
		
		if ($password == $confirmPassword) {
			return true;
		}
		else {
			return false;
		}
		
	}
		
	function userLoginExists($login){
		
		$db = Db::getConnection();
		
		$sql = 'SELECT COUNT(*) FROM user WHERE login = :login';
		$result = $db->prepare($sql);
		$result->bindParam(':login', $login, PDO::PARAM_STR);
		$result->execute();
		
		if ($result->fetchColumn()) {
			return true;
		}
		
		else {
			return false;
		}
		
	}
	
?>