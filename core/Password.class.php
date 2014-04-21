<?php  
class Password{
	
	
public static function set($Password){
	
	return sha1($Password.App::Config('key'));
	
	}
	
public static function equals($Password, $hashedpassword){
	
	$Password = sha1($Password.App::Config('key'));
	
	if(strcasecmp($Password,$hashedpassword)==0){return true;} else{return false;}

	echo $Password."<br>".$hashedpassword;
	
	}
	
	}