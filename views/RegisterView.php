<?php 
  //load file LayoutTrangChu.php
  $this->fileLayout = "LayoutTrangTrong.php";
 ?>
<div class="template-customer">
          <h1 style="font-size:18px;font-weight: bold;">Đăng ký tài khoản</h1>
          <?php if(isset($_GET["notify"])&&$_GET["notify"]=="error"): ?>
          <p style="color:red;">Đăng ký chưa thành công, bạn hãy kiểm tra lại thông tin!</p>
          <?php else: ?>
          <p> Nếu bạn chưa có tài khoản, hãy đăng ký ngay để nhận thông tin ưu đãi cùng những ưu đãi từ cửa hàng.</p>
          <?php endif; ?>
          <?php if(isset($_GET["notify"])&&$_GET["notify"]=="confirm"): ?>
          <p style="color:red;font-size: 18px;">Vui lòng kiểm tra email của bạn để xác minh tài khoản</p>
          <?php endif; ?>
          <div class="row" style="margin-top:50px;">
            <div class="col-md-6">
              <div class="wrapper-form" style="background-color: #fccfcf;">
                  <div class="form-left">
                     <div class="form-right" style="position: absolute;top: -20px;margin-left:-100px;">
                    <img src="assets/fontend/images/image-2.png" alt="form" width="50%">
                    </div>
                    <p class="title"><span>Đăng ký tài khoản</span></p>
                  </div>
                <form method='post' action="index.php?controller=account&action=registerPost">
                  
                  <div class="form-group">
                    <label>Họ và tên:</label>
                    <input type="text" name="name" class="input-control">
                  </div>
                  <div class="form-group">
                    <label>Email:<b id="req">*</b></label>
                    <input type="text" name="email" class="input-control" required>
                  </div>
                  <div class="form-group">
                    <label>Địa chỉ:</label>
                    <input type="text" name="address" class="input-control">
                  </div>
                  <div class="form-group">
                    <label>Điện thoại:</label>
                    <input type="text" name="phone" class="input-control">
                  </div>
                  <div class="form-group">
                    <label>Mật khẩu:<b id="req">*</b></label>
                    <input type="password" name="password" class="input-control" required="">
                  </div>
                  <div class="form-group">
                    <input type="submit" class="button" value="Đăng ký">
                  </div>
                </form>
                </div>
                <div class="form-right" style="position: absolute; margin-left: 320px; top:300px">
                    <img src="assets/fontend/images/image-2.png" alt="form">
                </div>
              </div>
            <div class="col-md-6">
              <div class="wrapper-form">
                <p class="title"><span>Đăng nhập</span></p>
                <p>Đăng nhập tài khoản nếu bạn đã có tài khoản. Đăng nhập tài khoản để theo dõi đơn đặt hàng, vận chuyển và đặt hàng được thuận lợi.</p>
                <a href="index.php?controller=account&action=login" class="button">Đăng nhập</a> </div>
            </div>
          </div>
        </div>