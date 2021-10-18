
<!DOCTYPE html>
<html>
<head>
	<!-- load đường dẫn vào đây -->
	<base href="http://localhost/php56/php56_BTVN1_rewrite/">
	<meta charset="utf-8">
	<title>Bài tập cuối khóa - Lãnh Thị Hằng</title>
	<meta name="viewport" content="width=device-width,inital-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/fontend/css/styles.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href='assets/fontend/assets/frontend/100/047/633/themes/517833/assets/font-awesome.min221b.css?1481775169361' rel='stylesheet' type='text/css' />
	<link href='assets/fontend/assets/frontend/100/047/633/themes/517833/assets/bootstrap.min221b.css?1481775169361' rel='stylesheet' type='text/css' />
	<link href='assets/fontend/assets/frontend/100/047/633/themes/517833/assets/owl.carousel221b.css?1481775169361' rel='stylesheet' type='text/css' />
	<link href='assets/fontend/assets/frontend/100/047/633/themes/517833/assets/responsive221b.css?1481775169361' rel='stylesheet' type='text/css' />
	<link href='assets/fontend/assets/frontend/100/047/633/themes/517833/assets/styles.scss221b.css?1481775169361' rel='stylesheet' type='text/css' />
	<script src='assets/fontend/assets/frontend/100/047/633/themes/517833/assets/jquery.min221b.js?1481775169361' type='text/javascript'></script>
	<script src='assets/fontend/assets/frontend/100/047/633/themes/517833/assets/bootstrap.min221b.js?1481775169361' type='text/javascript'></script>
	<script src='assets/fontend/assets/frontend/assets/themes_support/api.jquerya87f.js?4' type='text/javascript'></script>
	<link href='assets/fontend/assets/frontend/100/047/633/themes/517833/assets/bw-statistics-style221b.css?1481775169361' rel='stylesheet' type='text/css' />
