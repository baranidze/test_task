<?php

	include "rootPath.php";
	include ROOT . "/DBWorker/Db.php";
	include ROOT . "/functions/clearFunction.php";
		
	//Initial variables
	$name = '';
	$email = '';
	$birthDate = '';
	$selectedCountry = '';
	$login = '';
	$password = '';
	$confirmPassword = '';
	$agreement = 'False';
	$errors = false;
	
		//Validate data
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			//Check User Name
			if (empty($_POST["name"])) {
				$errors[] = "Name is required";
			} else{
				$name = clear_data($_POST["name"]);
				
				//Check if name only contains letters and whitespace
				if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
				  $errors[] = "Only letters and white space allowed"; 
				}
			}
	  
			//Check User E-mail
			if (empty($_POST["email"])) {
				$errors[] = "Email is required";
			} else{
				$email = clear_data($_POST["email"]);
				// check if e-mail address is well-formed
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$errors[] = "Invalid email format"; 
				} else{
					
					//Check E-mail Existence
					$sql = 'SELECT COUNT(*) FROM user WHERE email = :email';
					$result = $db->prepare($sql);
					$result->bindParam(':email', $email, PDO::PARAM_STR);
					$result->execute();
					
					if($result->fetchColumn()){
						$errors[] = 'E-mail already exists';
					} else{
						$email = clear_data($_POST["email"]);
					}
				}
			}	
			
			//Check User Country
			if(empty($_POST["country"])){
				$errors[] = "Country is required";
			} else{
				$selectedCountry = clear_data($_POST["country"]);
				$countryID = $db->query("SELECT id FROM country WHERE name='$selectedCountry'");
				$countryID->setFetchMode(PDO::FETCH_ASSOC);
				$countryID = $countryID->fetch();
			}
		
			//Check User Password
			if(empty($_POST["password"])){
				$errors[] = 'Password is required';
			}else if($_POST["password"] != $_POST["confirmPassword"]){
				$errors[] = 'Wrong password!';
			}else {
				$password = clear_data($_POST["password"]);
								
				$password = password_hash($password, PASSWORD_DEFAULT);
			}
			
			//Check User Login
			if(empty($_POST["login"])){
				$errors[] = 'Login is required';
			} else{
				
				//Check Login Existence
				$login = clear_data($_POST["login"]);
				$sql = 'SELECT COUNT(*) FROM user WHERE login = :login';
				$result = $db->prepare($sql);
				$result->bindParam(':login', $login, PDO::PARAM_STR);
				$result->execute();
				
				if($result->fetchColumn()){
					$errors[] = 'Login already exists';
				} else{
					$login = clear_data($_POST["login"]);
				}
			}
			
			//Check agreement
			if(!isset($_POST["agreement"])){
				$errors[] = 'You must agree with terms and conditions';
			} else{
				$agreement = $_POST["agreement"];
			}
			
			//Check birthDate
			if(empty($_POST["birthDate"])){
				$errors[] = 'You must select Your Birth Date';
			} else{
				$birthDate = $_POST["birthDate"];
			}
				
			//Insert new user and sign in
			if($errors == false){
				$sql = 'INSERT INTO user (registrationTime, name, email, birthDate, login, password, countryID) ' 
						. 'VALUES (UNIX_TIMESTAMP(), :name, :email, :birthDate, :login, :password, :countryID)';
				$result = $db->prepare($sql);
				$result->bindParam(':name', $name, PDO::PARAM_STR);
				$result->bindParam(':email', $email, PDO::PARAM_STR);
				$result->bindParam(':birthDate', $birthDate, PDO::PARAM_STR);
				$result->bindParam(':login', $login, PDO::PARAM_STR);
				$result->bindParam(':password', $password, PDO::PARAM_STR);
				$result->bindParam(':countryID', $countryID['id'], PDO::PARAM_INT);
				$result->execute();
				header("Location: page.php?login=" . $login);
			}
			
		}
?>