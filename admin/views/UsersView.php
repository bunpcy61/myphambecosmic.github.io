<?php 
	//load file Layout.php vao day
	$this->fileLayout = "Layout.php";
 ?>
<div class="col-md-12">
     <?php if(isset($_SESSION['users-success'])) { ?>
    <div class="alert alert-success" role="alert">
       <?php echo $_SESSION['users-success']; unset($_SESSION['users-success']); ?>
    </div>
    <?php } ?>
    <div style="margin-bottom:5px;">
        <a href="index.php?controller=users&action=create" class="btn btn-info" style="border-radius: 10px 10px;">Add user</a>
    </div>
    <div class="panel panel-primary" style="border: 1px solid #99CC00; border-radius: 11px 11px;background:#FFFFFF;">
        <div class="panel-heading" style="background: #99CC00;padding: 10px;color: black; font-weight: bold;border-radius: 10px 10px 0 0;">List User</div>
        <div class="panel-body" style="margin:20px;">
            <table class="table table-bordered table-hover " style="background:#FFFFFF;color: black;">
                <tr style="color: black;">
                    <th>Fullname</th>
                    <th>Email</th>
                    <th style="width:100px;"></th>
                </tr>
                <?php foreach ($data as $rows): ?>
                <tr>
                    <td><?php echo $rows->name; ?></td>
                    <td><?php echo $rows->email; ?></td>
                    <td style="text-align:center;">
                        <a href="index.php?controller=users&action=update&id=<?php echo $rows->id; ?>">Edit</a>&nbsp;
                        <a href="index.php?controller=users&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Are you sure?');">Delete</a>
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
                <li class="page-item"><a href="index.php?controller=users&p=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</div>