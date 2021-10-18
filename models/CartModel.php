<?php
	include('../gui_mail/class.smtp.php');
	include "../gui_mail/class.phpmailer.php"; 
	trait CartModel{		
		public function cartAdd($id){
		    if(isset($_SESSION['cart'][$id])){
		        //nếu đã có sp trong giỏ hàng thì số lượng lên 1
		        $_SESSION['cart'][$id]['number']++;
		    } else {
		        //lấy thông tin sản phẩm từ CSDL và lưu vào giỏ hàng
		        //---
		        //PDO
		        $conn = Connection::getInstance();
		        $query = $conn->prepare("select * from products where id=:id");
		        $query->execute(array("id"=>$id));
		        $query->setFetchMode(PDO::FETCH_OBJ);
		        $product = $query->fetch();
		        //---
		        
		        $_SESSION['cart'][$id] = array(
		            'id' => $id,
		            'name' => $product->name,
		            'photo' => $product->photo,
		            'number' => 1,
		            'price' => $product->price,
		            'discount' => $product->discount
		        );
		    }
		}
		public function cartAddWithNumber($id,$quantity){
		    if(isset($_SESSION['cart'][$id])){
		        //nếu đã có sp trong giỏ hàng thì số lượng lên 1
		        $_SESSION['cart'][$id]['number'] += $quantity;
		    } else {
		        //lấy thông tin sản phẩm từ CSDL và lưu vào giỏ hàng
		        //$product = db::get_one("select * from products where id=$id");
		        //---
		        //PDO
		        $conn = Connection::getInstance();
		        $query = $conn->prepare("select * from products where id=:id");
		        $query->execute(array("id"=>$id));
		        $query->setFetchMode(PDO::FETCH_OBJ);
		        $product = $query->fetch();
		        //---
		        
		        $_SESSION['cart'][$id] = array(
		            'id' => $id,
		            'name' => $product->name,
		            'photo' => $product->photo,
		            'number' => $quantity,
		            'price' => $product->price,
		            'discount' => $product->discount
		        );
		    }
		}
		/**
		 * Cập nhật số lượng sản phẩm
		 * @param int
		 * @param int
		 */
		public function cartUpdate($id, $number){
		    if($number==0){
		        //xóa sp ra khỏi giỏ hàng
		        unset($_SESSION['cart'][$id]);
		    } else {
		        $_SESSION['cart'][$id]['number'] = $number;
		    }
		}
		/**
		 * Xóa sản phẩm ra khỏi giỏ hàng
		 * @param int
		 */
		public function cartDelete($id){
		    unset($_SESSION['cart'][$id]);
		}
		/**
		 * Tổng giá trị giỏ hàng
		 */
		public function cartTotal(){
		    $total = 0;
		    foreach($_SESSION['cart'] as $product){
		        $total += ($product['price']-$product['price']*$product['discount']/100) * $product['number'];
		    }
		    return $total;
		}
		/**
		 * Số sản phẩm có trong giỏ hàng
		 */
		public function cartNumber(){
		    $number = 0;
		    foreach($_SESSION['cart'] as $product){
		        $number += $product['number'];
		    }
		    return $number;
		}
		/**
		 * Danh sách sản phẩm trong giỏ hàng
		 */
		public function cartList(){
		    return $_SESSION['cart'];
		}
		/**
		 * Xóa giỏ hàng
		 */
		public function cartDestroy(){
		    $_SESSION['cart'] = array();
		}
		//=============
		//checkout
		public function cartCheckOut(){
			$conn = Connection::getInstance();
			$email = $_SESSION["customer_email"];			
			//lay id vua moi insert
			$customer_id = $_SESSION["customer_id"];
			//---
			//---
			//insert ban ghi vao orders, lay order_id vua moi insert
			//lay tong gia cua gio hang
			$price = $this->cartTotal();
			$query = $conn->prepare("insert into orders set customer_id=:customer_id, date=now(),price=:price");
			$query->execute(array("customer_id"=>$customer_id,"price"=>$price));
			//lay id vua moi insert
			$order_id = $conn->lastInsertId();
			//---
			//duyet cac ban ghi trong session array de insert vao orderdetails
			foreach($_SESSION["cart"] as $product){
				$query = $conn->prepare("insert into orderdetails set order_id=:order_id, product_id=:product_id, price=:price, quantity=:quantity");
				$query->execute(array("order_id"=>$order_id,"product_id"=>$product["id"],"price"=>$product["price"],"quantity"=>$product["number"]));
				$content = 'Bạn đã thanh toán đơn hàng thành công!';
				$title = 'Becosmic đặt hàng thành công';
				$nTo = 'Test';
				$mTo = $email;
				$mail = $this->sendMail($title, $content, $nTo, $mTo);
				header("location:index.php?controller=cart");
			}
			//xoa gio hang
			unset($_SESSION["cart"]);
		}
		//=============
		public function modelHotNews(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from news where hot = 1 order by id desc limit 0,10");
			return $query->fetchAll();
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
	}	}
?>