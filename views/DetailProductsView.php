<?php 
	$this->fileLayout = "LayoutTrangTrong.php";
 ?>
 <div class="top">
    <div class="row" style="margin-top:15px">
      <div class="col-xs-12 col-md-6 product-image">
        <div class="featured-image"> 
          <img src="assets/upload/products/<?php echo $record->photo; ?>" style="width: 100%;" class="img-responsive"/>
        </div>                        
      </div>
      <div class="col-xs-12 col-md-6 info">
        <h1 itemprop="name" style="font-weight: bold;"><?php echo $record->name; ?></h1>
        <p class="vendor">Danh mục sản phẩm:&nbsp; <span> 
            <?php 
                $category = $this->modelGetCategory($record->category_id);
                echo isset($category->name) ? $category->name : "";
             ?>
         </span></p>
        <p itemprop="price" class="price-box product-price-box"> <span class="special-price"> <span class="price product-price" style="text-decoration:line-through;"> <?php echo number_format($record->price); ?>₫ </span></span></p>
        <p itemprop="price" class="price-box product-price-box"> <span class="special-price"> <span class="price product-price"> <?php echo number_format($record->price - $record->price * $record->discount/100); ?>₫ </span></span></p>
      </p>
      <!-- rating -->
      <div style="border:1px solid #dddddd; margin-bottom: 15px;">
        <h4 style="padding-left: 10px;">Đánh giá</h4>
        <table style="width: 100%;">
          <tr>
            <td style="width: 80%; padding-left: 10px;"><img src="assets/fontend/assets/frontend/images/star.jpg"></td>
            <td><span class="label label-primary"><?php echo $this->modelGetStar($record->id,1); ?> vote</span></td>
          </tr>
          <tr>
            <td style="width: 80%; padding-left: 10px;"><img src="assets/fontend/assets/frontend/images/star.jpg"> <img src="assets/fontend/assets/frontend/images/star.jpg"></td>
            <td><span class="label label-warning"><?php echo $this->modelGetStar($record->id,2); ?> vote</span></td>
          </tr>
          <tr>
            <td style="width: 80%; padding-left: 10px;"><img src="assets/fontend/assets/frontend/images/star.jpg"> <img src="assets/fontend/assets/frontend/images/star.jpg"> <img src="assets/fontend/assets/frontend/images/star.jpg"></td>
            <td><span class="label label-danger"><?php echo $this->modelGetStar($record->id,3); ?> vote</span></td>
          </tr>
          <tr>
            <td style="width: 80%; padding-left: 10px;"><img src="assets/fontend/assets/frontend/images/star.jpg"> <img src="assets/fontend/assets/frontend/images/star.jpg"> <img src="assets/fontend/assets/frontend/images/star.jpg"> <img src="assets/fontend/assets/frontend/images/star.jpg"></td>
            <td><span class="label label-info"><?php echo $this->modelGetStar($record->id,4); ?> vote</span></td>
          </tr>
          <tr>
            <td style="width: 80%; padding-left: 10px;"><img src="assets/fontend/assets/frontend/images/star.jpg"> <img src="assets/fontend/assets/frontend/images/star.jpg"> <img src="assets/fontend/assets/frontend/images/star.jpg"> <img src="assets/fontend/assets/frontend/images/star.jpg"> <img src="assets/fontend/assets/frontend/images/star.jpg"></td>
            <td><span class="label label-success"><?php echo $this->modelGetStar($record->id,5); ?> vote</span></td>
          </tr>
        </table>
        <br>
      </div>
      <!-- /rating -->
        <a href="index.php?controller=cart&action=create&id=<?php echo $record->id; ?>" class="btn btn-success" style="font-weight: bold;"><i class="fal fa-cart-arrow-down" style="font-size:18px;margin-right: 5px;"></i>GIỎ HÀNG</a>
    </div>
  </div>
</div>
<div class="middle">
  <!-- chi tiet -->
  <?php echo $record->description; ?>
  <?php echo $record->content; ?>
  <!-- chi tiet -->
</div>
