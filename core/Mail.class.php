<?php 
class Mail{

	
	public static function send($template,array $smartyvar,$mailparams){

$equals = array(	"AltBody","Body","CharSet","ConfirmReadingTo","ContentType",  "Encoding", "ErrorInfo","From", "FromName", 
							"Helo", "Host", "Hostname", "LE", "Mailer", "MessageID", "Password", "PluginDir","Port", "Priority", 
							"SMTPAuth", "SMTPDebug", "SMTPKeepAlive", "SMTPSecure", "Sender","Sendmail", "SingleTo", "Subject",
							"Timeout", "Username", "Version", "WordWrap",  "error_count",  "message_type", "sign_cert_file", 
							"sign_key_file","sign_key_pass","smtp","CustomHeader","ReplyTo","attachment", "bcc",	"boundary", "cc","language","to");	
$methods[0]=array("AttachAll","CreateBody", "CreateHeader","GetMailMIME","InlineImageExists","IsError", "IsHTML", "IsMail", "IsQmail", "IsSMTP", "IsSendmail",
 								 "RFCDate","Send","ServerHostname", "SetMessageType", "SetWordWrap","SmtpConnect");
$methods[1]=array("AddCustomHeader","AddrFormat","Base64EncodeWrapMB","EncodeQ_callback","EndBoundary", "FixEOL","HasMultiBytes",  
 						 "Lang", "SecureHeader","ServerVar", "SetError", "TextLine","_mime_types","getFile");
$methods[2]= array("AddAddress","AddBCC", "AddCC","AddReplyTo","AddrAppend","EncodeFile","EncodeHeader", "EncodeQ",
							"EncodeString","HeaderLine","MailSend", "MsgHTML","SendmailSend","SmtpSend","UTF8CharBoundary","set");
$methods[3]=array("EncodeQP","Sign","WrapText"); 								 
$methods[4]= array("AddAttachment","AddStringAttachment","GetBoundary","SetLanguage");
$methods[5]= array("AddEmbeddedImage",);
$last=array("ClearAddresses", "ClearAllRecipients", "ClearAttachments", "ClearBCCs", "ClearCCs", "ClearCustomHeaders",
 								 "ClearReplyTos","SmtpClose");
 					
	
date_default_timezone_set(App::Config('timezone'));


require 'helpers/phpmailer/PHPMailerAutoload.php';
	
//Create a new PHPMailer instance
$mail = new PHPMailer(true);

$popcheck=App::mail('pop');
if($popcheck[0]){$pop = POP3::popBeforeSmtp($popcheck[1]);}

$type=App::mail('type');
foreach ($type as $key=>$value){
	if($value){$mail->$key();}	
	}

if($type['IsSMTP']){
	$smtp=App::mail('smtp')	;
	foreach ($smtp as $key=>$value){
		$mail->$key=$value	;	
	}
	}
foreach ($mailparams as $key=>$value){
if(in_array($key,$equals)){$mail->$key=$value;}
else{
	if(is_array($key)){$value=explode(",",$value);}
	for($i=0;$i<=5;$i++){
		if(in_array($key,$methods[$i])){
			if($i==0){$mail->$key();}
			if($i==1){$mail->$key($value);}
			if($i==2){$mail->$key($value[0],$value[1]);}
			if($i==3){$mail->$key($value[0],$value[1],$value[2]);}
			if($i==4){$mail->$key($value[0],$value[1],$value[2],$value[3]);}
			if($i==5){$mail->$key($value[0],$value[1],$value[2],$value[4],$value[5]);}
			}
		}
	 }
	}

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$smarty = new Smarty;
foreach($smartyvar as $key=>$variable){
								if(!is_array($variable)){$smarty->assign($key,$variable);}
								else{
										foreach($variable as $arraykey=>$arrayvar){
											$smarty->assign($arraykey,$arrayvar);
										}
									}
								}
$mail->msgHTML($smarty->fetch($template.".html"));

	
//send the message, check for errors
if (!$mail->send()) { return false;}
else {
	foreach ($mailparams as $key=>$value){
		if(in_array($key,$last)){$mail->$key();}
		}
  	return true;
		}

}
}
	
