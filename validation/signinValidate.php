<?php

	include "rootPath.php";
	include ROOT . "/DBWorker/Db.php";
	include ROOT . "/functions/clearFunction.php";

	$db = Db::getConnection();
	
	$login = '';
	$password = '';
	$userInfo = null;
	$errors = false;
	
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		//Check user login or email 
		if(empty($_POST['login'])){
			$errors[] = "Please, enter Your login or email";
		} 
		
		//Check user password
		else if(empty($_POST['password'])){
			$errors[] = "Please, enter password";
		} 
		
		//Check user's login or email existanse
		else{
			
			$login = clear_data($_POST['login']);
			
			$sql = 'SELECT password, login FROM user WHERE login = :login OR email = :email';
			$result = $db->prepare($sql);
			$result->bindParam(':login', $login, PDO::PARAM_STR);
			$result->bindParam(':email', $login, PDO::PARAM_STR);
			$result->execute();
			$userInfo = $result->fetch();
			if($userInfo == null){
				$errors[] = 'User with such login or email does not exist';
			} 
			
			//Validate user's password
			else{
				$login = clear_data($_POST['login']);
				if(!password_verify(clear_data($_POST['password']), $userInfo['password'])){
					$errors[] = "Invalid password";
				} 
				
				//If data is valid go to user's page
				else{
					header("Location: page.php?login=" . $login);
				}
			}
		}
	}
	
?>