<?php 

	namespace Link\Controllers;
	use Link\Models\Signup;
	class RegisterController {
		public function post() {
			if (isset($_POST["reg-submit"])) {
				$nameErr=$emailErr=$passErr='';
				$email = $this->sanitize($_POST["email"]);
				$name = $this->sanitize($_POST["name"]);
				$error = 0;
				//validating the form data for further processing
				if (empty($name)) {
					$nameErr="Name is Required ";
					$error=1;
				}
				else{
					if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
		              $nameErr = "Entered name is not a valid name";
		              $error=1;
		            }
				}
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


				if ($error === 1) {
					header("location:/");
				}
				else{
					$data = array(':email' => $email ,':pass' => $_POST["pass"], ':name' => $name );
					$addUser = Signup::addUser($data);
					if ($addUser) {
						header("location:/");
						//echo "User has been addedto database";
					}
					else
						echo "Sorry the add user process cannot be performed";
				}
			}

			else {
				echo "Dont try to act smart ... again go to index page to login ";
				echo "Your IP ".$_SERVER["REMOTE_ADDR"]." has been blocked";
			}			
		}

		public function get() {
			header("location:/");
		}

		public function sanitize($data){
			$data = trim($data);
		  	$data = stripslashes($data);
		  	$data = htmlspecialchars($data);
		  	return $data;
		}


	}

 ?>