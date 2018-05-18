<?php

	include_once '../includes/announcement.php';

	$id = $_GET['id'];

	AnnouncementDao::deleteAnnouncement($id);

	header("Location: index.php");

?>