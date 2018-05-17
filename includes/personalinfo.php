<?php

	include_once 'connection.php';

	class PersonalInfo{
		private $id;
		private $firstname;
		private $middlename;
		private $lastname;
		private $birthday;
		private $gender;
		private $civilstatus;

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getFirstname(){
			return $this->firstname;
		}

		public function setFirstname($firstname){
			$this->firstname = $firstname;
		}

		public function getMiddlename(){
			return $this->middlename;
		}

		public function setMiddlename($middlename){
			$this->middlename = $middlename;
		}

		public function getLastname(){
			return $this->lastname;
		}

		public function setLastname($lastname){
			$this->lastname = $lastname;
		}

		public function getFullname(){
			$fname = $this->firstname;
			$mname = $this->middlename;
			$lname = $this->lastname;

			return $fname.' '.$mname[0].'. '.$lname;
		}

		public function getBirthday(){
			return $this->birthday;
		}

		public function setBirthday($birthday){
			$this->birthday = $birthday;
		}

		public function getGender(){
			return $this->gender;
		}

		public function setGender($gender){
			$this->gender = $gender;
		}

		public function getCivilstatus(){
			return $this->civilstatus;
		}

		public function setCivilstatus($civilstatus){
			$this->civilstatus = $civilstatus;
		}
	}

	class PersonalInfoDao extends Connection {
		public static function havePersonalInfo($id){
			$conn = self::getConnection();

			$result = $conn->query("SELECT * FROM PersonalInfo WHERE id=$id") or die(mysqli_error($conn));

			if ($result->num_rows)
				return true;
			else
				return false;
		}

		public static function getPersonalInfo($id){
			$personalInfo = new PersonalInfo;

			$conn = self::getConnection();

			$result = $conn->query("SELECT * FROM PersonalInfo WHERE id=$id") or die(mysqli_error($conn));

			if ($result->num_rows){
				while($row = $result->fetch_assoc()){
					$personalInfo->setId($row['id']);
					$personalInfo->setFirstname($row['firstname']);
					$personalInfo->setMiddlename($row['middlename']);
					$personalInfo->setLastname($row['lastname']);
					$personalInfo->setBirthday($row['birthday']);
					$personalInfo->setGender($row['gender']);
					$personalInfo->setCivilstatus($row['civilstatus']);
				}
			}

			return $personalInfo;
		}

		public static function addPersonalInfo($personalInfo){
			$id = $personalInfo->getId();
			$firstname = $personalInfo->getFirstname();
			$middlename = $personalInfo->getMiddlename();
			$lastname = $personalInfo->getLastname();
			$birthday = $personalInfo->getBirthday();
			$gender = $personalInfo->getGender();
			$civilstatus = $personalInfo->getCivilstatus();

			$conn = self::getConnection();

			$result = $conn->query("INSERT INTO PersonalInfo(id,firstname,middlename,lastname,birthday,gender,civilstatus) VALUES($id,'$firstname','$middlename','$lastname','$birthday','$gender','$civilstatus')") or die(mysqli_error($conn));

			return $result;
		}

		public static function editPersonalInfo($personalInfo){
			$id = $personalInfo->getId();
			$firstname = $personalInfo->getFirstname();
			$middlename = $personalInfo->getMiddlename();
			$lastname = $personalInfo->getLastname();
			$birthday = $personalInfo->getBirthday();
			$gender = $personalInfo->getGender();
			$civilstatus = $personalInfo->getCivilstatus();

			$conn = self::getConnection();

			$result = $conn->query("UPDATE PersonalInfo SET firstname='$firstname', middlename='$middlename', lastname='$lastname',birthday='$birthday',gender='$gender',civilstatus='$civilstatus' WHERE id=$id") or die(mysqli_error($conn));

			return $result;
		}
	}
?>