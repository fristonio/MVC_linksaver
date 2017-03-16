<?php 

	namespace Link\Controllers;
	use Link\Models\Links;

	class DeleteLinkController {
		public function get() {
			session_start();
			if (!isset($_SESSION["uid"])) {
				header("location:/");
			}
			else {
				$deleteLinkData = array(':uid'=>$_SESSION["uid"], ':lid'=>$_GET["listid"]);
				var_dump($deleteLinkData);
				Links::deleteLink($deleteLinkData);
			}
		}
	}

 ?>