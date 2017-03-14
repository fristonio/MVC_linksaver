<?php 
	
	namespace Link\Models;
	class SignUp {
		public static function DB(){
			global $CONFIG;
			echo $CONFIG["dbname"];
			//it is giving error with only PDO why is it so and what happens on adding a backslash to it
			return new \PDO("mysql:host={$CONFIG['dbhost']};dbname={$CONFIG['dbname']}",$CONFIG['dbuser'], $CONFIG['dbpass']);
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