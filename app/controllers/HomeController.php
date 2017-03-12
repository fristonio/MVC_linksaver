<?php 
	
	namespace Link\Controllers;

	class HomeController extends ViewController {
		public function get(){
			$this->render("home.html");
		}
	}
 ?>