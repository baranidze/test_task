<?php
	include_once "validation/registrationValidate.php";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	</head>
	
	<body>
		
		<?php include "errors/errorsView.php";?>
	
		<div class = "singup-form">
			<h3>Registration</h3>
			<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
				<p><input type = "text" name = "name" placeholder = "Real Name" value = "<?php echo $name;?>"/></p>
				<p><input type = "email" name = "email" placeholder = "E-mail" value = "<?php echo $email;?>"/></p>
				<p>Your Birth Date: <input type="date" name = "birthDate" value = "<?php echo $birthDate;?>"></p>
				<p>Select Your Country: <?php include_once "DBWorker/getCountries.php";?></p>
				<p><input type = "text" name = "login" placeholder = "Login" value = "<?php echo $login;?>"/></p>
				<p><input type = "password" name = "password" placeholder = "Password"/></p>
				<p><input type = "password" name = "confirmPassword" placeholder = "ConfirmPassword"/></p>
				<p><input type = "checkbox" name = "agreement" value = "Yes" <?php if ($agreement == "Yes"): ?>checked="checked" <?php endif;?>/>Agree with terms and conditions</p>
				<p><input type = "submit" name = "submit" value = "Registration"/></p>
			</form>
			
		</div>
	</body>
</html>
				