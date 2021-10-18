<?php 
	// include file model vào đây
	include "models/NewsModel.php";
	class NewsController extends Controller{
		// kế thừa class NewsModel
		use NewsModel;
		public function index(){
			// quy định số bản ghi trên một trang 
			$recordPerPage = 20;
			// tính số trang 
			$numPage = ceil($this->modelTotalRecord()/$recordPerPage);
			// lấy dữ liệu từ model
			$data = $this->modelRead($recordPerPage);
			// gọi view, truyền dữ liệu ra view
			$this->loadView("NewsView.php",["data"=>$data,"numPage"=>$numPage]);
		}
		public function update(){
	 		$id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
	 		// laya một bản ghi
	 		$record = $this->modelGetRecord();
	 		// tạo biến $action để biết được khi nào ấn nút submit thì trang sẽ submit đến đâu
	 		$action = "index.php?controller=news&action=updatePost&id=$id";
	 		// goi view, truyền dữ liệu ra view
	 		$this->loadView("NewsFormView.php",["record"=>$record,"action"=>$action]);
	 	}
		public function updatePost(){
	 		$id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
	 		// gọi hàm modelUpdate để update bản ghi
	 		$this->modelUpdate();
	 		header("location:index.php?controller=news");
	 	}
	 	public function create(){
	 		$action = "index.php?controller=news&action=createPost";
	 		// goi view, truyền dữ liệu ra view
	 		$this->loadView("NewsFormView.php",["action"=>$action]);
	 	}
	 	public function createPost(){
	 	 $this->modelCreate();
	 		header("location:index.php?controller=news");
	 	}
	 	public function delete(){
	 		$id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
	 		$this->modelDelete($id);
	 		header("location:index.php?controller=news");
	 	}
	}
?>
