<?php
	
	include_once 'connection.php';
	include_once 'login.php';

	class LoginDao extends Connection {
		
		public static function isUsernameTaken($username){
			$conn = self::getConnection();

			$result = $conn->query("SELECT * FROM login WHERE username='$username'");

			if ($result->num_rows)
				return true;
			else
				return false;
		}

		public static function getLoginInfoByUsername($username){

			$login = new Login;

			$conn = self::getConnection();

			$result = $conn->query("SELECT * FROM login WHERE username='$username'");

			if ($result->num_rows){
				while($row = $result->fetch_assoc()){
					$login->setId($row['id']);
					$login->setUsername($row['username']);
					$login->setPassword($row['password']);
					$login->setAccess($row['access']);
				}
			}
			
			return $login;
		}

		public static function getLoginInfoByid($id){

			$login = new Login;

			$conn = self::getConnection();

			$result = $conn->query("SELECT * FROM login WHERE id=id");

			if ($result->num_rows){
				while($row = $result->fetch_assoc()){
					$login->setId($row['id']);
					$login->setUsername($row['username']);
					$login->setPassword($row['password']);
					$login->setAccess($row['access']);
				}
			}
			
			return $login;
		}

		public static function updateUsername($username,$id){

			$conn = self::getConnection();

			$result = $conn->query("UPDATE login SET username='$username' WHERE id=$id");

			return $result;
		}

		public static function updatePassword($password,$id){

			$conn = self::getConnection();

			$result = $conn->query("UPDATE login SET password='$password' WHERE id=$id");

			return $result;
		}

		public static function updateAccess($access, $id){
			$conn = self::getConnection();

			$result = $conn->query("UPDATE login SET access='$access' WHERE id=$id");

			return $result;
		}

	}
?>