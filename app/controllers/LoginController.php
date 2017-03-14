<?php 

	namespace Link\Controllers;
	use Link\Models\Login;

	class LoginController extends ViewController{
		public function post(){
			if (isset($_POST["log-submit"])) {
				$email = self::sanitize($_POST["email"]);
				Login::validateUser();
			}
			else {
				echo "Dont try to act smart ... again go to index page to login ";
				echo "Your IP ".$_SERVER["REMOTE_ADDR"]." has been blocked";
			}			
		}
		public function get(){
			header("location:/");
		}
		public function sanitize($data) {
		  	$data = trim($data);
		  	$data = stripslashes($data);
		  	$data = htmlspecialchars($data);
		  	return $data;
		}
	}

 ?>