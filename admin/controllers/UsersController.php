<?php 
	// include file model vào đây
	include "models/UsersModel.php";
	class UsersController extends Controller{
		// kế thừa class UsersModel
		use UsersModel;
		public function index(){
			// quy định số bản ghi trên một trang 
			$recordPerPage = 3;
			// tính số trang 
			$numPage = ceil($this->modelTotalRecord()/$recordPerPage);
			// lấy dữ liệu từ model
			$data = $this->modelRead($recordPerPage);
			// gọi view, truyền dữ liệu ra view
			$this->loadView("UsersView.php",["data"=>$data,"numPage"=>$numPage]);
		}
		public function update(){
	 		$id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
	 		// laya một bản ghi
	 		$record = $this->modelGetRecord();
	 		// tạo biến $action để biết được khi nào ấn nút submit thì trang sẽ submit đến đâu
	 		$action = "index.php?controller=users&action=updatePost&id=$id";
	 		// goi view, truyền dữ liệu ra view
	 		$this->loadView("UsersFormView.php",["record"=>$record,"action"=>$action]);
	 	}
		public function updatePost(){
	 		$id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
	 		// gọi hàm modelUpdate để update bản ghi
	 		$this->modelUpdate();
	 		header("location:index.php?controller=users");
	 	}
	 	public function create(){
	 		$action = "index.php?controller=users&action=createPost";
	 		// goi view, truyền dữ liệu ra view
	 		$this->loadView("UsersFormView.php",["action"=>$action]);
	 	}
	 	public function createPost(){
	 		$result = $this->modelCreate();
	 		session_start();
	 		if($result){
	 			$_SESSION['users-success'] = "Tài khoản được tạo thành công!";
	 			header("location:index.php?controller=users");
	 		}else{
	 			$_SESSION['users-fail'] = "Email đã tồn tại! Vui lòng nhập email khác";
	 			header("location:index.php?controller=users&action=create");
	 		}	 		
	 	}
	 	public function delete(){
	 		$id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
	 		$this->modelDelete();
	 		header("location:index.php?controller=users");
	 	}
	}
?>
