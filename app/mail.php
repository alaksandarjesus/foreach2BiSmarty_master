<?php return array(
//Use the below link to get the parameters to be passed.
//http://www.tig12.net/downloads/apidocs/wp/wp-includes/PHPMailer.class.html#det_fields_to

"type"=>array(
//					Sets Mailer to send message using PHP mail() function. (true, false)
					"IsMail"=>false,
//					Sets Mailer to send message using SMTP. If set to true, other options are also available. (true, false )
					"IsSMTP"=>true,
//					 Sets Mailer to send message using the Sendmail program. (true, false)
					"IsSendmail"=>false,
//					Sets Mailer to send message using the qmail MTA. (true, false )
					"IsQmail"=>false

),

"smtp"=>array(

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
"SMTPDebug" => 0,

//Ask for HTML-friendly debug output
"Debugoutput" => 'html',

//Set the hostname of the mail server
"Host" => 'smtp.gmail.com',

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
"Port" => 587,

//Set the encryption system to use - ssl (deprecated) or tls
"SMTPSecure" => 'tls',

//Whether to use SMTP authentication
"SMTPAuth" => true,

//Username to use for SMTP authentication - use full email address for gmail
"Username" => "",

//Password to use for SMTP authentication
"Password" => "",

//Set who the message is to be sent from
"From" =>"",

//Set Name of the sender
"FromName"=>""
),

//Authenticate via POP3 (true, false)
//Now you should be clear to submit messages over SMTP for a while
//Only applies if your host supports POP-before-SMTP
"pop"=>array(false,"'pop3.example.com', 110, 30, 'username', 'password', 1")
);