<?php
	include_once '../includes/barangayOfficial.php';

	$newOfficial = new BarangayOfficial;
	$oldOfficial = BarangayOfficialDao::getOfficial($_GET['id']);

	$newOfficial->setId($_GET['id']);

	if (!isset($_POST['name']) && empty($_POST['name']))
		$newOfficial->setName($oldOfficial->getName());
	else 
		$newOfficial->setName($name = $_POST['name']);

	$newOfficial->setPosition($_POST['position']);

	BarangayOfficialDao::updateOfficial($newOfficial);

	header("Location: editWelcomePage.php");
?>