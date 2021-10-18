<div class="header">
		<div class="top_header">
			<div class="opa  container-fluid">
				<div class="container d-flex" style="justify-content: space-between;">
						<img src="assets/fontend/images/hab_center_img.png" class=" rounded-circle1 " alt="Responsive image"/>
						<p class="chuChay">WELCOME TO MY WEBSITE FOR WOMENS<br><i class="fas fa-heart"></i><i class="fas fa-heart"></i><i class="fas fa-heart"></i></p>
						<div class="logo">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-item dropdown-toggle text-dark" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle"></i></a>
							<div class="dropdown-menu" style="top:30px;">
						  	<?php if(isset($_SESSION['customer_email'])): ?>
								<a class="dropdown-item" href="#">Xin chào <?php echo $_SESSION['customer_email']; ?></a>
								<a class="dropdown-item" href="account/logout">Đăng xuất</a>
						 	<?php else: ?>
								<a class="dropdown-item" href="account/login">Đăng nhập</a>
								<a class="dropdown-item" href="account/register">Đăng ký</a>
							<?php endif; ?>
							</div>
							</li>
							<?php 
								$ProducNumberInCart = 0;
								if(isset($_SESSION['cart']) != NULL)
									foreach($_SESSION['cart'] as $product)
										$ProducNumberInCart ++;

							 ?>
							<li class="nav-item dropdown" style="position: relative;">
								<a class="nav-link dropdown-item text-dark" href="#">
									<i class="fas fa-cart-arrow-down"></i>
									<a href="#" style="position:absolute;top: 0;left: 30px;background-color: white;font-size: 15px;padding:0 5px 0 5px;"><?php echo $ProducNumberInCart; ?></a>
								 <div class="dropdown-menu" style="top:30px;left: -200px;position: absolute;width: 300px;">
						 		 <div class="content-mini-cart" style="margin:10px;">
						          <div class="has-items">
						            <ul class="list-unstyled">
						              <?php if(isset($_SESSION['cart']) != NULL): ?>
						                <?php foreach($_SESSION['cart'] as $product): ?>
						              <li class="clearfix" id="item-1853038">
						                <div class="image"> <a href="index.php?controller=products&action=detail&id=<?php echo $product["id"]; ?>" > <img alt="<?php echo $product["name"]; ?>" src="assets/upload/products/<?php echo $product["photo"]; ?>" title="<?php echo $product["name"]; ?>" class="img-responsive" width="50%" style="float: left;margin-right: 5px;"> </a> </div>
						                <div class="info">
						                  <h3 style="font-size:15px;"><a href="index.php?controller=products&action=detail&id=<?php echo $product["id"]; ?>"><?php echo $product["name"]; ?></a></h3>
						                  <p  style="float: left;margin-right: 10px"><?php echo $product["number"]; ?> x <?php echo number_format($product["price"]); ?>₫</p>
						                </div>
						                <div> <a href="index.php?controller=cart&action=delete&id=<?php echo $product["id"]; ?>"> <i class="fa fa-times"></i></a> </div>
						              </li>
						              <hr>
						                <?php endforeach; ?>
						              <?php endif; ?>
						            </ul>
						            <?php if(isset($_SESSION['cart']) != NULL): ?>
						            <a href="index.php?controller=cart&action=checkout" class="button" style="background-color:black;">Thanh toán</a> 
						        </div>
						            <?php endif; ?>
						        </div>

							</a></li>
						</div>
					</div>
				</div>	
		</div>
		<div class="bottom_header" style="background-color:#66ccff">
			<nav id="navbar" class="navbar container navbar-expand-lg">
		        <ul class="mr-auto">
		          <li><a class="nav-link scrollto active" href="home"><i class="fas fa-home-lg-alt"></i>Trang chủ</a></li>
		           <li class="dropdown"><a href="#"><span>SẢN PHẨM</span> <i style="margin-left: 2px;" class="fas fa-caret-down"></i></a>
		            <ul>
		              <?php 
			              $conn = Connection::getInstance();
			              $query = $conn->query("select * from categories where parent_id = 0 order by id desc");
			              $categories = $query->fetchAll();
			           ?>  
			           <?php foreach($categories as $rows): ?>
			            <li><a href="products/category/<?php echo $rows->id; ?>/<?php echo $rows->name; ?>"><?php echo $rows->name; ?></a></li>
			            <?php 
			                $querySub = $conn->query("select * from categories where parent_id = {$rows->id} order by id desc");
			                $categoriesSub = $querySub->fetchAll();
			             ?>
			                  <?php foreach($categoriesSub as $rowsSub): ?>
			                      <li style="padding-left:20px;"><a href="products/category/<?php echo $rowsSub->id; ?>/<?php $rowsSub->name; ?>"><?php echo $rowsSub->name; ?></a></li>
			                  <?php endforeach; ?>
			            <?php endforeach; ?>
		            </ul>
		          </li>
		          <li><a class="nav-link scrollto" href="cart">GIỎ HÀNG</a></li>
		          <li><a class="nav-link scrollto" href="news">TIN TỨC</a></li>
		          <li><a class="nav-link scrollto " href="contact">LIÊN HỆ</a></li>
		        </ul>
		        <i class="bi bi-list mobile-nav-toggle"></i>
		        <div class="form-inline mt-2 mt-md-0" style="position:relative;margin-right: 10px;">
					<input class="form-control mr-sm-2" type="text" placeholder="Nhập từ khóa..." aria-label="Search" id="key" autocomplete="off">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="border: 1px solid green;" id="btnSearch">Tìm kiếm</button>
					<div class="smart-search">
						<ul style="flex-flow: wrap;">
							<li><img src="assets/upload/products/1629713302_sp_20.jpg"><a href="#">SON BLACK ROUGE</a></li>
							<li><img src="assets/upload/products/1629713302_sp_20.jpg"><a href="#">SON BLACK ROUGE</a></li>
							<li><img src="assets/upload/products/1629713302_sp_20.jpg"><a href="#">SON BLACK ROUGE</a></li>
						</ul>
					</div>
				</div>
				<style type="text/css">
			      .smart-search{position: absolute;width: 120%; background: white; z-index: 1;height: 350px; overflow: scroll;top: 36px;display: none;}
			      .smart-search ul{margin: 0; padding: 0;list-style: none;}
			      .smart-search ul li{margin-left: 10px;border-bottom: 1px solid #dddddd;margin-top: 3px;display:flex;}
			      .smart-search img{width: 70px; margin-right: 10px;margin-bottom: 3px;}
			    </style>
				<script type="text/javascript">
					$(document).ready(function(){
						$("#btnSearch").click(function(){
							var key = $("#key").val();
							// di chuyển đến url timf kiếm
						 location.href = "index.php?controller=search&action=name&key="+key;
						});
						//-----------------
						$(".form-control").keyup(function(){
							var strKey = $("#key").val();
							if(strKey.trim() == ""){
								$(".smart-search").attr("style","display:none");
							}
							else{
								$(".smart-search").attr("style","display:block");
								//---
								// sử dụng ajax để lấy dữ liệu
								$.get("index.php?controller=search&action=ajaxSearch&key="+strKey,function(data){
					              // clear các thẻ li bên trong thẻ ul
					              $(".smart-search ul").empty();
					              // thêm dữ liệu vùa lấy được bằng ajax vào thẻ ul
					              $(".smart-search ul").append(data);
					            });
								//---
							}
						});
						//--------------------
					});
				</script>
				</nav>
	</div>
</div>
