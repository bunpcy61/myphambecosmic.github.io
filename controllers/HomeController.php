<?php 
//load file model
	include "models/HomeModel.php";
	class HomeController extends Controller{
		use HomeModel;
		//neu action khong duoc truyen len url thi mac dinh action=index
		public function index(){
			//goi ham loadView cua class Controller de truyen du lieu
			$this->loadView("HomeView.php");
		}
	}
 ?>