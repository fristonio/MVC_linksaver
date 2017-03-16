<?php 
	
	namespace Link\Models;

	class Users {
		public static function DB(){
			global $CONFIG;
			return new \PDO("mysql:host={$CONFIG['dbhost']};dbname={$CONFIG['dbname']}",$CONFIG['dbuser'], $CONFIG['dbpass']);
		}
		
		public function validateUser( $userData ) {
			try {
				$conn = self::DB();
				$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
				$query = "SELECT uid, email, username FROM users WHERE email=:email and password=:pass";
				$stmt = $conn->prepare($query);
				$stmt->execute($userData);
				return $stmt->fetch(\PDO::FETCH_ASSOC);
			}
			catch (\PDOException $e) {
				echo $e->getMessage();
				return false;
			}
			
		}
		public function getUserData( $userData ) {
			try {
				$conn = self::DB();
				$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
				$query = "SELECT uid, email, username FROM users WHERE uid=:uid;";
				$stmt = $conn->prepare($query);
				$stmt->execute($userData);
				return $stmt->fetch(\PDO::FETCH_ASSOC);
			}
			catch (\PDOException $e) {
				echo $e->getMessage();
				return false;
			}
		}
		public function addUser( $userData ) {
			try {
				$conn = self::DB();
				$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
				$query = "INSERT INTO users (username, email, password) VALUES(:name, :email, :pass)";
				$stmt = $conn->prepare($query);
				$stmt->execute($userData);
				return true;
			}
			catch (\PDOException $e) {
				echo $e->getMessage();
				return false;
			}
			
		} 
	}

 ?>