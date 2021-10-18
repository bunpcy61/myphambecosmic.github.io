<?php 
	//load file Layout.php vao day
	$this->fileLayout = "Layout.php";
 ?>
<div class="col-md-12">
    <div class="panel panel-primary" style="border: 1px solid #99CC00; border-radius: 11px 11px;background:#FFFFFF;">
        <div class="panel-heading" style="background: #99CC00;padding: 10px;color: black; font-weight: bold;border-radius: 10px 10px 0 0;">List Orders</div>
        <div class="panel-body" style="margin:20px;">
            <table class="table table-bordered table-hover " style="background:#FFFFFF;color: black;">
                <tr style="color: black;">
                    <th>Họ và tên</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Ngày mua</th>
                  	<th>Giá</th>
                    <th style="width:100px;">Trạng thái</th>
                  	<th style="width:180px;"></th>
                </tr>
                <?php foreach ($data as $rows): ?>
                	<?php 
                		$customer = $this->modelGetCustomer($rows->customer_id);
                	 ?>
                <tr>
                    <td><?php echo isset($customer->name)?$customer->name:""; ?></td>
                     <td><?php echo isset($customer->address)?$customer->address:""; ?></td>
                     <td><?php echo isset($customer->phone)?$customer->phone:""; ?></td>
                    <td><?php echo date("d/m/Y",strtotime($rows->date)); ?></td>
                  	<td><?php echo number_format($rows->price); ?> VNĐ</td>
                  	<td>
                  		<?php if($rows->status == 1): ?>
                  		<div class="">Đã giao hàng</div>
                  		<?php else: ?>
                  			<div class="">Chưa giao hàng</div>
                  		<?php endif; ?>
                  	</td>
                    <td style="text-align:center;">
                    	<?php if($rows->status == 0): ?>
                    		 <a href="index.php?controller=orders&action=delivery&id=<?php echo $rows->id; ?>" class="btn btn-info" style=" font-size: 12px;padding:8px;margin-bottom: 10px;">Giao hàng</a>
                    		&nbsp;&nbsp;
                    	<?php endif; ?>
                        <a href="index.php?controller=orders&action=detail&id=<?php echo $rows->id; ?>" class="btn btn-success" style="font-size: 12px;padding:8px;">Chi tiết hóa đơn</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>
            <style type="text/css">
                .pagination{
                	padding:0px; 
                	margin-top:20px;
                	border-radius: 10px 10px;
                }
                .page-link{
                	margin: -10px;
                	background: #F5F5F5;
                }
                a{
                	color: #66CCFF;
                }
                a:hover{
                	color: black;
                }
            </style>
            <ul class="pagination">
                <li class="page-item"><a href="#" class="page-link">Trang</a></li>
                <?php for($i = 1; $i <= $numPage; $i++): ?>
                <li class="page-item"><a href="index.php?controller=orders&p=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</div>