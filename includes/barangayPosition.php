<?php
	include_once 'connection.php';

	class BarangayPosition {
		private $positionCode;
		private $position;
		private $numOfMembers;
		private $hierarchy;

		public function getPositionCode(){
			return $this->positionCode;
		}

		public function setPositionCode($positionCode){
			$this->positionCode = $positionCode;
		}

		public function getPosition(){
			return $this->position;
		}

		public function setPosition($position){
			$this->position = $position;
		}

		public function getNumOfMembers(){
			return $this->numOfMembers;
		}

		public function setNumOfMembers($numOfMembers){
			$this->numOfMembers = $numOfMembers;
		}

		public function getHierarchy(){
			return $this->hierarchy;
		}

		public function setHierarchy($hierarchy){
			$this->hierarchy = $hierarchy;
		}
	}

	class BarangayPositionDao extends Connection{
		public static function getPositions(){
			$positions = array();

			$conn = self::getConnection();

			$result = $conn->query("SELECT * FROM barangayPosition") or die(mysqli_error($conn));

			if ($result->num_rows){
				while($row = $result->fetch_assoc()){
					$position = new BarangayPosition;

					$position->setPositionCode($row['positionCode']);
					$position->setPosition($row['position']);
					$position->setNumOfMembers($row['numOfMember']);
					$position->setHierarchy($row['hierarchy']);

					array_push($positions, $position);
				}
			}

			return $positions;
		}

		public static function getPosition($positionName){
			$position = new BarangayPosition;

			$conn = self::getConnection();

			$result = $conn->query("SELECT * FROM barangayPosition WHERE positionCode='$positionName'") or die(mysqli_error($conn));

			if ($result->num_rows){
				while($row = $result->fetch_assoc()){

					$position->setPositionCode($row['positionCode']);
					$position->setPosition($row['position']);
					$position->setNumOfMembers($row['numOfMember']);
					$position->setHierarchy($row['hierarchy']);

				}
			}

			return $position;
		}
	}
?>