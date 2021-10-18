<?php 
	trait SearchModel{
		//lay ve danh sach cac ban ghi
		public function modelRead($recordPerPage){
			//lay bien page truyen tu url
			$key = isset($_GET["key"]) ? $_GET["key"] : "";
			//lay tu ban ghi nao
			$page = isset($_GET["p"])&& $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
			$from = $page * $recordPerPage;
			//---
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from products where name like '%$key%' order by id desc limit $from, $recordPerPage");
			//tra ve nhieu ban ghi
			return $query->fetchAll();
		}
		public function modelHotProduct(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products order by id desc limit 5,10");
			return $query->fetchAll();
		}
		//tinh tong so ban ghi
		public function modelTotalRecord(){
			$key = isset($_GET["key"]) ? $_GET["key"] : "";
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from products where name like '%$key%'");
			//tra ve so luong ban ghi
			return $query->rowCount();
		}
		//lay ve danh sach cac ban ghi
		public function modelReadSearchPrice($recordPerPage){
			//lay bien page truyen tu url
			$fromPrice = isset($_GET["fromPrice"]) ? $_GET["fromPrice"] : "";
			$toPrice = isset($_GET["toPrice"]) ? $_GET["toPrice"] : "";
			//lay tu ban ghi nao
			$page = isset($_GET["p"])&& $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
			$from = $page * $recordPerPage;
			//---
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from products where price >=$fromPrice and price <= $toPrice order by id desc limit $from, $recordPerPage");
			//tra ve nhieu ban ghi
			return $query->fetchAll();
		}
		//tinh tong so ban ghi
		public function modelTotalRecordSearchPrice(){
			$fromPrice = isset($_GET["fromPrice"]) ? $_GET["fromPrice"] : "";
			$toPrice = isset($_GET["toPrice"]) ? $_GET["toPrice"] : "";
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from products where price >= $fromPrice and price <= $toPrice");
			//tra ve so luong ban ghi
			return $query->rowCount();
		}
		public function modelAjaxSearch(){
			$key = isset($_GET["key"]) ? $_GET["key"] : "";
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from products where name like '%$key%'");
			//tra ve tất cả các kết quả
			return $query->fetchAll();
		}
		public function modelHotNews(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from news where hot = 1 order by id desc limit 0,10");
			return $query->fetchAll();
		}
		public function modelGetCategory($category_id){			
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from categories where id = $category_id");
			//tra ve so luong ban ghi
			return $query->fetch();
		}

	}

 ?>