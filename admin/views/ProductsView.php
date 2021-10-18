<?php 
	//load file Layout.php vao day
	$this->fileLayout = "Layout.php";
 ?>
<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="index.php?controller=products&action=create" class="btn btn-info" style="border-radius: 10px 10px;">Add News</a>
    </div>
    <div class="panel panel-primary" style="border: 1px solid #99CC00; border-radius: 11px 11px;background:#FFFFFF;">
        <div class="panel-heading" style="background: #99CC00;padding: 10px;color: black; font-weight: bold;border-radius: 10px 10px 0 0;">List News</div>
        <div class="panel-body" style="margin:20px;">
            <table class="table table-bordered table-hover " style="background:#FFFFFF;color: black;">
                <tr style="color: black;">
                    <th style="width: 100px;">Photo</th>
                    <th>Name</th>

                    <th style="width: 50px;">Hot</th>
                    <th style="width: 80px;">Price</th>
                    <th style="width: 80px;">Discount</th>
                    <th style="width: 100px;">Category</th>
                    <th style="width:100px;"></th>
                </tr>
                 <?php foreach ($data as $rows): ?>
                <tr>
                    <td>
                        <?php if($rows->photo != "" && file_exists("../assets/upload/products/".$rows->photo)): ?>
                        <img src="../assets/upload/products/<?php echo $rows->photo; ?>" style="width: 100px;">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $rows->name; ?></td>
                    <td>
                        <?php if(isset($rows->hot) && $rows->hot == 1): ?>
                        <span class="fa fa-check"></span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo number_format($rows->price); ?></td>
                    <td><?php echo $rows->discount; ?></td>
                    <td>
                        <?php 

                            // co thẻ truy vấn trực tiếp csdl ở view
                        $conn = Connection::getInstance();
                        $query = $conn->query("select *from categories where id=$rows->category_id");
                        $category = $query->fetch();
                       echo isset($category->name) == true ? $category->name : "";
                         ?>
                    </td>
                    <td style="text-align:center;">
                        <a href="index.php?controller=products&action=update&id=<?php echo $rows->id; ?>">Edit</a>&nbsp;
                        <a href="index.php?controller=products&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Are you sure?');">Delete</a>
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
                <li class="page-item"><a href="index.php?controller=products&p=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</div>