<?php
	class Connection{
		public static function getConnection(){
			$servername = 'localhost';
			$username = 'root';
			$password =  '';
			$database = 'BarangayManagementSystem';

			$conn = new mysqli($servername, $username, $password, $database) or die(mysqli_error($conn));

			return $conn;
		}
	}
?>