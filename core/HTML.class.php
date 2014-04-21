<?php  
class HTML{
	
public static function br($line=null){
	settype($line,"integer");
	if($line==null or $line==1 or $line==0){$break= "<br />";}
	else{
		$break="";
		for ($i=0;$i<=$line-1;$i++){
		$break=$break."<br />";
		}
	}
	return $break;	
	
	}
	
public static function style($url){
	
	return "<link href = \"".App::Config('url').$url."\" rel=\"stylesheet\" type=\"text/css\" />";
	
	}	
	
public static function script($url){
	
	return "<script src =\"".App::Config('url').$url."\"></script>";
	
	}	
public static function bul($text){
	
	return "<strong><u>$text</u></strong>";
	
	}		
	

//Creates an HTML Link. Equivalent to use of <a href=""></a>

public static function link($link,$text,array $params=null){
	if($params!=null){$params=self::htmlattributes($params);}else{$params=null;}
	return "<a href=\"".App::Config('url').$link."\" ".$params.">".$text."</a>";
	} 

public static function button($text,array $params=null){
	if($params!=null){$params=self::htmlattributes($params);}else{$params=null;}
	return "<button ".$params.">".$text."</button>";
	}
	
private static function htmlattributes($attributes){
	$htmlattributes="";
	foreach($attributes as $key=>$value){
				if(is_int($key)){$htmlattributes=$htmlattributes.$value." ";}
				else{$htmlattributes=$htmlattributes.$key."=\"".$value."\" ";}
		}
	return $htmlattributes;
	}		
	
public static function space($space){
		settype($space,"integer");
	if($space==null or $space==1 or $space==0){$space= "&nbsp;";}
	else{
		$space_to="";
		for ($i=0;$i<=$space-1;$i++){
		$space_to=$space_to."&nbsp;";
		}
	}
	return $space_to;	
	}	
	}