<?php 
	class ContactController extends Controller{
		public function index(){
			$this->loadView("ContactView.php");
		}
		public function modelHotProduct(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products order by id desc limit 5,10");
			return $query->fetchAll();
		}
		public function modelHotNews(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from news where hot = 1 order by id desc limit 0,10");
			return $query->fetchAll();
		}
	}
 ?>