<?php

	include_once '../includes/announcement.php';

	$announcement = new Announcement;

	$announcement->setTitle($_POST['title']);
	$announcement->setContent($_POST['content']);

	AnnouncementDao::addAnnouncement($announcement);

	header("Location: index.php");

?>