<?php 
    
class Validator{
        
    public static function input(array $values, array $rules){
            $no_error= true;
            Session::write('form_values',$values);
            foreach ($rules as $key => $rule){
            	if(!array_key_exists($key,$values)){trigger_error("POST value Key and Rule Key does not match");return false;}
            		$i=0;
                	$check_rule= explode("|",$rule);
                		foreach ($check_rule as $function){
								$function = explode(":",$function);                			
                				if(!isset ($function[1])){$function[1]=null;}
                					$function_return=self::$function[0]($key,$values[$key],$function[1]);
                			 	if($function_return!==true){
                			 		$error[$key][$i]=$function_return;
										Session::write('form_error',$error);
                			 		$no_error=false;
                			 		$i++;
                			 		}       				
                				
                			}	
                
                }
            return $no_error;
        
     }
     
  public static function file(array $file, array $rules){
		$no_error= true;
		 Session::write('form_values',$file);
		foreach ($file as $fileid=>$variables){
				$i=0;
				foreach ($rules as $key => $rule){
					if(!array_key_exists($key,$variables)){trigger_error("File value Key and Rule Key does not match"); return false;}
								$check_rule= explode("|",$rule);
								foreach ($check_rule as $function){
								$function = explode(":",$function);                			
                				if(!isset ($function[1])){$function[1]=null;}
                					$function_return=self::$function[0]($fileid,$variables[$key],$function[1]);
                			 	if($function_return!==true){
                			 		$error[$fileid][$i]=$function_return;
										Session::write('form_error',$error);
                			 		$no_error=false;
                			 		$i++;
                			 		}       				
                				
                			}	
				
					}		
			
					
			}
 			return $no_error;
  			
  	}
  
  
  
    private static function required($key,$value){
    	if(!isset($value) or empty($value) or $value==null){return "The $key is required";}
    	else {return true;}
    	  	}
    private static function alpha_numeric($key,$value)	{
		if(!ctype_alnum($value)){return  "The $key should be alphanumeric.";}else{return true;}
		}
		
	private static function alpha($key,$value)	{
		if(!ctype_alpha($value)){return  "The $key should contain only alphabets.";}else{return true;}
		}
	
	private static function cntrl($key,$value)	{
		if(!ctype_cntrl($value)){return  "The $key should be control characters.";}else{return true;}
		}
	private static function digit($key,$value)	{
		if(!ctype_digit($value)){return  "The $key should be digits.";}else{return true;}
		}
	private static function graph($key,$value)	{
		if(!ctype_graph($value)){return  "The $key should be printable character(s) except space.";}else{return true;}
		}
	private static function lower($key,$value)	{
		if(!ctype_lower($value)){return  "The $key should be lower case letters.";}else{return true;}
		}
	
	private static function punct($key,$value)	{
		if(!ctype_punct($value)){return  "The $key should not be white space or an alphanumeric character.";}else{return true;}
		}

	private static function space($key,$value)	{
		if(!ctype_space($value)){return  "The $key should not have white space.";}else{return true;}
		}	
	private static function upper($key,$value)	{
		if(!ctype_upper($value)){return  "The $key should be uppercase letters.";}else{return true;}
		}
	private static function xdigit($key,$value)	{
		if(!ctype_xdigit($value)){return  "The $key should be hexadecimal digit .";}else{return true;}
		}
	
	private static function str_len_min($key,$value,$length){
		if(strlen($value)<$length){return "The $key should be minimum $length characters.";}
		else{return true;}
		}
		
	private static function str_len_max($key,$value,$length){
		if(strlen($value)>$length){return "The $key should be maximum $length characters.";}
		else{return true;}
		}
		
	private static function str_len_between($key,$value,$length){
		$string_length=explode(",",$length);
		if(strlen($value)<$string_length[0] or strlen($value)>$string_length[1])
		{return "The $key should be minimum ".$string_length[0]." and maximum ".$string_length[1]." characters.";}
		else{return true;}
		}
	private static function str_len_equals($key,$value,$length){
		if(strlen($value)!=$length){return "The $key should be $length characters only.";}
		else{return true;}
		}
				
