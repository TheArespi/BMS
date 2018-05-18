<?php
	include_once '../includes/announcement.php';

	$announcement = new Announcement;

	$announcement->setId($_GET['id']);
	$announcement->setTitle($_POST['title']);
	$announcement->setContent($_POST['content']);

	AnnouncementDao::updateAnnouncement($announcement);

	header("Location: index.php");
?>