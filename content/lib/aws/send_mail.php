<?php


require_once('class.phpmailer.php');

$i=0;

while($i<1){

$mail = new phpmailer;
 
// Set mailer to use AmazonSES.
$mail-> IsAmazonSES();
 
 
$mail-> AddAmazonSESKey("AKIAJRDZN3RVIEIALLSA", "fGPSqwPUbgiCr/WZL/J3WQ/KQ5AfTFwR1sO/jOt2");
 
 
$mail-> From = "yassinemobile@gmail.com";
$mail-> FromName = "yassine";
 
$mail-> AddAddress("yassine.kadda@data-embassy.com", "yassine");
$mail-> Subject = "email amazon SES";
$mail-> Body = "hello world";
if(!$mail-> Send()){
	
echo "error";	
	
}else{
	
	echo "ok";
}

$i=$i+1;

}

 /*
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug=2;
$mail->SMTPAuth   = true; 
$mail->Port   = 25;// 587; 
//$mail->SMTPSecure = "tls"; 
$mail->Host       = "email-smtp.us-east-1.amazonaws.com";
$mail->Username   = "AKIAJRDZN3RVIEIALLSA";//"SAKIAJARH4LC6ZYHI3J2Q";
$mail->Password   = "fGPSqwPUbgiCr/WZL/J3WQ/KQ5AfTFwR1sO/jOt2";//"AvFHAylzab6Df+cyk1H3xqD1lfAm3ItdrvXcH+Mk8BjX";
//

$mail->SetFrom('yassinemobile@gmail.com', 'yassine');  
$mail->Subject = "email via ses";
//message
$body = "Hello Message via ses";
 
$mail->MsgHTML($body);
//

//recipient
$mail->AddAddress("yassine.kadda@data-embassy.com", "yassine kadda"); 

//Success
if ($mail->Send()) { 
	echo "Message sent!"; die; 
}

//Error
if(!$mail->Send()) { 
	echo "Mailer Error: " . $mail->ErrorInfo; 
} 
*/
?>
