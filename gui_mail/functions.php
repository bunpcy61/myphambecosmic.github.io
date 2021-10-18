<?php
function sendMail($title, $content, $nTo, $mTo){
	var_dump('run');exit();
	$nFrom = 'Devpro Việt Nam';
	$mFrom = 'hangchibun600@gmail.com';	//dia chi email cua ban
	
	// truy cập " https://myaccount.google.com/security " bật xác minh 2 bước rồi tạo mật khẩu ứng dụng
	$mPass = 'lanhthihang2000';		//mat khau ung dung

	$mail  = new PHPMailer();
	$body  = $content;
	$mail->IsSMTP(); 
	$mail->CharSet 	= "utf-8";
	$mail->SMTPDebug  = 0;                     // enables SMTP debug information
	$mail->SMTPAuth   = true;                  	// enable SMTP authentication
	$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	$mail->Host       = "smtp.gmail.com";      	
	$mail->Port       = 465;
	$mail->Username   = $mFrom;  			 // GMAIL username
	$mail->Password   = $mPass;           	 // GMAIL password
	$mail->SetFrom($mFrom, $nFrom);
	$mail->Subject    = $title;
	$mail->MsgHTML($body);
	$address = $mTo;
	$mail->AddAddress($address, $nTo);
	
	// $mail->AddReplyTo('buivietha023@gmail.com', 'Hakk');    //trường hợp đổi email nhận phản hồi
	if(!$mail->Send()) {
		return 0;   // lỗi
	} else {
		return 1;   // thành công
	}
}

?>