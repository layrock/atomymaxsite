<?php
//////////////////////////////////////////// �ʴ���¡�â������ / ��Ъ�����ѹ�� 
if($op == ""){
$_GET['id'] = intval($_GET['id']);
//�ʴ��������/��Ъ�����ѹ�� 
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
if ($mo=='news'){
$res['mail'] = $db->select_query("SELECT * FROM ".TB_NEWS." WHERE id='".$_GET['id']."' ");
} else if ($mo=='knowledge'){
$res['mail'] = $db->select_query("SELECT * FROM ".TB_KNOWLEDGE." WHERE id='".$_GET['id']."' ");
} else if ($mo=='blog'){
$res['mail'] = $db->select_query("SELECT * FROM ".TB_BLOG." WHERE id='".$_GET['id']."' ");
}
$arr['mail'] = $db->fetch($res['mail']);

	$link="<a href=".WEB_URL."/?name=".$mo."&file=read".$mo."&id=".$arr['mail']['id'].">"._MOD_SENDMAIL_CLICK_LINK."</a>";
?>
				<TABLE width="490" align=left cellSpacing=0 cellPadding=0 border=0>
				<TR>
					<TD height="1" class="dotline" colspan="2">
					<?php echo _MOD_SENDMAIL_DETAIL_MESSAGE;?>
					</TD>
				</tr>
 <form action="popup.php?name=sendmail&op=addmail" name="myform" method="post" enctype="multipart/form-data" >

<TR vAlign=top>
<TD WIDTH="25%" ALIGN="right" BGCOLOR="#FFFFFF"><STRONG><?php echo _MOD_SENDMAIL_FORM_MAIL_TO;?> :</font></strong></TD>
<TD width=345><INPUT maxLength=40 size=35 name=mailtos>
<img src="modules/alumnus/img/priority.gif" width="11" height="12"></TD>
</TR>
<TR vAlign=top>
<TD WIDTH="25%" ALIGN="right" BGCOLOR="#FFFFFF"><STRONG><?php echo _MOD_SENDMAIL_FORM_MAIL_FROM;?> :</strong></TD>
<TD width=345><INPUT maxLength=20 size=35 name=sendname></TD>
</TR>
<TR>
<TD WIDTH="25%" ALIGN="right" BGCOLOR="#FFFFFF"><STRONG><?php echo _MOD_SENDMAIL_FORM_MAIL_FROMEMAIL;?> : </STRONG></TD>
<TD BGCOLOR="#FFFFFF">
<INPUT NAME="emailx" TYPE="text" ID="emailx" MAXLENGTH="50" ></TD>
</TR>
<TR vAlign=top>
<TD WIDTH="25%" ALIGN="right" BGCOLOR="#FFFFFF"><FONT SIZE="2"><STRONG><?php echo _MOD_SENDMAIL_FORM_MAIL_SUBJ;?> :</TD>
<TD width=345><INPUT maxLength=30 size=30 name=topic></TD>
</tr>

<TR vAlign=top>
<TD vAlign=center align=right>&nbsp;</TD>
<TD>
 <input type="hidden" name="LINK" value="<?=$link;?>" >
<input type="submit" name="Submit" value=" <?php echo _MOD_SENDMAIL_FORM_MAIL_BUTTON_SEND;?> ">
<input type="reset" name="Reset" value=" <?php echo _MOD_SENDMAIL_FORM_MAIL_BUTTON_RESET;?> "></TD>
</TR>
</form>
</table>


<?
}
else if($op == "addmail"){
	//////////////////////////////////////////// �ó����� Database
function sendmailtofreind($mailtos,$topic,$emailx,$sendname,$LINK) {
global $mailtos,$topic,$emailx,$sendname,$LINK;
$message_mail = "
<html>
<title>"._MOD_SENDMAIL_FUNTION_SEND_TITLE."</title>
<body>
<table>
<tr><td><br>"._MOD_SENDMAIL_FUNTION_SEND_MESS_1." ".$mailtos."</td></tr>
<tr><td><br>"._MOD_SENDMAIL_FUNTION_SEND_MESS_2." ".$LINK." "._MOD_SENDMAIL_FUNTION_SEND_MESS_3."</td><br></tr>
<tr><td><br>"._MOD_SENDMAIL_FUNTION_SEND_MESS_4." ".$sendname."  email : ".$emailx."</td></tr>
</table>
</body>
</html>
" ;

require_once("includes/phpmailler/class.phpmailer.php");
 $mail = new PHPMailer();
 $mail->CharSet = "utf-8";
 $mail->IsSMTP();
 $mail->IsHTML(true);
 $mail->Host = 'ssl://smtp.gmail.com';
 $mail->Port = 465;
 $mail->SMTPAuth = true;
 $mail->Username = ""._GOOGLE_SEND_MAIL_USER.""; //������ͧ�س (Google App)
 $mail->Password = ""._GOOGLE_SEND_MAIL_PASS.""; //���ʼ�ҹ������ͧ�س (Google App)
 $mail->From = "".$emailx.""; // ���繼����
 $mail->FromName = "".$sendname.""; // ���ͼ�����ѡ�Դ��Ѻ
 $mail->Subject  = $topic;
 $mail->Body     =  $message_mail;
 $mail->AltBody =  $message_mail;
 $mail->AddAddress($mailtos); // ��价���ôդ�Ѻ
// $mail->Send(); 

if( $mail->send("".$mailtos."")){
	    echo ""._MOD_SENDMAIL_FUNTION_SEND_MESS_ACC." ".$mailtos."  "._MOD_SENDMAIL_FUNTION_SEND_MESS_ACC1."";
} else {
		echo "Mailer Error: " . $mail->ErrorInfo;
}

}

sendmailtofreind( $mailtos,$topic,$emailx,$sendname,$LINK );

} else {
echo "<br><br><center><b>" ;
echo "<center><font size=\"3\" face='MS Sans Serif'><b>"._MOD_SENDMAIL_FUNTION_SEND_MESS_FORM_NOACC."</b></font></center>" ;

}
?>


