<?php 
	class HomeController extends Controller{
		// ham tạo
		public function __construct(){
			// kiểm tra xem user đã đăng nhập chưa
			$this->authentication();
		}
		public function index(){
			// load view
			$this->loadView("HomeView.php");
		}
	}


 ?>