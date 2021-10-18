<?php 
	// start session
	session_start();
	// load file Connection.php
	include "../application/Connection.php";
	// load file Controller.php
	include "../application/Controller.php";
 ?>
 <?php 
 	// load động MVC vào tham số controller truyền lên url 
 	$controller = isset($_GET['controller']) ? $_GET['controller']:"Home";
 	$action = isset($_GET["action"])? $_GET["action"]:"index";
 	// tạo đường dẫn vật lý của file controller trong MVC.
 	// hàm ucfirst(string) sẽ viết hoa ký tự đầu tiên
 	$controllerFile = "controllers/".ucfirst($controller)."Controller.php";
 	// file_exists(duong dan) trả về file đã tồn tại không thì trả về false
 	if(file_exists($controllerFile)){
 		include $controllerFile;
 		$controllerClass = ucfirst($controller)."Controller";
 		// khởi tạo object của class
 		$obj = new $controllerClass();
 		// gọi đến action
 		$obj->$action();

 	}
 	else die("File $controllerFile không tồn tại");
 	// hàm die("Chuoi") xuất ra thông báo chuỗi



  ?>