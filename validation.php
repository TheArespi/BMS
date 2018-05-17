<?php
	session_start();
	include_once 'includes/loginDAO.php';

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	if (LoginDao::isUsernameTaken($username)){
		$login = LoginDao::getLoginInfoByUsername($username);
		if ($password == $login->getPassword()){
			$_SESSION['id'] = $login->getId();
			if ($login->getAccess() == "adm"){
				header("Location: admin");
			} else if ($login->getAccess() == "sec"){
				echo "Logged in as Secretary";
			} else if ($login->getAccess() == "user"){
				echo "Logged in as User";
			}
		} else {
			echo "Your password is incorrect!";
		}
	} else {
		echo "The username doesn't exist in our database!";
	}
?>

<br><br>
<a href="index.php">Go Back</a>