<?php
	
	function insertUser($name, $email, $birthDate, $login, $password, $countryID){
		
		$db = Db::getConnection();
		
		$sql = 'INSERT INTO user (registrationTime, name, email, birthDate, login, password, countryID) ' 
				. 'VALUES (UNIX_TIMESTAMP(), :name, :email, :birthDate, :login, :password, :countryID)';
		$result = $db->prepare($sql);
		$result->bindParam(':name', $name, PDO::PARAM_STR);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->bindParam(':birthDate', $birthDate, PDO::PARAM_STR);
		$result->bindParam(':login', $login, PDO::PARAM_STR);
		$result->bindParam(':password', $password, PDO::PARAM_STR);
		$result->bindParam(':countryID', $countryID, PDO::PARAM_INT);
		$result->execute();
	}