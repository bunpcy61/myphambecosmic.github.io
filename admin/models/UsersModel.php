<?php 
	trait UsersModel{
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
			$query = $conn->query("select * from users order by id desc limit $from,$recordPerPage");
			// trả về nhiều bẩn ghi
			return $query->fetchAll();
		}
		// tinh tổng số bản ghi
		public function modelTotalRecord(){
			// lấy biến kết nối csdl
			$conn = Connection::getInstance();
			// thực hiện truy vấn 
			$query = $conn->query("select * from users");
			// tra về tổng số bản ghi
			return $query->rowCount();
		}
		public function modelGetRecord(){
			$id = isset($_GET['id']) && $_GET['id'] > 0 ? $_GET['id'] : 0;
			// lay bien ket nối csdl
			$conn = Connection::getInstance();
			// chuẩn bị truy vấn
			$query = $conn->prepare("select * from users where id=:var_id");
			// thực thu truy vấn, có truyền tham số vào câu lệnh sql
			$query->execute(["var_id"=>$id]);
			// trả về một bản ghi
			return $query->fetch();
		}
		public function modelUpdate(){
			$id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
			$name = $_POST['name'];
			$password = $_POST['password'];
			// lay bien ket nối csdl
			$conn = Connection::getInstance();
			// chuan bị truy vấn
			$query = $conn->prepare("update users set name=:var_name where id=:var_id");
			// thuc thi truy van, có truyền tham số vào câu lệnh sql
			$query->execute(["var_id"=>$id,"var_name"=>$name]);
			// tra ve mot ban ghi
			// neus password khong rong thi update pass
			if($password != ""){
				// mã hóa pass
				$password = md5($password);
				// chuan bi truy vấn
				$query = $conn->prepare("update users set password=:var_password where id=:var_id");
				// thực thi truy vấn, có truyền tham só vào câu lênh sql
				$query->execute(["var_id"=>$id,"var_password"=>$password]);
			}

		}
		public function modelCreate(){
			$name = $_POST["name"];
			$email = $_POST["email"];
			$password = $_POST["password"];
			//ma hoa password
			$password = md5($password);
			//update name
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			$queryUsers = $conn->prepare("select * from users where email=:var_email");
			$queryUsers->execute(["var_email"=>$email]);
			$result= $queryUsers->rowCount();

			if($result > 0){
				return false;
			}
			else{
				$query = $conn->prepare("insert into users set name=:var_name,email=:var_email,password=:var_password");
				//thuc thi truy van, co truyen tham so vao cau lenh sql
				$query->execute(["var_name"=>$name,"var_email"=>$email,"var_password"=>$password]);

				return true;
			}			
		}
		public function modelDelete(){
			$id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//chuan bi truy van
			$query = $conn->prepare("delete from users where id=:var_id");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_id"=>$id]);
		}
	}	

?>