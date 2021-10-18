<?php 
//load file Layout.php vao day
	$this->fileLayout = "Layout.php";
?>
 <div class="col-md-12">
    <?php if(isset($_SESSION['users-fail'])) { ?>
    <div class="alert alert-danger" role="alert">
       <?php echo $_SESSION['users-fail']; unset($_SESSION['users-fail']);?>
    </div>
    <?php } ?>
    <div class="panel panel-primary" style="border: 1px solid greenyellow;background: white; border-radius: 10px 10px;">
        <div class="panel-heading" style="background:greenyellow;padding: 10px;font-weight: bold;border-radius: 10px 10px 0 0;">Add edit user</div>

        <div class="panel-body" style="padding: 10px;">
        <form method="post" action="<?php echo $action; ?>">
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Name</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($record->name)?$record->name:""; ?>" name="name" class="form-control" required style="background: #eae3e3;color:  #4c4c4c;border-radius: 10px 10px;">
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Email</div>
                <div class="col-md-10">
                    <input style="background: #eae3e3;color: #4c4c4c;border-radius: 10px 10px;" type="email" value="<?php echo isset($record->email)?$record->email:""; ?>" <?php if(isset($record->email)): ?> disabled <?php else: ?> required <?php endif; ?>    name="email" class="form-control">
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Password</div>
                <div class="col-md-10">
                    <input style="background: #eae3e3;color: #4c4c4c;border-radius: 10px 10px;" type="password" name="password" <?php if(isset($record->email)): ?> placeholder="Không đổi password thì không nhập thông tin vào ô textbox này" <?php else: ?> required <?php endif; ?> class="form-control">
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="submit" value="Process" class="btn btn-info" style="border-radius: 10px 10px;">
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
</div>