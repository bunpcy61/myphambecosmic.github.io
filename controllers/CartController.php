<?php 
	include "models/CartModel.php";
	class CartController extends Controller{
		use CartModel;
		public function __construct(){
			//kiem tra neu gio ahng cua ton tai thi khoi tao no
			if(isset($_SESSION["cart"]) == false)
				$_SESSION['cart'] = array();
		}
		//hien ti danh sach cac san pham trong gio hang
		public function index(){
			$this->loadView("CartView.php");
		}
		//them san pham vao gio hang
		public function create(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham trong model
			$this->cartAdd($id);
			//header("location:index.php?controller=cart");
			$this->loadView("CartView.php");
		}
		//xóa sản phẩm
		public function delete(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham trong model
			$this->cartDelete($id);
			header("location:index.php?controller=cart");
		}
		//xóa tất cả sản phẩm khỏi giỏ hàng
		public function destroy(){
			//gọi hàm trong model
			$this->cartDestroy();
			header("location:index.php?controller=cart");
		}
	// cập nhật số lượng sản phẩm
	public function update(){
		foreach($_SESSION["cart"] as $product){
			$name = "product_".$product["id"];
			$number = $_POST[$name];
			$this->cartUpdate($product["id"],$number);
		}
		header("location:index.php?controller=cart");
	}
	// thanh toán giỏ hàng
	public function checkout(){
		// kiểm tra nếu user chưa đăng nhập thì yêu cầu đăng nhập
		if(isset($_SESSION["customer_email"]) == false)
			header("location:index.php?controller=account&action=login");
		else{
			// gọi hàm cartCheckout trong model
			$this->cartCheckout();
			header("location:index.php?controller=cart");

		}

	}
	
}
 ?>