	private static function value_less($key,$value,$int_value){
		if($value>$length){return "The $key should be less than $int_value .";}
		else{return true;}
		}
		
	private static function value_greater($key,$value,$int_value){
		if($value<$length){return "The $key should be greater than $int_value .";}
		else{return true;}
		}
		
	private static function value_between($key,$value,$int_value){
		$int_value=explode(",",$int_value);
		if($value<$int_value[0] or $value>$int_value[1])
		{return "The $key should not be less than ".$int_value[0]." and greater than ".$int_value[1];}
		else{return true;}
		}
	private static function value_equals($key,$value,$int_value){
		if($value!==$length){return "The $key should be $int_value value only.";}
		else{return true;}
		}
	
	private static function email($key,$value)	{
		if(!filter_var($value,FILTER_VALIDATE_EMAIL)){return "The $key is not a valid email.";}else{return true;}
		} 
	private static function boolean($key,$value)	{
		if(!filter_var($value,FILTER_VALIDATE_BOOLEAN)){return "The $key is not a valid boolean.";}else{return true;}
		}
	private static function float($key,$value)	{
		if(!filter_var($value,FILTER_VALIDATE_FLOAT)){return "The $key is not a valid float.";}else{return true;}
		}
	private static function int($key,$value)	{
		if(!filter_var($value,FILTER_VALIDATE_INT)){return "The $key is not a valid integer.";}else{return true;}
		}
	private static function ip($key,$value)	{
		if(!filter_var($value,FILTER_VALIDATE_IP)){return "The $key is not a valid IP.";}else{return true;}
		}
	private static function url($key,$value)	{
		if(!filter_var($value,FILTER_VALIDATE_URL)){return "The $key is not a valid URL.";}else{return true;}
		}
    private static function does_not_exist($key,$value,$dblist)	{
		$dblist = explode(",", $dblist);
		$checkunique=Database::get(App::DB($dblist[0]),'*',$dblist[1],"WHERE ".$dblist[2]." = ?",array($value));
		if($checkunique){return "The $key is available in our database";}else{return true;}
		}	
	private static function does_exist($key,$value,$dblist)	{
		$dblist = explode(",", $dblist);
		$checkunique=Database::get(App::DB($dblist[0]),'*',$dblist[1],"WHERE ".$dblist[2]." = ?",array($value));
		if(!$checkunique){return "The $key does not match with our records";}else{return true;}
		}   
	
	private static function 	mime($key,$type,$extensions){
		$return = "The allowed extensions for $key are $extensions .";
		$extension=explode(",", $extensions);
		foreach ($extension as $ext){
				$mime = App::mime($ext);
			if(strcasecmp($type,$mime)==0){
					$return = true;			
				}		
					
			}
			return $return;
		
		}
	
	private static function size_min($key,$size,$min_size){
		$size=$size/1024;
		$return="The allowed file size for $key should be minimum $min_size kB";
		if($size>$min_size){$return=true;}
		return $return;
		}
	private static function size_max($key,$size,$max_size){
		$size=$size/1024;
		$return="The allowed file size for $key should be maximum $max_size kB";
		if($size<$max_size){$return=true;}
		return $return;
		}
	private static function size_exact($key,$size,$exact_size){
		$size=$size/1024;
		$return="The allowed file size for $key should be exactly $exact_size kB";
		if($size==$exact_size){$return=true;}
		return $return;
		}
	private static function size_between($key,$size,$extensions){
		$size=$size/1024;
		$size_allowed=explode(",",$extensions);
		$return="The allowed file size for $key should be minimum ". $size_allowed[0]." kB and maximum ".$size_allowed[1]. " kB";
		if($size>$size_allowed[0] && $size<$size_allowed[1]){$return=true;}
		return $return;
		}	
	private static function 	file_exists($key,$name,$location){
		$return="$name file does not exist";
		if(file_exists(dirname(__FILE__).'/../'.$location."/".$name)){$return=true;}
		return $return;
		}
	private static function 	file_not_exists($key,$name,$location){
		$return="$name file exists";
		if(!file_exists(dirname(__FILE__).'/../'.$location."/".$name)){$return=true;}
		return $return;
		}
		
		
		
        }
