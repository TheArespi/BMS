<?php
	include_once 'connection.php';
	include_once 'barangayInfo.php';

	class BarangayInfoDao extends Connection{
		public static function getInfo($name){
			$info = new BarangayInfo;

			$conn = self::getConnection();

			$result = $conn->query("SELECT * FROM barangayInfo WHERE name='$name'") or die(mysqli_error($conn));

			if ($result->num_rows){
				while($row = $result->fetch_assoc()){
					$info->setId($row['id']);
					$info->setName($row['name']);
					$info->setValue($row['value']);
				}
			}

			return $info;
		}

		public static function updateInfo($name, $value){
			$conn = self::getConnection();

			$result = $conn->query("UPDATE barangayInfo SET value='$value' WHERE name='$name'") or die(mysqli_error($conn));

			return $result;
		}
	}
?>