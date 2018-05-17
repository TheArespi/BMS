<?php
	include_once '../includes/barangayOfficial.php';

	$official = new BarangayOfficial;

	$official->setPosition($_POST['position']);
	$official->setName($_POST['name']);

	BarangayOfficialDao::addOfficial($official);

	header("Location: editWelcomePage.php");
?>