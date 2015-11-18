<?php
	session_start();
	include 'Database.php';

	//Email and password sent from form
	$email=$_POST['email'];
	$password=$_POST['password'];

	//Rol 1 = gebruiker, 2 = admin
	$rol = Database::login($email, $password);

	if ($rol != null && trim($rol) != "")
	{
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $password;
		$_SESSION['rol'] = $rol;

		echo '<script type="text/javascript">window.location = "index.php"</script>';
	}
	else
		echo '<script type="text/javascript">window.location = "LoginFout.php"</script>'; ?>