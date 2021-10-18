<?php
	//goi thu vien
	include('class.smtp.php');
	include "class.phpmailer.php"; 
	include "functions.php"; 
	$title = 'Title của mail';
	$content = '<h1>Nội dung của mail</h1>';
	$nTo = 'Test';
	$mTo = 'hangchibun600@gmail.com';
	$file = 'filedinhkem.docx';
	$filename = 'file dinh kem';
	//gui mail
	$mail = sendMail($title, $content, $nTo, $mTo);
	if($mail==1)
		echo 'Mail của bạn đã được gửi đi hãy kiếm tra hộp thư đến để xem kết quả. ';
	else 
		echo 'Lỗi';
?>