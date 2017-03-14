<?php 

	namespace Link\Controllers;
	use Link\Models\Login;

	class LoginController extends ViewController {
		public function post(){
			if (isset($_POST["log-submit"])) {
				$emailErr=$passErr='';
				$email = $this->sanitize($_POST["email"]);
				if (empty($email)) {
					$emailErr="Email req ... No yahoo plz...!!";
					$error=1;
				}
				else{
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					  $emailErr = "Don't u know the format of email ..."; 
					  $error=1;
					}
				}
				if (empty($_POST["pass"])) {
					$passErr="Password is mandatory";
					$error=1;
				}
				if ($error) {
					header("location:/");
				}
				else {
					$data = array('email' => $email ,'pass' => $_POST["pass"] );
					Login::validateUser($data);
				}
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