</head>
<body>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/613c98ddd326717cb680eb95/1ffaba94c';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
	<!-- header -->
		<?php include "views/HeaderView.php"; ?>
	<!-- end header -->
	<!-- main -->
		<?php echo $this->view; ?>
	<!-- end main -->
	<!-- Footer -->
	
		<footer class="page-footer font-small" style="background-color: #222222;">

		  <div style="background-color: #E0FFFF">
		    <div class="container">
		    	<div class="privacy">
				  <div class="container">
				    <div class="row">
				      <div class="col-xs-12 col-sm-4">
				        <div class="image"> <img src="assets/fontend/assets/frontend/100/047/633/themes/517833/assets/ico-service-1221b.png?1481775169361" alt="Giao hàng miễn phí" title="Giao hàng miễn phí" class="img-responsive"> </div>
				        <div class="info">
				          <h3>Giao hàng miễn phí</h3>
				          <p>Miễn phí giao hàng trong nội thành Hà Nội</p>
				        </div>
				      </div>
				      <div class="col-xs-12 col-sm-4">
				        <div class="image"> <img src="assets/fontend/assets/frontend/100/047/633/themes/517833/assets/ico-service-2221b.png?1481775169361" class="img-responsive" alt="Khuyến mại" title="Khuyến mại"> </div>
				        <div class="info">
				          <h3>Khuyến mại</h3>
				          <p>Khuyến mại sản phẩm nếu đơn hàng trên 1.000.000đ</p>
				        </div>
				      </div>
				      <div class="col-xs-12 col-sm-4">
				        <div class="image"> <img src="assets/fontend/assets/frontend/100/047/633/themes/517833/assets/ico-service-3221b.png?1481775169361" class="img-responsive" alt="Hoàn trả lại tiền" title="Hoàn trả lại tiền"> </div>
				        <div class="info">
				          <h3>Hoàn trả lại tiền</h3>
				          <p>Nếu sản phẩm không đảm bảo chất lượng hoặc sản phẩm không đúng miêu tả</p>
				        </div>
				      </div>
				    </div>
				  </div>
				</div>
		      <!-- Grid row-->
		      <div class="row py-4 d-flex align-items-center">

		        <!-- Grid column -->
		        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
		          <h6 class="mb-0">Get connected with us on social networks!</h6>
		        </div>
		        <!-- Grid column -->

		        <!-- Grid column -->
		        <div class="col-md-6 col-lg-7 text-center text-md-right" style="color: white;">

		          <!-- Facebook -->
		          <a  href="" class="fb-ic" style="text-decoration: none; color: white;">
		            <i class="fab fa-facebook-f white-text mr-4"> </i>
		          </a>
		          <!-- Twitter -->
		          <a href="" class="tw-ic" style="text-decoration: none; color: white;">
		            <i class="fab fa-twitter white-text mr-4"> </i>
		          </a>
		          <!-- Google +-->
		          <a href=""class="gplus-ic" style="text-decoration: none; color: white;"> 
		            <i class="fab fa-google-plus-g white-text mr-4"> </i>
		          </a>
		          <!--Linkedin -->
		          <a href="" class="li-ic" style="text-decoration: none; color: white;">
		            <i class="fab fa-linkedin-in white-text mr-4"> </i>
		          </a>
		          <!--Instagram-->
		          <a href="" class="ins-ic" style="text-decoration: none; color: white;">
		            <i class="fab fa-instagram white-text"> </i>
		          </a>

		        </div>
		        <!-- Grid column -->

		      </div>
		      <!-- Grid row-->

		    </div>
		  </div>

		  <!-- Footer Links -->
		  <div class="container text-center text-md-left mt-5">

		    <!-- Grid row -->
		    <div class="row mt-3" style="color: white;">

		      <!-- Grid column -->
		      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

		        <!-- Content -->
		        <h6 class="text-uppercase font-weight-bold">Company name</h6>
		        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
		        <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
		          consectetur
		          adipisicing elit.</p>

		      </div>
		      <!-- Grid column -->

		      <!-- Grid column -->
		      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

		        <!-- Links -->
		        <h6 class="text-uppercase font-weight-bold">Products</h6>
		        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
		        <p>
		          <a href="#!" style="text-decoration: none;color: white; font-weight: bold;">MDBootstrap</a>
		        </p>
		        <p>
		          <a href="#!" style="text-decoration: none;color: white; font-weight: bold;">MDWordPress</a>
		        </p>
		        <p>
		          <a href="#!" style="text-decoration: none;color: white; font-weight: bold;">BrandFlow</a>
		        </p>
		        <p>
		          <a href="#!" style="text-decoration: none;color: white; font-weight: bold;">Bootstrap Angular</a>
		        </p>

		      </div>
		      <!-- Grid column -->

		      <!-- Grid column -->
		      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

		        <!-- Links -->
		        <h6 class="text-uppercase font-weight-bold">Useful links</h6>
		        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
		        <p>
		          <a href="#!" style="text-decoration: none;color: white; font-weight: bold;">Your Account</a>
		        </p>
		        <p>
		          <a href="#!" style="text-decoration: none;color: white; font-weight: bold;">Become an Affiliate</a>
		        </p>
		        <p>
		          <a href="#!" style="text-decoration: none;color: white; font-weight: bold;">Shipping Rates</a>
		        </p>
		        <p>
		          <a href="#!" style="text-decoration: none;color: white; font-weight: bold;">Help</a>
		        </p>

		      </div>
		      <!-- Grid column -->

		      <!-- Grid column -->
		      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

		        <!-- Links -->
		        <h6 class="text-uppercase font-weight-bold">Contact</h6>
		        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
		        <p>
		          <i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
		        <p>
		          <i class="fas fa-envelope mr-3"></i> info@example.com</p>
		        <p>
		          <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
		        <p>
		          <i class="fas fa-print mr-3"></i> + 01 234 567 89</p>

		      </div>
		      <!-- Grid column -->

		    </div>
		    <!-- Grid row -->

		  </div>
		  <!-- Footer Links -->

		  <!-- Copyright -->
		  <div class="footer-copyright text-center py-3" style="color: white;"><i class="far fa-copyright"></i>
		    <a style="text-decoration: none;color: white; font-weight: bold;">DESIGN By LANH HANG</a>
		  </div>
		  <!-- Copyright -->
		</footer>
<!-- Footer -->
<script type="text/javascript">
	$('.carousel').carousel({
  		interval: 1800
});
</script>
</div>
<script src='assets/fontend/assets/frontend/100/047/633/themes/517833/assets/owl.carousel.min221b.js?1481775169361' type='text/javascript'></script> 
<script src='assets/fontend/assets/frontend/100/047/633/themes/517833/assets/responsive-menu221b.js?1481775169361' type='text/javascript'></script> 
<script src='assets/fontend/assets/frontend/100/047/633/themes/517833/assets/elevate-zoom221b.js?1481775169361' type='text/javascript'></script> 
<script src='assets/fontend/assets/frontend/100/047/633/themes/517833/assets/main221b.js?1481775169361' type='text/javascript'></script> 
<script src='assets/fontend/assets/frontend/100/047/633/themes/517833/assets/ajax-cart221b.js?1481775169361' type='text/javascript'></script>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</html>