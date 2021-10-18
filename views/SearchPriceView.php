<?php 
    //load file Layout.php vao day
    $this->fileLayout = "LayoutTrangTrong.php";
 ?>
 <div class="special-collection">
          <div class="tabs-container">
            <div class="row" style="margin-top:10px;margin-left: 2px;">
              <div class="head-tabs head-tab1 col-lg-6">
                <h2 class="underline" style="font-weight:bold;margin-left: 10px;">
                	Giá từ <?php echo number_format($fromPrice); ?> VNĐ - đến <?php echo number_format($toPrice); ?> VNĐ
                </h2>
                 <style type="text/css">
			        	.underline::after{
			        		border: 1px solid red;
			        	}
			        </style>
              </div>
              <div class="col-lg-3 pull-right text-right">
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <div class="tabs-content row">
            <div id="content-tabb1" class="content-tab content-tab-proindex" style="display:none">
              <div class="clearfix"> 
              	<?php foreach($data as $rows): ?>
               <!-- box product -->
	           <div class="col-12 col-sm-12 col-md-6 col-lg-3 ">
	              <div class="product-grid" id="product-1168979" style="overflow: hidden;height: 380px;">
	                <div class="image"> <a href="#"><img src="assets/upload/products/<?php echo $rows->photo; ?>" title="<?php echo $rows->name; ?>" alt="<?php echo $rows->name; ?>" class="img-responsive"></a> </div>
	                <div class="info" style="background-color: #B0E0E6">
	                  <h3 class="name" style="font-weight: bold;"><a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h3>
	                  <p class="price-box"> <span class="special-price"> <span class="price product-price" style="text-decoration:line-through;"> <?php echo number_format($rows->price); ?></span> ₫ </span> </p>
	                  <p class="price-box"> <span class="special-price" > <span class="price product-price" style="color: #009900;"> <?php echo number_format($rows->price - ($rows->price * $rows->discount)/100); ?> </span>₫ </span> </p>
	                  <p class="price-box"> <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=1"><img style="border: noner;border-radius: 10px 10px " src="assets/fontend/assets/frontend/images/star.jpg"></a> <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=2"><img style="border: noner;border-radius: 10px 10px " src="assets/fontend/assets/frontend/images/star.jpg"></a> <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=3"><img style="border: noner;border-radius: 10px 10px " src="assets/fontend/assets/frontend/images/star.jpg"></a> <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=4"><img style="border: noner;border-radius: 10px 10px " style="border: noner;border-radius: 10px 10px " src="assets/fontend/assets/frontend/images/star.jpg"></a> <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=5"><img style="border: noner;border-radius: 10px 10px " src="assets/fontend/assets/frontend/images/star.jpg"></a> </p>
	                  <div class="action-btn">
	                    <form>
	                      <a  style="border: 1px solid black;border-radius: 10px 10px;color: black; font-weight:bold;" href="index.php?controller=cart&action=create&id=<?php echo $rows->id; ?>" class="button"><i class="fas fa-cart-arrow-down" style="font-size:15px;color: black;margin-right: 5px;"></i>Mua ngay</a>
	                    </form>
	                  </div>
	                </div>
	              </div>
            	</div>
         <!-- end box product --> 
            	<?php endforeach; ?>
                <!-- paging -->
                <div style="clear: both;"></div>
                <div style="margin-top: -50px;"  class="&#x70;&#x61;&#x67;&#x69;&#x6E;&#x61;&#x74;&#x69;&#x6F;&#x6E;&#x2D;&#x63;&#x6F;&#x6E;&#x74;&#x61;&#x69;&#x6E;&#x65;&#x72;">
                  <ul class="pagination">
                    <li class="page-item"><span>Trang</span></li>
                    <?php for($i = 1; $i <= $numPage; $i++): ?>
                   <li class="page-item"><a class="page-link" href="index.php?controller=search&action=name&fromPrice=<?php echo $fromPrice; ?>&toPrice=<?php echo $toPrice; ?>&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                	<?php endfor; ?>
                  </ul>
                </div>
                <!-- end paging --> 
              </div>
            </div>
          </div>
        </div>