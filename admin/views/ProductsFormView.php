<?php 
    //load file Layout.php
    $this->fileLayout = "Layout.php";
 ?>                    
<div class="col-md-12">  
    <div class="panel panel-primary" style="border: 1px solid #99CC00; border-radius: 11px 11px;background:#FFFFFF;">
        <div class="panel-heading" style="background: #99CC00;padding: 10px;color: black; font-weight: bold;border-radius: 10px 10px 0 0;" >Add edit New</div>
        <div class="panel-body" style="margin:20px;">
        <!-- muon upload file thi trong the form phai co thuoc tinh sau: enctype="multipart/form-data" -->
        <form method="post" enctype="multipart/form-data" action="<?php echo $action; ?>" style="background:#FFFFFF;color: black;">
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2" style="margin-top:10px;">Tên sản phẩm</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($record->name)?$record->name:""; ?>" style="background: #eae3e3;color:  #4c4c4c;border-radius: 10px 10px;" name="name" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            
            
            
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="checkbox" <?php if(isset($record->hot)&&$record->hot==1): ?> checked <?php endif; ?> name="hot" id="hot"> <label for="hot" >&nbsp;&nbsp;Sản phẩm nổi bật</label>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2" style="margin-top:10px;">Giá</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($record->price)?$record->price:""; ?>" style="background: #eae3e3;color:  #4c4c4c;border-radius: 10px 10px;" name="price" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2" style="margin-top:10px;">% Giảm giá</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($record->discount)?$record->discount:""; ?>" style="background: #eae3e3;color:  #4c4c4c;border-radius: 10px 10px;" name="discount" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2" style="margin-top:10px;">Danh mục</div>
                <div class="col-md-10">
                    <select name="category_id" class="form-control" style="width:200px;background: #eae3e3;color:  #4c4c4c;border-radius: 10px 10px;">
                        <?php 
                            $categories = $this->modelCategories();
                         ?>
                         <?php foreach($categories as $rows): ?>
                            <option <?php if(isset($record->category_id) && $record->category_id == $rows->id): ?> selected <?php endif; ?> value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                                <?php 
                                    $categoriesSub = $this->modelCategoriesSub($rows->id);
                                 ?>
                                     <?php foreach($categoriesSub as $rowsSub): ?>
                                        <option <?php if(isset($record->category_id) && $record->category_id == $rowsSub->id): ?> selected <?php endif; ?> value="<?php echo $rowsSub->id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowsSub->name; ?></option>
                                    <?php endforeach; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2" style="margin-top:5px;">Giới thiệu</div>
                <div class="col-md-10">
                    <textarea name="description"><?php echo isset($record->description)?$record->description:""; ?></textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace("description");
                    </script>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2" style="margin-top:5px;">Chi tiết</div>
                <div class="col-md-10">
                    <textarea name="content"><?php echo isset($record->content)?$record->content:""; ?></textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace("content");
                    </script>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2" style="margin-top: 80px;">Ảnh</div>
                <div class="col-md-10">
                    <input type='file' name="photo" onchange="readURL(this);" style="background: #FFFFFF;" />
                    <img id="blah" src="http://placehold.it/180" alt="your image" />
                </div>
            </div>
            <style type="text/css">
                img{
                     max-width:180px;
                    }
                    input[type=file]{
                    padding:10px;
                    background:#2d2d2d;}
            </style>
            <script type="text/javascript">
                 function readURL(input) {
                    if (input.files && input.files[0]) {
                    var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#blah')
                                .attr('src', e.target.result);
                        };

                     reader.readAsDataURL(input.files[0]);
            }
        }
            </script>
            <!-- end rows -->
            <?php if(isset($record->photo) && file_exists("../assets/upload/products/".$record->photo)): ?>
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <img src="../assets/upload/products/<?php echo $record->photo; ?>" style="width:100px;">
                </div>
            </div>
            <!-- end rows -->
            <?php endif; ?>
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