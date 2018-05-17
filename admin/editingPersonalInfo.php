<?php
	session_start();

	include_once '../includes/personalinfo.php';

	$personalInfo = new PersonalInfo;

	$personalInfo->setId($_SESSION['id']);
	$personalInfo->setFirstname($_POST['firstname']);
	$personalInfo->setMiddlename($_POST['middlename']);
	$personalInfo->setLastname($_POST['lastname']);
	$personalInfo->setBirthday($_POST['birthday']);
	$personalInfo->setGender($_POST['gender']);
	$personalInfo->setCivilStatus($_POST['civilstatus']);

	if(PersonalInfoDao::havePersonalInfo($_SESSION['id'])){
		PersonalInfoDao::editPersonalInfo($personalInfo);
	} else {
		PersonalInfoDao::addPersonalInfo($personalInfo);
	}

	header("Location: accountSetting.php");
?>