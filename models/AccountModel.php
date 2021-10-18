<?php
	include('../gui_mail/class.smtp.php');
	include "../gui_mail/class.phpmailer.php"; 

	trait AccountModel{
		public function modelHotNews(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from news where hot = 1 order by id desc limit 0,10");
			return $query->fetchAll();
		}
		public function modelVerify($activation_code){
			$conn = Connection::getInstance();
			$queryCheck = $conn->prepare("select email from customers where activation_code=:activation_code");
			$queryCheck->execute(["activation_code"=>$activation_code]);
			if($queryCheck->rowCount() > 0){
				$query = $conn->prepare('update customers set active = 1');
				$query->execute();
				header("location:index.php?controller=account&action=login");
			}
			else{
				header("location:index.php?controller=account&action=register");
			}
		}
		public function modelRegister(){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$password = $_POST['password'];
			// ma hoa password
			$password = md5($password);
			//--
			$conn = Connection::getInstance();
			// kiểm tra nếu email chưa tồn tại thì in insert bản ghi
			$queryCheck = $conn->prepare("select email from customers where email=:var_email");
			$queryCheck->execute(["var_email"=>$email]);
			if($queryCheck->rowCount() > 0){
				header("location:index.php?controller=account&action=register&notify=error");
			}
			else{
				// insert ban ghi
				$activation_code = md5(rand());
			
				$query = $conn->prepare("insert into customers set name=:var_name,email=:var_email,address=:var_address,phone=:var_phone,password=:var_password,activation_code=:activation_code");
				$query->execute(["var_name"=>$name,"var_email"=>$email,"var_address"=>$address,"var_phone"=>$phone,"var_password"=>$password, 'activation_code' => $activation_code]);
				$href = 'http://localhost/php56/php56_BTVN1_rewrite/index.php?controller=account&action=verify&activation_code='.$activation_code;
				$url = '<a href="'.$href.'">Click vào đây để xác minh tài khoản</a>';
				$title = 'Becosmic Xác minh tài khoản';
				$nTo = 'Test';
				$mTo = $email;
				$mail = $this->sendMail($title, $url, $nTo, $mTo);
				header("location:index.php?controller=account&action=register&notify=confirm");
			}
		}
		public function modelLogin(){
			$email = $_POST["email"];
			$password = $_POST['password'];
			// ma hóa password
			$password = md5($password);
			//--
			$conn = Connection::getInstance();
			$query = $conn->prepare("select id,email,password from customers where email=:var_email and active = 1"); // CHỗ này nè
			$query->execute(["var_email"=>$email]);
			if($query->rowCount() > 0){
				// lấy một bản ghi
				$result = $query->fetch();
				if($password == $result->password){
					$_SESSION['customer_id'] = $result->id;
					$_SESSION['customer_email'] =$result->email;
					header("location:index.php");
				}
				else{
					header("location:index.php?controller=account&account=login");
				}
			}
			//--
		}
		public function modelLogout(){
			// hủy các biến sesion
			unset($_SESSION['customer_id']);
			unset($_SESSION['customer_email']);
			/*header("location:index.php?controller=account&action=login");*/

		}

		public function sendMail($title, $content, $nTo, $mTo){
			$nFrom = 'Devpro Việt Nam';
			$mFrom = 'hangchibun600@gmail.com';	//dia chi email cua ban
			
			// truy cập " https://myaccount.google.com/security " bật xác minh 2 bước rồi tạo mật khẩu ứng dụng
			$mPass = 'lanhthihang2000';		//mat khau ung dung

			$mail  = new PHPMailer();
			$body  = $content;
			$mail->IsSMTP(); 
			$mail->CharSet 	= "utf-8";
			$mail->SMTPDebug  = 0;                     // enables SMTP debug information
			$mail->SMTPAuth   = true;                  	// enable SMTP authentication
			$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
			$mail->Host       = "smtp.gmail.com";      	
			$mail->Port       = 465;
			$mail->Username   = $mFrom;  			 // GMAIL username
			$mail->Password   = $mPass;           	 // GMAIL password
			$mail->SetFrom($mFrom, $nFrom);
			$mail->Subject    = $title;
			$mail->MsgHTML($body);
			$address = $mTo;
			$mail->AddAddress($address, $nTo);
			
			// $mail->AddReplyTo('buivietha023@gmail.com', 'Hakk');    //trường hợp đổi email nhận phản hồi
			if(!$mail->Send()) {
				return 0;   // lỗi
			} else {
				return 1;   // thành công
			}
}
	}


 ?>