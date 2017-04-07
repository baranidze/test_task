<?php

	include_once ROOT . "/functions/clearFunction.php";

	function getCountries(){
		
		$db = Db::getConnection();
		
		$countriesList = array();
		$result = $db->query('SELECT * FROM country');
		
		$i = 0;
		while($row = $result->fetch()){
			$countriesList[$i]['name'] = $row['name'];
			$countriesList[$i]['id'] = $row['id'];
			$i++;
		}
		
		return $countriesList;
	}
	
	function getCountryID($selectedCountry){
		
		$db = Db::getConnection();
		
		$countryID = $db->query("SELECT id FROM country WHERE name='$selectedCountry'");
		$countryID->setFetchMode(PDO::FETCH_ASSOC);
		$countryID = $countryID->fetch();
		
		return $countryID;
		
	}
	
	function getUserInfo($login){
		
		$db = Db::getConnection();
		
		$login = clear_data($login);
		$userInfo = $db->query("SELECT email, name FROM user WHERE login='$login' OR email='$login'");
		$userInfo->setFetchMode(PDO::FETCH_ASSOC);
		$userInfo = $userInfo->fetch();
		
		return $userInfo;
		
	}
	
	function getUserSigninInfo($login){
		
		$db = Db::getConnection();
		
		$sql = 'SELECT password, login FROM user WHERE login = :login OR email = :email';
		$result = $db->prepare($sql);
		$result->bindParam(':login', $login, PDO::PARAM_STR);
		$result->bindParam(':email', $login, PDO::PARAM_STR);
		$result->execute();
		$userInfo = $result->fetch();
		
		return $userInfo;
	}
	
?>