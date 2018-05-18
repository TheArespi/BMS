<?php
	include_once 'connection.php';

	class Announcement {
		private $id;
		private $title;
		private $content;
		private $date;

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getTitle(){
			return $this->title;
		}

		public function setTitle($title){
			$this->title = $title;
		}

		public function getContent(){
			return $this->content;
		}

		public function setContent($content){
			$this->content = $content;
		}

		public function getDate(){
			return $this->date;
		}

		public function setDate($date){
			$this->date = $date;
		}
	}

	class AnnouncementDao extends Connection {
		public static function getAllAnnouncement(){
			$announcements = array();
			$conn = self::getConnection();

			$result = $conn->query("SELECT * FROM announcement");

			if ($result->num_rows){
				while($row = $result->fetch_assoc()){
					$announcement = new Announcement;

					$announcement->setId($row['id']);
					$announcement->setTitle($row['title']);
					$announcement->setContent($row['content']);
					$announcement->setDate($row['date']);

					array_push($announcements, $announcement);
				}
			}

			return $announcements;
		}

		public static function getAnnouncement($id){
			$announcement = new Announcement;
			$conn = self::getConnection();

			$result = $conn->query("SELECT * FROM announcement WHERE id=$id");

			if ($result->num_rows){
				while($row = $result->fetch_assoc()){
					$announcement->setId($row['id']);
					$announcement->setTitle($row['title']);
					$announcement->setContent($row['content']);
					$announcement->setDate($row['date']);
				}
			}

			return $announcement;
		}

		public static function addAnnouncement($announcement){
			$title = $announcement->getTitle();
			$content = $announcement->getContent();

			$conn = self::getConnection();

			$result = $conn->query("INSERT INTO announcement(title,content) VALUES('$title','$content')");

			return $result;
		}

		public static function deleteAnnouncement($id){
			$conn = self::getConnection();

			$result = $conn->query("DELETE FROM announcement WHERE id=$id");

			return $result;
		}

		public static function updateAnnouncement($announcement){
			$id = $announcement->getId();
			$title = $announcement->getTitle();
			$content = $announcement->getContent();

			$conn = self::getConnection();

			$result = $conn->query("UPDATE announcement SET title='$title', content='$content' WHERE id=$id");

			return $result;
		}
	}
?>