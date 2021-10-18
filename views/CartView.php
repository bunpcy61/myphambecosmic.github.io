<?php 
	//load file LayoutTrangChu.php
	$this->fileLayout = "LayoutTrangTrong.php";
 ?>
 <div class="template-cart">
          <form action="index.php?controller=cart&action=update" method="post">
            <div class="table-responsive">
              <table class="table table-cart">
                <thead>
                  <tr style="background-color:#FFB6C1;">
                    <th class="image">Ảnh sản phẩm</th>
                    <th class="name">Tên sản phẩm</th>
                    <th class="price">Giá bán lẻ</th>
                    <th class="quantity">Số lượng</th>
                    <th class="price">Thành tiền</th>
                    <th>Xóa</th>
                  </tr>
                </thead>
                <?php foreach($_SESSION["cart"] as $product): ?>
                <tbody>                  
                  <tr style="background-color:#f7f2f4;">
                    <td><img src="assets/upload/products/<?php echo $product["photo"]; ?>" class="img-responsive" /></td>
                    <td><a href="index.php?controller=products&action=detail&id=<?php echo $product["id"]; ?>"><?php echo $product["name"]; ?></a></td>
                    <td> <?php echo number_format($product["price"]-($product["price"]*$product["discount"])/100); ?>₫ </td>
                    <td><input type="number" id="qty" min="1" class="input-control" value="<?php echo $product["number"]; ?>" name="product_<?php echo $product["id"]; ?>" required="Không thể để trống"></td>
                    <td><p><b><?php echo number_format(($product["price"]-($product["price"]*$product["discount"])/100)*$product["number"]); ?>₫</b></p></td>
                    <td><a href="index.php?controller=cart&action=delete&id=<?php echo $product["id"]; ?>" data-id="2479395"><i class="fa fa-trash"></i></a></td>
                  </tr>
                </tbody>
            	<?php endforeach; ?>
            	<?php if($this->cartNumber() > 0): ?>
                <tfoot>
                  <tr>
                    <td colspan="6"><a href="index.php?controller=cart&action=destroy" class="button pull-left" style="background-color:#8B3A3A">Xóa toàn bộ</a> <a href="index.php" class="button pull-right black">Tiếp tục mua hàng</a>
                      <input type="submit" class="button pull-right" value="Cập nhật" style="margin-right: 310px;background-color: #8B3A3A;"></td>
                  </tr>
                </tfoot>
            	<?php endif; ?>
              </table>
            </div>
          </form>
          <?php if($this->cartNumber() > 0): ?>
          <div class="total-cart"> Tổng tiền thanh toán:
            <?php echo number_format($this->cartTotal()); ?>₫ <br>
            <a href="index.php?controller=cart&action=checkout" class="button black">Thanh toán</a> </div>
           <?php endif; ?>
        </div>