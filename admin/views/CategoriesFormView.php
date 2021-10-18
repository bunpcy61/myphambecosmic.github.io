<?php 
//load file Layout.php vao day
	$this->fileLayout = "Layout.php";
?>
 <div class="col-md-12">
    <div class="panel panel-primary" style="border: 1px solid greenyellow;background: white; border-radius: 10px 10px;">
        <div class="panel-heading" style="background:greenyellow;padding: 10px;font-weight: bold;border-radius: 10px 10px 0 0;">Add edit Category</div>

        <div class="panel-body" style="padding: 10px;">
        <form method="post" action="<?php echo $action; ?>">
        	<div class="row" style="margin-top:5px;">
                <div class="col-md-2 mt-1">Name</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($record->name)?$record->name:""; ?>" name="name" class="form-control" required style="background: #eae3e3;color:  #4c4c4c;border-radius: 10px 10px;">
                </div>
            </div>
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Category</div>
                <div class="col-md-10">
                   <select name="parent_id">
                    <option value="0"></option>
                        <?php 
                            $categories = $this->modelCategories();
                         ?>
                         <?php foreach($categories as $rows): ?>
                            <option <?php if(isset($record->parent_id)&&$record->parent_id==$rows->id): ?> selected <?php endif; ?> value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                        <?php endforeach; ?>
                    </select>
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