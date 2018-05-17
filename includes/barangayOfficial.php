<?php
	include_once 'connection.php';

	class BarangayOfficial{
		private $id;
		private $position;
		private $name;

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getPosition(){
			return $this->position;
		}

		public function setPosition($position){
			$this->position = $position;
		}

		public function getName(){
			return $this->name;
		}

		public function setName($name){
			$this->name = $name;
		}
	}

	class BarangayOfficialDao extends Connection{
		public static function getAllOfficials(){
			$officials = array();

			$conn = self::getConnection();

			$result = $conn->query("SELECT * FROM barangayOfficial") or die(mysqli_error($conn));

			if ($result->num_rows){
				while($row = $result->fetch_assoc()){
					$official = new BarangayOfficial;

					$official->setId($row['id']);
					$official->setPosition($row['position']);
					$official->setName($row['name']);

					array_push($officials, $official);
				}
			}

			return $officials;

		}

		public static function getOfficial($id){
			$official = new BarangayOfficial;

			$conn = self::getConnection();

			$result = $conn->query("SELECT * FROM barangayOfficial WHERE id=$id") or die(mysqli_error($conn));

			if ($result->num_rows){
				while($row = $result->fetch_assoc()){

					$official->setId($row['id']);
					$official->setPosition($row['position']);
					$official->setName($row['name']);

				}
			}

			return $official;
		}

		public static function countMemberOf($position){

			$conn = self::getConnection();

			$result = $conn->query("SELECT * FROM barangayOfficial WHERE position='$position'") or die(mysqli_error($conn));

			return $result->num_rows;
		}

		public static function updateOfficial($official){
			$id = $official->getId();
			$position = $official->getPosition();
			$name = $official->getName();

			$conn = self::getConnection();

			$result = $conn->query("UPDATE barangayOfficial SET position='$position', name='$name' WHERE id=$id") or die(mysqli_error($conn));

			return $result;
		}

		public static function addOfficial($official){
			$id = $official->getId();
			$position = $official->getPosition();
			$name = $official->getName();

			$conn = self::getConnection();

			$result = $conn->query("INSERT INTO barangayOfficial(position,name) VALUES('$position','$name')") or die(mysqli_error($conn));

			return $result;
		}

		public static function deleteOfficial($id){
			$conn = self::getConnection();

			$result = $conn->query("DELETE FROM barangayOfficial WHERE id=$id") or die(mysqli_error($conn));

			return $result;
		}
	}
?>