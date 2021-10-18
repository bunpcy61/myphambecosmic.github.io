<?php 
	include "models/AccountModel.php";
	class AccountController extends Controller{
		use AccountModel;
		public function register(){
			$this->loadView("RegisterView.php");
		}
		public function verify() {
			$this->modelVerify($_GET['activation_code']);
		}
		public function modelHotProduct(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products order by id desc limit 5,10");
			return $query->fetchAll();
		}
		public function registerPost(){
			$this->modelRegister();
		}
		public function login(){
			$this->loadView("LoginView.php");
		}
		public function loginPost(){
			$this->modelLogin();
		}
		public function logout(){
			$this->modelLogout();
			$this->loadView("LoginView.php");
		}
	}

 ?>