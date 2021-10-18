<?php 
    //load file Layout.php vao day
    $this->fileLayout = "LayoutTrangTrong.php";
 ?>
 <div class="special-collection">
          <div class="tabs-container">
            <div class="row" style="margin-top:10px;margin-left: 2px;">
              <div class="head-tabs head-tab1 col-lg-3">
                <h2 class="underline" style="font-weight:bold;margin-left: 10px;">
                	<?php 
                		$category = $this->modelGetCategory($id);
                		echo isset($category->name) ? $category->name : "";
                	 ?>
                </h2>
                 <style type="text/css">
			        	.underline::after{
			        		border: 1px solid red;
			        	}
			        </style>
              </div>
              <div class="col-lg-3 pull-right text-right">
                <?php 
                    $order = isset($_GET["order"]) ? $_GET["order"] : "";
                 ?>
                <select class="form-control" onchange="location.href = 'index.php?controller=products&action=category&id=<?php echo $id; ?>&order='+this.value;" style="height: 30px;">
                  <option value="0">Sắp xếp</option>
                  <option <?php if($order == "priceAsc"): ?> selected <?php endif; ?> value="priceAsc">Giá tăng dần</option>
                  <option <?php if($order == "priceDesc"): ?> selected <?php endif; ?> value="priceDesc">Giá giảm dần</option>
                  <option <?php if($order == "nameAsc"): ?> selected <?php endif; ?> value="nameAsc">Sắp xếp A-Z</option>
                  <option <?php if($order == "nameDesc"): ?> selected <?php endif; ?> value="nameDesc">Sắp xếp Z-A</option>
                </select>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <div class="tabs-content row">
            <div id="content-tabb1" class="content-tab content-tab-proindex" style="display:none">
              <div class="clearfix"> 
              	<?php foreach($data as $rows): ?>
             <style type="text/css">
               .discount{position: absolute;width: 50px; line-height: 50px; text-align: center; background: #bf005f; color: white;border-radius: 50px;}
             </style>
               <!-- box product -->
	           <div class="col-12 col-sm-12 col-md-6 col-lg-3 " style="position:relative;">
             <!-- discount -->
            <div class="discount"><?php echo $rows->discount; ?>%</div>
            <!-- end discount -->
	              <div class="product-grid" id="product-1168979" style="overflow: hidden;height: 364px;">
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
                    <li class="page-item"><a class="page-link" href="index.php?controller=products&action=category&id=<?php echo $id; ?>&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                	<?php endfor; ?>
                  </ul>
                </div>
                <!-- end paging --> 
              </div>
            </div>
          </div>
        </div>