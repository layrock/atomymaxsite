<?php

function SendMailGmail($member_id ,$name, $user_name , $pwd_name1 , $email ,$home){
	require_once('includes/phpmailler/class.phpmailer.php');
	$mail = new PHPMailer();
	$mail->IsHTML(true);
	$mail->IsSMTP();
	$mail->SMTPAuth = true; // enable SMTP authentication
	$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
	$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
	$mail->Port = 465; // set the SMTP port for the GMAIL server
	$mail->Username = "atomy2516@gmail.com"; // GMAIL username
	$mail->Password = "chudnoi3123"; // GMAIL password
	$mail->From = "".$admin_mail.""; // "name@yourdomain.com";
	//$mail->AddReplyTo = "support@thaicreate.com"; // Reply
	$mail->FromName = "�Ѵʡ� �ԡ�ŷͧ";  // set from Name
	$mail->Subject = "".$subject_mail.""; 
	$mail->Body = "
<html>
<title>Email for new User</title>
<body>
<table>
<tr><td><br>�������������´��ҧ�㹡���������к���Ѻ</td></tr>
<tr><td><br>���ʴդ�Ѻ�س ".$name."</td></tr>
<tr><td><br>�Թ�յ�͹�Ѻ��Ѻ ��Ҫԡ���� �����Ţ��Ҫԡ�ͧ�س��� ".$member_id."</td></tr>
<tr><td><br>��������´�ͧ�س㹡���������к��մѧ���仹���Ѻ</td></tr>
<tr><td><br>user  =  ".$user_name."</td></tr>
<tr><td><br>pwd  =   ".$pwd_name1."</td></tr>
<tr><td><br>-- �͢ͺ�س����ҹ �������Ѥ�����Ҫԡ�Ǻ�ͧ���  --</td></tr>
<tr><td><br>��������������¹�ѹ�����Ф�Ѻ ".$home."</td></tr>
</table>
</body>
</html>
	";

	$mail->AddAddress("".$email."", "".$name.""); // to Address

//	$mail->AddAttachment("thaicreate/myfile.zip");
//	$mail->AddAttachment("thaicreate/myfile2.zip");

	//$mail->AddCC("member@thaicreate.com", "Mr.Member ShotDev"); //CC
	//$mail->AddBCC("member@thaicreate.com", "Mr.Member ShotDev"); //CC

	$mail->set('X-Priority', '1'); //Priority 1 = High, 3 = Normal, 5 = low

//	$mail->Send(); 
	if($mail->Send()
{
echo "<br><br><center><font size='3' face='MS Sans Serif'><b>" ;
echo "��й����������´��ҧ�ͧ�س��١�觼�ҹ价ҧ���������Ǥ�Ѻ</b></font></center>" ;
}else{
echo "�������ö�����������Ѻ";
}

	}
?>
