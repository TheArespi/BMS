<?php
	$mission = $_POST['mission'];
	$vision = $_POST['vision'];

	include_once '../includes/barangayInfoDAO.php';

	BarangayInfoDao::updateInfo('Mission', $mission);
	BarangayInfoDao::updateInfo('Vision', $vision);
	header("Location: editWelcomePage.php");
?>