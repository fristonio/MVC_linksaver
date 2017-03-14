<?php 
	
	require_once './../conf/config.php';

	namespace Link\Models;
	class Login {
		public static function DB(){
			return new \PDO("mysql:host:{$dbhost};dbname={$dbname}",$dbuser, $dbpass);
		}
	}

 ?>