<?php 

	namespace Link\Controllers;
	use Link\Models\Users;

	class LoginController extends ViewController {
		public function post(){
			if (isset($_POST["log-submit"])) {

				//Login Form Validation
				$emailErr=$passErr='';
				$error=0;
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
				if ( $error === 1) {
					$this->render("home.html");
				}
				/*END*/

				else {
					$data = array(':email' => $email ,':pass' => $_POST["pass"] );
					$validate = Users::validateUser($data);
					if(!$validate)
						echo "Try Again you are not verified";
					else{
						session_start();
						$_SESSION["user"]=$validate["username"];
						$_SESSION["email"]=$validate["email"];
						$_SESSION["uid"]=$validate["uid"];
						//$_SESSION["password"]=$validate["password"];
						//setcookie("username", $validate["username"], time() + (86400 * 30));
						//setcookie("email", $validate["email"], time() + (86400 * 30));
						header("Location: /dashboard");
					}
				}
			}
			//if the submit button is not set and the post req is made on the page
			else {
				echo "Dont try to act smart ... again go to index page to login ";
				echo "Your IP ".$_SERVER["REMOTE_ADDR"]." has been blocked";
			}			
		}
		//In event of a get req on the page 
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