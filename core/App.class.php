<?php 

class App{
	
	public static function pickfile($file){
		
			return  include ('app/'.$file.'.php');
		
		}
	
	public static function Config($data){
		$app = self::pickfile('config');
		return $app[$data];
			}	
			
	public static function message($data){
		$app = self::pickfile('message');
		return $app[$data];
			}
	
	public static function DB($data){
		$app = self::pickfile('database');
		return $app[$data];
		}	
		
	public static function page($data){
		$app = self::pickfile('page');
		return $app[$data];
		}
		
	
	public static function getsmartyvar(){
		$app = self::pickfile('smarty');
		return $app;
		}	
		
	public static function mail($data){
		$app = self::pickfile('mail');
		return $app[$data];
		}
	public static function createdon(){
		date_default_timezone_set(App::Config('timezone'));
		return date("Y-m-d H-i-s");
		}
	public static function randcode(){
		return md5(rand(1,100).date("Y-m-d H-i-s"));
		}	
	
	public static function mime($mimetype){
		$app = self::pickfile('mime');
		return $app[$mimetype];
		}			
		
	public static function file_upload($fileid, $destination,$saveas=null){
			$filename = $_FILES[$fileid]['tmp_name'];
			if($saveas==null){$saveas=$_FILES[$fileid]['name'];}
			$file_upload_status=move_uploaded_file($filename, dirname(__FILE__).'/../'.$destination."/".$saveas);	
			return $file_upload_status;
		
		}	
		
	}