<?php 
    //load file Layout.php vao day
    $this->fileLayout = "Layout.php";
 ?>
 <?php 
        $conn = Connection::getInstance();
        $query = $conn->query("select * from customers where id = (select customer_id from orders where id = $id limit 0,1)");
        $customer = $query->fetch();
  ?>
<div class="col-md-12">
    <div class="panel panel-default" style="border: 1px solid #99CC00; border-radius: 11px 11px;">
        <div class="panel-heading" style="background: white; padding: 10px;color: black; font-weight: bold;border-radius: 10px 10px 0 0;">Thông tin đơn hàng</div>
        <div class="panel-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width:150px;">Họ tên</th>
                    <th><?php echo $customer->name; ?></th>
                </tr>
                <tr>
                    <th style="width:150px;">Email</th>
                    <th><?php echo $customer->email; ?></th>
                </tr>
                <tr>
                    <th style="width:150px;">Địa chỉ</th>
                    <th><?php echo $customer->address; ?></th>
                </tr>
                <tr>
                    <th style="width:150px;">Điện thoại</th>
                    <th><?php echo $customer->phone; ?></th>
                </tr>
            </table>            
        </div>
        <div class="panel-footer"><a href="#" onclick="history.go(-1);" class="btn btn-info" style="border-radius:10px 10px; margin: 10px;">Quay lại</a></div>
    </div>
    <div class="panel panel-primary" style="border: 1px solid #99CC00; border-radius: 11px 11px;background:#FFFFFF;margin-top: 20px;">
        <div class="panel-heading" style="background: #99CC00;padding: 10px;color: black; font-weight: bold;border-radius: 10px 10px 0 0;">List products</div>
        <div class="panel-body" style="margin:20px;">
            <table class="table table-bordered table-hover" style="background:#FFFFFF;color: black;">
                <tr>
                    <th style="width:100px;">Photo</th>
                    <th>Name</th>
                    <th style="width:80px;">Price</th>
                    <th style="width:80px;">Discount</th>
                </tr>
                <?php foreach ($data as $rows): ?>
                    <?php 
                        $product = $this->modelGetProduct($rows->product_id);
                     ?>
                <tr>
                    <td>
                        <?php if($product->photo != "" && file_exists("../assets/upload/products/".$product->photo)): ?>
                        <img src="../assets/upload/products/<?php echo $product->photo; ?>" style="width:100px;">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $product->name; ?></td>
                    <td><?php echo number_format($product->price); ?></td>
                    <td style="text-align:center;"><?php echo $product->discount; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>