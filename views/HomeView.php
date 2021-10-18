<?php 
// load file layout.php vào đây
	$this->fileLayout = "LayoutTrangChu.php";
?>
<main>
	<hr>
	<div class="container">
		<div class="container-fluid p-absolute">
    <div class="row">
      <div class="col-md-9"> 
        <!-- slide -->
        <div class="owl-slider">
          <div class="item"> 
            <!-- ============================ -->
            <div id="myCarousel" class="carousel slide" data-ride="carousel"> 
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
              </ol>
              
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active"> <img src="assets/fontend/images/slideshow_1.png" alt="Los Angeles"> </div>
                <div class="item"> <img src="assets/fontend/images/slideshow_2.png" alt="Los Angeles"> </div>
                <div class="item"> <img src="assets/fontend/images/slideshow_3.png" alt="Chicago"> </div>
                <div class="item"> <img src="assets/fontend/images/slideshow_4.png" alt="New York"> </div>
              </div>
              
              <!-- Left and right controls --> 
            </div>
            <!-- ============================ --> 
          </div>
        </div>
        <!-- end slide --> 
      </div>
       <div class="col-xs-12 col-md-3">
        <div class="row" style="margin-bottom: 5px;">
          <div class="col-md-12"><img src="assets/fontend/images/img2.jpg" class="img-thumbnail"></div>
        </div>
        <div class="row" style="margin-bottom: 5px;">
          <div class="col-md-12"><img src="assets/fontend/images/img1.jpg" class="img-thumbnail"></div>
        </div>
        <div class="row">
          <div class="col-md-12"><img src="assets/fontend/images/img3.jpg" class="img-thumbnail"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-md-12"> 
        <!-- main -->
        <!-- load dong MVC o day -->
        <?php echo $this->view; ?> 
        
        <!-- end main --> 
      </div>
    </div>
		<hr>
			<div class="product">
				 <div class="special-collection">
			          <div class="tabs-container">
			            <div class="row" style="margin-top:15px;">
			              <div class="col-lg-10">
			                <h2 class="underline" style="font-weight:bold;margin-left: 10px;">SẢN PHẨM NỔI BẬT</h2>
			              </div>
			              <div class="clearfix"></div>
			            </div>
			          </div>
			        <style type="text/css">
			        	.underline::after{
			        		border: 1px solid red;
			        	}
			        </style>
  				<div class="tabs-content row">
    			<div id="content-tabb1" class="content-tab content-tab-proindex" style="display:none">
     			<div class="clearfix"> 
            <?php 
              $hotProduct = $this->modelHotProduct();
             ?>
             <style type="text/css">
               .discount{position: absolute;width: 50px; line-height: 50px; text-align: center; background: #bf005f; color: white;border-radius: 50px;}
             </style>
          <?php  foreach ($hotProduct as $rows): ?>
  		    <!-- box product -->
           <div class="col-xs-6 col-md-2 col-sm-6" style="position: relative;">
            <!-- discount -->
            <div class="discount"><?php echo $rows->discount; ?>%</div>
            <!-- end discount -->
              <div class="product-grid" id="product-1168979" style="height: 350px; overflow: hidden;height: 330px;">
                <div class="image"> <a href="#"><img src="assets/upload/products/<?php echo $rows->photo; ?>" title="<?php echo $rows->name; ?>" alt="<?php echo $rows->name; ?>" class="img-responsive"></a> </div>
                <div class="info" style="background-color: #B0E0E6">
                  <h3 class="name" style="font-weight: bold;"><a href="products/detail/<?php echo $rows->id; ?>/<?php echo $rows->name; ?>"><?php echo $rows->name; ?></a></h3>
                  <p class="price-box"> <span class="special-price"> <span class="price product-price" style="text-decoration:line-through;"> <?php echo number_format($rows->price); ?></span> ₫ </span> </p>
                  <p class="price-box"> <span class="special-price" > <span class="price product-price" style="color: #009900;"> <?php echo number_format($rows->price - ($rows->price * $rows->discount)/100); ?> </span>₫ </span> </p>
                  <p class="price-box"> <a href="products/rating/<?php echo $rows->id; ?>/<?php echo $rows->name; ?>/1"><img style="border: noner;border-radius: 10px 10px " src="assets/fontend/assets/frontend/images/star.jpg"></a> <a href="products/rating/<?php echo $rows->id; ?>/<?php echo $rows->name; ?>/2"><img style="border: noner;border-radius: 10px 10px " src="assets/fontend/assets/frontend/images/star.jpg"></a> <a href="products/rating/<?php echo $rows->id; ?>/<?php echo $rows->name; ?>/3"><img style="border: noner;border-radius: 10px 10px " src="assets/fontend/assets/frontend/images/star.jpg"></a> <a href="products/rating/<?php echo $rows->id; ?>/<?php echo $rows->name; ?>/4"><img style="border: noner;border-radius: 10px 10px " style="border: noner;border-radius: 10px 10px " src="assets/fontend/assets/frontend/images/star.jpg"></a> <a href="products/rating/<?php echo $rows->id; ?>/<?php echo $rows->name; ?>/5"><img style="border: noner;border-radius: 10px 10px " src="assets/fontend/assets/frontend/images/star.jpg"></a> </p>
                  <div class="action-btn">
                    <form>
                      <a  style="border: 1px solid black;border-radius: 10px 10px;color: black; font-weight:bold;" href="cart/create/<?php echo $rows->id; ?>/<?php echo $rows->name; ?>" class="button"><i class="fas fa-cart-arrow-down" style="font-size:15px;color: black;margin-right: 5px;"></i>Mua ngay</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>
         <!-- end box product --> 
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
 <!-- adv -->
<div class="widebanner" style="margin-left:35px"> <a href="#"><img src="assets/fontend/assets/frontend/images/khuyenmai.jpg" alt="#" class="img-responsive"></a> </div>
<!-- end adv --> 
<?php 
	$categories = $this->modelCategories();
 ?>
 <?php foreach($categories as $item): ?>
<div class="special-collection">
  <div class="tabs-container">
    <div class="row" style="margin-top:10px;margin-left: 2px;">
      <div class="head-tabs head-tab1 col-lg-11">
        <h2 class="underline" style="font-weight: bold"><?php echo $item->name; ?></h2>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <div class="tabs-content row">
  
    <div id="content-taba4" class="content-tab content-tab-proindex"> 
    	<?php 
    			$product = $this->modelProducts_($item->id);
    	 ?>
    	 <?php foreach($product as $rows): ?>
        <style type="text/css">
              .vien{
                border: none;
              }
              .vien:hover{
                padding: 0;
                border: 2px solid yellow;
              }
              .discountt{position: absolute;width: 55px; line-height: 55px; text-align: center; background: #bf005f; color: white;border-radius: 55px;top: 0px;}
            </style>
   		<!--  -->
	     <a href="products/detail/<?php echo $rows->id; ?>/<?php echo $rows->name; ?>">
	  		<div class="col col-12 col-sm-6 col-md-4 col-lg-3" style="position: relative;">
	  			<div class="product-grid" style="height:400px">
			    <div class="card card border-warning mb-3 vien">
			      <img src="assets/upload/products/<?php echo $rows->photo; ?>" class="card-img-top" width="100%" title="<?php echo $rows->name; ?>" alt="<?php echo $rows->name; ?>">
          <!-- discount -->
          <div class="discountt"><?php echo $rows->discount; ?>%</div>
          <!-- /discount -->
			      	<p class="danhGia">
				      	<a href="products/rating/<?php echo $rows->id; ?>/<?php echo $rows->name; ?>/1"><i class="fas fa-star"></i></a>
				      	<a href="products/rating/<?php echo $rows->id; ?>/<?php echo $rows->name; ?>/2"><i class="fas fa-star"></i></a>
				      	<a href="products/rating/<?php echo $rows->id; ?>/<?php echo $rows->name; ?>/3"><i class="fas fa-star-half"></i></i></a>
				      	<a href="products/rating/<?php echo $rows->id; ?>/<?php echo $rows->name; ?>/4"><i class="fal fa-star"></i></a>
				      	<a href="products/rating/<?php echo $rows->id; ?>/<?php echo $rows->name; ?>/5"><i class="fal fa-star"></i></a>
			      	</p>
			      
				    <div class="card-body" style="background-color: #B0E0E6;">
				        <h5 class="card-title" style="text-align: center;"><a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h5>
				        <p class="price-box"> <span class="special-price" style="font-size: 16px;"> <span class="" style="text-decoration:line-through;margin-left: 5px;color: #77ca64;font-size: 16px;"> <?php echo number_format($rows->price); ?></span> ₫ </span> </p>
				        <p class="card-text" style="text-align: center;border: 1px solid black;color: #458B74;font-size: 16px"><?php echo number_format($rows->price - ($rows->price * $rows->discount)/100); ?> </span> ₫ </span> </p>
			        	<div class="card_add">
				         <a href="products/detail/<?php echo $rows->id; ?>/<?php echo $rows->name; ?>" class="btn btn-success"><i class="fas fa-eye"></i></a>
				         
				         <a href="cart/create/<?php echo $rows->id; ?>/<?php echo $rows->name; ?>" class="btn btn-success ">Mua ngay</a>
				         <a href="index.php?controller=cart&action=create&id=<?php echo $rows->id; ?>" class="btn btn-success ">
				         	<i class="fas fa-cart-arrow-down"></i>
				         </a>
			     		</div>
			      	</div>
			      </div>
			    </div>
	  		</div>
	  	</a>
     	<!--  -->
  	 <?php endforeach; ?>
    </div>
  </div>
</div>
<?php endforeach; ?>
<div class="widebanner" style="margin-left:90px"> <a href="#"><img src="assets/fontend/assets/frontend/images/khuyenmai1.jpg" alt="#" class="img-responsive"></a> </div>
<div class="home-blog" style="margin:20px">
  <h2 class="title"> <span class="underline" style="font-size: 15px;font-weight: bold;margin-left: 10px;">Tin tức</span></h2>
  <div class="row">
    <div class="owl-home-blog owl-home-blog-bottompage"> 
     <?php 
      $news = $this->modelHotNews();
     ?>
     <?php foreach($news as $rows): ?>
    <!-- new item -->
     <div class="item">
        <div class="article"> <a href="news/detail/<?php echo $rows->id; ?>/<?php echo $rows->name; ?>" class="image"> <img src="assets/upload/news/<?php echo $rows->photo; ?>" alt="<?php echo $rows->name; ?>" title="<?php echo $rows->name; ?>" class="img-responsive"> </a>
          <div class="info">
            <h3><a class="text3line" href="news/detail/<?php echo $rows->id; ?>/<?php echo $rows->name; ?>" style="font-weight: bold;"><?php echo $rows->name; ?></a></h3>
            <p class="desc"><?php echo $rows->description; ?></p>
          </div>
        </div>
    </div>
    <!-- /news item --> 
    <?php endforeach; ?>     
    </div>
  </div>
</div>
</div>

</div>
	
</main>