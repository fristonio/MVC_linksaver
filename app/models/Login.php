<?php 
	
	global $CONFIG;
	namespace Link\Models;

	class Login {
		public static function DB(){
			return new PDO("mysql:host:$CONFIG["dbhost"];dbname=$CONFIG["dbname"]",$CONFIG["dbuser"], $CONFIG["dbpass"]);
		}
		
		public function validateUser( $userData ) {
			$conn = self::DB();
			
		} 
	}

 ?>