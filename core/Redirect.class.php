<?php 

class Redirect{

public static function back($smarty=null){
	if($smarty){$_SESSION['with']=$smarty;}
  	header("location:".App::Config('url').$_SESSION['url']['prev']);
	}	
	
public static function url($controller,$method,$url_params=null){
	$url=($controller."/".$method."/".$url_params);
	if(!isset($_SESSION['url']['current'])){$_SESSION['url']['current']=$url;$_SESSION['url']['prev']=$url;}
	else{$_SESSION['url']['prev']=$_SESSION['url']['current'];$_SESSION['url']['current']=$url;}
	return true;
	}
	

	
public static function to($url,$smarty=null){
		if($smarty){$_SESSION['with']=$smarty;}
		header("location:".App::Config('url').$url);
	}	

	
	
}