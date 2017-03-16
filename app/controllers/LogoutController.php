<?php 

	namespace Link\Controllers;

	class LogoutController {
		public function get() {
			session_start();
			session_destroy();
			header("location:/");
		}
	}

 ?>