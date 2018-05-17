<?php
	session_start();

	include_once '../includes/loginDAO.php';

	echo LoginDao::updateUsername($_GET['username'],$_SESSION['id']);

	header("Location: accountSetting.php");
?>