
<?php

class Session{
	
	
  
    public static function read($id)
    {  
       if(!isset($_SESSION[$id])) {return null;}
       else{
       $data = $_SESSION[$id];
        
        if(is_array($data)){
        	
        	foreach ($data as $key => $value){
        		
        		if(is_array($value)){
					
					foreach ($value as $key_params => $params){
						
						$data[$key][$key_params] =self::decrypt($params);;
						
						}
					
					}        		
        		
        		else{	$data[$key] = self::decrypt($value);}
        		
        		}
        	return $data;
        	}

        else{return self::decrypt($data);}
        }
    }

    public static function write($id, $data)
    {  
    
    		if(is_array($data)){
        	
        	foreach ($data as $key => $value){
	
				if(is_array($value)){
					
					foreach ($value as $key_params => $params){
						
						$_SESSION[$id][$key][$key_params] = self::encrypt($params);
						
						}
					
					}        		
        		
        		else{$_SESSION[$id][$key] = self::encrypt($value);}
        		
        		}
       
        	}

        else{$_SESSION[$id]=self::encrypt($data);}
        
        return true;
    }
    
	public static function clear($var1,$var2=null,$var3=null) {
		
		if($var3!=null){unset($_SESSION[$var1][$var2][$var3]);}
		elseif ($var2!=null){unset($_SESSION[$var1][$var2]);}
		else{unset($_SESSION[$var1]);}
		
		}   
    
    private static function encrypt($value){

    	return mcrypt_encrypt(MCRYPT_BLOWFISH, App::Config('key'), $value, MCRYPT_MODE_ECB);
			
    	
    	}
    	
    private static function decrypt($value){
    

   	return trim(mcrypt_decrypt(MCRYPT_BLOWFISH, App::Config('key'), $value, MCRYPT_MODE_ECB));
		
    	
    	}	
    
    public static function close(){
    	
    	echo $_SESSION['url']['current'];
    	echo $_SESSION['url']['prev'];
    	
    	
    	}
    
    
}

