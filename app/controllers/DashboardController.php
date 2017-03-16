<?php 

	namespace Link\Controllers;
	use Link\Models\Links;
	use Link\Models\Users;

	class DashboardController extends ViewController {
		public function get() {
			session_start();
			if (!isset($_SESSION["user"])) {
				header("location:/");
			}
			else {
				$linkData = Links::getData();
				$userData = Users::getUserData(array(':uid'=>intval($_SESSION["uid"])));
				$this->render("dashboard.html", ['links' => $linkData, 'user' => $userData]);	
			}
		}

		public function post() {
			session_start();
			if (isset($_POST["link-submit"])) {
				$email=$link=$description='';
				$link=$this->sanitize($_POST["link"]);
				$description=$this->sanitize($_POST["description"]);
				$uid=$_SESSION["uid"];
				$linkData = array(':uid'=>$uid, ':link'=>$link, ':description'=>$description);
				if(Links::addLink($linkData)) {
					$this->get();
				}
			}
		}

		public function sanitize($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	}

 ?>