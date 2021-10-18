<?php 
	include "models/ProductsModel.php";
	class ProductsController extends Controller{
		//ke thua
		use ProductsModel;
		public function category(){
			$id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 20;
			//tinh so trang
			$numPage = ceil($this->modelTotalRecord()/$recordPerPage);
			//lay du lieu tu model
			$data = $this->modelRead($recordPerPage);
			//goi view, truyen du lieu ra view
			$this->loadView("CategoryProductsView.php",["data"=>$data,"numPage"=>$numPage, "id"=>$id]);
		}
		public function modelHotProduct(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products order by id desc limit 5,10");
			return $query->fetchAll();
		}
		//chi tiet san pham
		public function detail(){
			$id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
			$record = $this->modelGetProduct($id);	
			//goi view, truyen du lieu ra view
			$this->loadView("DetailProductsView.php",["record"=>$record,"id"=>$id]);
		}
		//danh gia so sao
		public function rating(){
			$id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
			$this->modelRating();
			$record = $this->modelGetProduct($id);
			//di chuye den trang chi tiet san pham
			//header("location:index.php?controller=products&action=detail&id=$id");
			$this->loadView("DetailProductsView.php",["record"=>$record,"id"=>$id]);
		}
	}
 ?>