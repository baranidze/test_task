<?php
	include "validation/signinValidate.php";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	</head>
	
	<body>
	
		<?php include ROOT . "/errors/errorsView.php";?>			
		
		<h3>Sign in</h3>
		<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<p><input type = "text" name = "login" placeholder = "Login or email" value = "<?php echo $login;?>"/></p>
		<p><input type = "password" name = "password" placeholder = "Password" value = "<?php echo $password;?>"/></p>
		<p><input type = "submit" name = "submit" value = "Sign in"/></p>
		<p><a href = "registration.php">Registration</a></p>
		</form>
		
	</body>
</html>