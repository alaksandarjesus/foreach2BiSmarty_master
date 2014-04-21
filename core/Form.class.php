<?php 


class Form{
	
public static function label($for, $label){
	
	return "<label for=\"".$for."\">".$label."</label>";
	}	
public static function close(){
	return "</form>";	
		}
public static function open($action,array $params=null){
	if(!empty($params)){
	if(isset($params['file'])){unset($params['file']);$params["enctype"]="multipart/form-data";}	
	$formattributes = self::formattributes($params);}
	else {$formattributes=null;}
	return "<form action=\"".App::Config('url').$action."\" ".$formattributes.">";
	}
public static function text($name,array $params=null){
	if(!empty($params)){$formattributes = self::formattributes($params);}
	else {$formattributes=null;}
	return "<input type=\"text\" name=\"".$name."\" ".$formattributes." >";
	}
public static function password($name,array $params=null){
	if(!empty($params)){$formattributes = self::formattributes($params);}
	else {$formattributes=null;}
	return "<input type=\"password\" name=\"".$name."\" ".$formattributes." >";
	}
public static function hidden($name,array $params=null){
	if(!empty($params)){$formattributes = self::formattributes($params);}
	else {$formattributes=null;}
	return "<input type=\"hidden\" name=\"".$name."\" ".$formattributes." >";
	}
public static function email($name,array $params=null){
	if(!empty($params)){$formattributes = self::formattributes($params);}
	else {$formattributes=null;}
	return "<input type=\"email\" name=\"".$name."\" ".$formattributes." >";
	}
public static function color($name,array $params=null){
	if(!empty($params)){$formattributes = self::formattributes($params);}
	else {$formattributes=null;}
	return "<input type=\"color\" name=\"".$name."\" ".$formattributes." >";
	}
public static function date($name,array $params=null){
	if(!empty($params)){$formattributes = self::formattributes($params);}
	else {$formattributes=null;}
	return "<input type=\"date\" name=\"".$name."\" ".$formattributes." >";
	}
public static function datetime($name,array $params=null){
	if(!empty($params)){$formattributes = self::formattributes($params);}
	else {$formattributes=null;}
	return "<input type=\"datetime\" name=\"".$name."\" ".$formattributes." >";
	}	
public static function datetimelocal($name,array $params=null){
	if(!empty($params)){$formattributes = self::formattributes($params);}
	else {$formattributes=null;}
	return "<input type=\"datetime-local\" name=\"".$name."\" ".$formattributes." >";
	}
public static function month($name,array $params=null){
	if(!empty($params)){$formattributes = self::formattributes($params);}
	else {$formattributes=null;}
	return "<input type=\"month\" name=\"".$name."\" ".$formattributes." >";
	}
public static function number($name,array $params=null){
	if(!empty($params)){$formattributes = self::formattributes($params);}
	else {$formattributes=null;}
	return "<input type=\"number\" name=\"".$name."\" ".$formattributes." >";
	}
public static function range($name,array $params=null){
	if(!empty($params)){$formattributes = self::formattributes($params);}
	else {$formattributes=null;}
	return "<input type=\"range\" name=\"".$name."\" ".$formattributes." >";
	}			
public static function tel($name,array $params=null){
	if(!empty($params)){$formattributes = self::formattributes($params);}
	else {$formattributes=null;}
	return "<input type=\"tel\" name=\"".$name."\" ".$formattributes." >";
	}
public static function url($name,array $params=null){
	if(!empty($params)){$formattributes = self::formattributes($params);}
	else {$formattributes=null;}
	return "<input type=\"url\" name=\"".$name."\" ".$formattributes." >";
	}
public static function week($name,array $params=null){
	if(!empty($params)){$formattributes = self::formattributes($params);}
	else {$formattributes=null;}
	return "<input type=\"week\" name=\"".$name."\" ".$formattributes." >";
	}	
	
public static function image($name,array $params=null){
	if(!empty($params)){$formattributes = self::formattributes($params);}
	else {$formattributes=null;}
	return "<input type=\"image\" name=\"".$name."\" ".$formattributes." >";
	}
			
public static function checkbox($name,$value,$params=null){
	if(!empty($params)){$formattributes = self::formattributes($params);}
	else {$formattributes=null;}	
	return "<input type=\"checkbox\" name=\"".$name."\" "."value=\"".$value."\" ".$formattributes.">";
	}
	

public static function file($name,$params=null){
	if(!empty($params)){$formattributes = self::formattributes($params);}
	else {$formattributes=null;}	
	return "<input type=\"file\" name=\"".$name."\" ".$formattributes.">";
	}	


public static function radio($name,$value,$params=null){
	if(!empty($params)){$formattributes = self::formattributes($params);}
	else {$formattributes=null;}	
	return "<input type=\"radio\" name=\"".$name."\" "."value=\"".$value."\" ".$formattributes.">";
	}

public static function reset($value,array $params=null){
	if(!empty($params)){$formattributes = self::formattributes($params);}
	else {$formattributes=null;}
	return "<input type=\"reset\" value=\"".$value."\" ".$formattributes." >";
	}
public static function search($value,array $params=null){
	if(!empty($params)){$formattributes = self::formattributes($params);}
	else {$formattributes=null;}
	return "<input type=\"search\" value=\"".$value."\" ".$formattributes." >";
	}	
public static function submit($value,array $params=null){
	if(!empty($params)){$formattributes = self::formattributes($params);}
	else {$formattributes=null;}
	return "<input type=\"submit\" value=\"".$value."\" ".$formattributes." >";
	}		
	
public static function textarea($name,$value=null,$params=null){
	if(!empty($params)){$formattributes = self::formattributes($params);}
	else {$formattributes=null;}
	return "<textarea name=\"$name\" ".$formattributes."> ".$value."</textarea>";
	}	
	
public static function select($name,$params){
	if(isset($params['required'])){$required="required ";unset($params['required']);}else{$required=null;}
	if(isset($params['optgroup'])){
		$optgroup="";
		foreach ($params['optgroup'] as $key=>$values){
			$optgroup=$optgroup."<optgroup label = ".$key." >";
				foreach($values as $value){
					$optvalue=explode("|",$value);
					$optgroup=$optgroup."<option value = \"".$optvalue[0]."\">".$optvalue[1]."</option>";
					}
			$optgroup=$optgroup."</optgroup>";
			}
		unset($params['optgroup']);
		}else{$optgroup=null;}
		
		if(isset($params['options'])){
		$options="";
				foreach($params['options'] as $value){
					$optvalue=explode("|",$value);
					$options=$options."<option value = \"".$optvalue[0]."\">".$optvalue[1]."</option>";
					}
		unset($params['options']);
		}
		else{$options=null;}
		$formattributes = self::formattributes($params);
		return "<select name= \"$name\" ".$formattributes.$required." > ".$optgroup.$options."</select>";
	
	}	
	
public static function ckeditor($name){
	
	return HTML::script("helpers/ckeditor/ckeditor.js")."<textarea class=\"ckeditor\" name=\"".$name."\"></textarea>";
	}	
private static function formattributes($attributes){
	$formattributes="";
	foreach($attributes as $key=>$value){
				if(is_int($key)){$formattributes=$formattributes.$value." ";}
				else{$formattributes=$formattributes.$key."=\"".$value."\" ";}
		}
	return $formattributes;
	}		
	
public static function value($variable)

{  $value=null;
	$session = Session::read("form_values");
	if($session!=null){
	if(array_key_exists($variable, $session))
	{	Session::clear("form_values",$variable);
		$value= $session[$variable];
	}
	}
	return $value;
	
		
	}

public static function error_first($variable)

{	$error_first=null;
	$session = Session::read("form_error");
	if($session!=null){
	if(array_key_exists($variable, $session))
	{	$error_first=$session[$variable][0];
		Session::clear("form_error",$variable,0);}
	}	
	return $error_first;
}	
	
public static function error_all(array $variables)

{	$error_all=null;
	$session = Session::read("form_error");
	if($session!=null){
	foreach ($variables as $variable){
	if(array_key_exists($variable, $session))
	{foreach ($session[$variable] as $value){
			
			$error_all = $error_all.$value."</br>"	;
		
		}
		Session::clear("form_error",$variable);
	}
	}
	
	}
	
	return $error_all;
}

}