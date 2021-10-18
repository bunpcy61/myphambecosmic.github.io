<?php 
	trait HomeModel{
		// san phảm nổi bật
		public function modelHotProduct(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products order by id desc limit 0,6");
			return $query->fetchAll();
		}
		// lay cac danh muc có chứa sản phẩm bên trong
		public function modelCategories(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from categories where id in (select category_id from products)");
			return $query->fetchAll();
		}
		// lấy các sản phẩm thuộc danh mục
		public function modelProducts($category_id){
			$conn = Connection::getInstance();
			$query = $conn->query("select *from products where category_id = $category_id order by id desc limit 0,6");
			return $query->fetchAll();
		}
		public function modelProducts_($category_id){
			$conn = Connection::getInstance();
			$query = $conn->query("select *from products where category_id = $category_id order by id desc limit 0,4");
			return $query->fetchAll();
		}
		public function modelHotNews(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from news where hot = 1 order by id desc limit 0,10");
			return $query->fetchAll();
		}
	}
 ?>