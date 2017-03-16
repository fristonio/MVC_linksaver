<?php 

	namespace Link\Models;

	class Links {
		public static function DB() {
			global $CONFIG;
			return new \PDO("mysql:host={$CONFIG['dbhost']};dbname={$CONFIG['dbname']}",$CONFIG['dbuser'], $CONFIG['dbpass']);
		}
		public function getData() {
			try {
				$userId = array(':uid' => intval($_SESSION["uid"]));
				$conn = self::DB();
				$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
				$query = "SELECT link, description, lid FROM links where uid=:uid";
				$stmt = $conn->prepare($query);
				$stmt->execute($userId);
				return $stmt->fetchAll(\PDO::FETCH_ASSOC);
			}
			catch (\PDOException $e) {
				echo $e->getMessage();
				return false;
			}

		}
		public function addLink($linkData) {
			try {
				$conn = self::DB();
				$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
				$query = "INSERT INTO links(uid, link, description) VALUES(:uid, :link, :description)";
				$stmt = $conn->prepare($query);
				$stmt->execute($linkData);
				return true;
			}
			catch (\PDOException $e) {
				echo $e->getMessage();
				return false;
			}
		}

		public function deleteLink() {

		}
	}

 ?>