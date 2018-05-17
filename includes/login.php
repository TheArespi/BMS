<?php
	class Login {
		private $id;
		private $username;
		private $password;
		private $access;

		public function getId(){
			return $this->id;
		} 

		public function setId($id){
			$this->id = $id;
		}

		public function getUsername(){
			return $this->username;
		} 

		public function setUsername($username){
			$this->username = $username;
		}

		public function getPassword(){
			return $this->password;
		} 

		public function setPassword($password){
			$this->password = $password;
		}

		public function getAccess(){
			return $this->access;
		}

		public function setAccess($access){
			$this->access = $access;
		}
	}
?>