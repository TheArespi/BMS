<?php
	session_start();

	include_once '../includes/loginDAO.php';

	$oldpass = $_POST['oldpass'];
	$newpass = $_POST['newpass'];
	$repass = $_POST['repass'];

	$passwordChanged = false;

	$personalinfo = LoginDao::getLoginInfoByid($_SESSION['id']);

	if (md5($oldpass) === $personalinfo->getPassword()){
		if ($newpass === $repass){
			echo LoginDao::updatePassword(md5($newpass),$_SESSION['id']);
			$passwordChanged = true;
		} else {
			echo "newpass and repass didn't match";
		}
	} else {
		echo "oldpass is wrong";
	}

	if ($passwordChanged)
		header("Location: logout.php");
	else
		header("Location: accountSetting.php");
?>