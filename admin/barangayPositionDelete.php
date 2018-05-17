<?php
	include_once '../includes/barangayOfficial.php';

	BarangayOfficialDao::deleteOfficial($_GET['id']);

	header("Location: editWelcomePage.php");
?>