<?php

	include "rootPath.php";
	include ROOT . "/functions/clearFunction.php";
	include ROOT . "/functions/validateFunctions.php";
	include_once ROOT . "/DBWorker/getMethods.php";
	include_once ROOT . "/DBWorker/insertMethods.php";
			
			
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
			if (!userFieldFilled($_POST['name'])) {
				
				$errors[] = "Name is required";
				
			} 
			
			else {
				
				$name = clear_data($_POST['name']);
				
				//Check if name only contains letters and whitespace
				if (!userNameWellFormed($name)) {
				  $errors[] = "Only letters and white space allowed"; 
				}
			}
	  
	  
			//Check User E-mail
			if (!userFieldFilled($_POST["email"])) {
				$errors[] = "Email is required";
			} 
			
			else {
				
				// check if e-mail address is well-formed
				
				$email = clear_data($_POST["email"]);
				
				if (!userEmailWellFormed($email)) {
					$errors[] = "Invalid email format"; 
				} 
				
				//Check E-mail Existence
				else {
										
					if (userEmailExists($email)) {
						$errors[] = 'E-mail already exists';
					} 	
				}
			}

			
			//Check birthDate
			if (!userFieldFilled($_POST["birthDate"])) {
				$errors[] = 'You must select Your Birth Date';
			} else {
				$birthDate = $_POST["birthDate"];
			}
			
			//Check User Country
			if (!userFieldFilled($_POST["country"])) {
				$errors[] = "You must select Your country";
			} else {
				$selectedCountry = clear_data($_POST["country"]);
				$countryID = getCountryID($selectedCountry);
			}
			
			
			//Check User Login
			if (!userFieldFilled($_POST["login"])) {
				$errors[] = 'Login is required';
			} else {
				
				//Check Login Existence
				$login = clear_data($_POST["login"]);
				
				if (userLoginExists($login)) {
					$errors[] = 'Login already exists';
				} 
				
			}
			
			
			//Check User Password
			if (!userFieldFilled($_POST["password"])) {
				$errors[] = 'Password is required';
			} 
			
			else {
				$password = clear_data($_POST["password"]);
				$confirmPassword = clear_data($_POST["confirmPassword"]);
				
				if (!userPasswordConfirmed($password, $confirmPassword)) {
					$errors[] = 'Wrong password!';
				}
				
				else {
					$password = password_hash($password, PASSWORD_DEFAULT);
				}
			}
			
			
			//Check agreement
			if (!isset($_POST["agreement"])) {
				$errors[] = 'You must agree with terms and conditions';
			} else {
				$agreement = $_POST["agreement"];
			}
			
				
			//Insert new user and sign in
			if($errors == false){
				insertUser($name, $email, $birthDate, $login, $password, $countryID['id']);
				header("Location: page.php?login=" . $login);
			}
			
		}
?>