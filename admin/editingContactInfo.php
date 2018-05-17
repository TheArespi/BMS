<?php

	$telephone = $_POST['telephone'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];

	include_once '../includes/barangayInfoDAO.php';

	BarangayInfoDao::updateInfo('telephone', $telephone).'<br>';
	BarangayInfoDao::updateInfo('mobile', $mobile).'<br>';
	BarangayInfoDao::updateInfo('email', $email).'<br>';

	header("Location: editWelcomePage.php");

?>