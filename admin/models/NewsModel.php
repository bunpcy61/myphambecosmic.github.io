<?php 
	trait NewsModel{
		// lấy về danh sách các bản ghi
		public function modelRead($recordPerPage){
			// lấy về page truyền từ url
			$page = isset($_GET['p']) && $_GET['p'] > 0 ? $_GET['p']-1 : 0;
			// lấy từ bản ghi nào 
			$from = $page * $recordPerPage;
			//--
			// lấy biến kết nối csdl
			$conn = Connection::getInstance();
			// thực hiện truy vấn 
			$query = $conn->query("select * from news order by id desc limit $from,$recordPerPage");
			// trả về nhiều bẩn ghi
			return $query->fetchAll();
		}
		// tinh tổng số bản ghi
		public function modelTotalRecord(){
			// lấy biến kết nối csdl
			$conn = Connection::getInstance();
			// thực hiện truy vấn 
			$query = $conn->query("select * from news");
			// tra về tổng số bản ghi
			return $query->rowCount();
		}
		public function modelGetRecord(){
			$id = isset($_GET['id']) && $_GET['id'] > 0 ? $_GET['id'] : 0;
			// lay bien ket nối csdl
			$conn = Connection::getInstance();
			// chuẩn bị truy vấn
			$query = $conn->prepare("select * from news where id=:var_id");
			// thực thu truy vấn, có truyền tham số vào câu lệnh sql
			$query->execute(["var_id"=>$id]);
			// trả về một bản ghi
			return $query->fetch();
		}
		public function modelUpdate(){
			$id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
			$name = $_POST['name'];
			$description = $_POST["description"];
			$content = $_POST["content"];
			$hot = isset($_POST["hot"]) ? 1 : 0;
			// lay bien ket nối csdl
			$conn = Connection::getInstance();
			// chuan bị truy vấn
			$query = $conn->prepare("update news set name=:var_name,description=:var_description,content=:var_content,hot=:var_hot where id=:var_id");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_id"=>$id,"var_name"=>$name,"var_description"=>$description,"var_content"=>$content,"var_hot"=>$hot]);
			// tra ve mot ban ghi
			$photo = "";
			/*
				- $_FILES["photo"]["name"] -> lay ten file
				- time() -> tra ve mot so nguyen chi thoi gian hien tai
				- $_FILES["photo"]["tmp_name"] -> khi an nut submit thi file se duoc dua len thu muc tmp cua bo cai php (co duoi la .tmp)
				- move_uploaded_file -> chuyen file tu thu muc tmp sang thu muc muon upload
				- unlink(duongdanfile) -> xoa ten file
			*/
			if($_FILES["photo"]["name"] != ""){
				//---
				//lay anh cu de xoa
				$oldPhoto = $conn->query("select photo from news where id=$id");
				if($oldPhoto->rowCount() > 0){
					$record = $oldPhoto->fetch();
					//xoa anh
					if($record->photo != "" && file_exists("../assets/upload/news/".$record->photo))
						unlink("../assets/upload/news/".$record->photo);
				}
				//---
				$photo = time()."_".$_FILES["photo"]["name"];
				move_uploaded_file($_FILES["photo"]["tmp_name"],"../assets/upload/news/$photo");
				$query = $conn->prepare("update news set photo=:var_photo where id=$id");
				$query->execute(array("var_photo"=>$photo));
			}
			//---

		}
		public function modelCreate(){
			$name = $_POST["name"];
			$description = $_POST["description"];
			$content = $_POST["content"];
			$hot = isset($_POST["hot"]) ? 1 : 0;	
			//---
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//neu user upload anh thi thuc hien upload			
			$photo = "";
			/*
				- $_FILES["photo"]["name"] -> lay ten file
				- time() -> tra ve mot so nguyen chi thoi gian hien tai
				- $_FILES["photo"]["tmp_name"] -> khi an nut submit thi file se duoc dua len thu muc tmp cua bo cai php (co duoi la .tmp)
				- move_uploaded_file -> chuyen file tu thu muc tmp sang thu muc muon upload
				- unlink(duongdanfile) -> xoa ten file
			*/
			if($_FILES["photo"]["name"] != ""){
				$photo = time()."_".$_FILES["photo"]["name"];
				move_uploaded_file($_FILES["photo"]["tmp_name"],"../assets/upload/news/$photo");
			}
			//---		
			//update name			
			//chuan bi truy van
			$query = $conn->prepare("insert into news set name=:var_name,description=:var_description,content=:var_content,hot=:var_hot,photo=:var_photo");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_name"=>$name,"var_description"=>$description,"var_content"=>$content,"var_hot"=>$hot,"var_photo"=>$photo]);
			
		}
		public function modelDelete(){
			$id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//---
			//lay anh cu de xoa
			$oldPhoto = $conn->query("select photo from news where id=$id");
			if($oldPhoto->rowCount() > 0){
				$record = $oldPhoto->fetch();
				//xoa anh
				if($record->photo != "" && file_exists("../assets/upload/news/".$record->photo))
					unlink("../assets/upload/news/".$record->photo);
			}
			//---
			//chuan bi truy van
			$query = $conn->prepare("delete from news where id=:var_id");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_id"=>$id]);
		}
	}	

?>