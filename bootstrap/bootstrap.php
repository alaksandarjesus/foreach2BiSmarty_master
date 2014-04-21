<?php

//Set Session Path	
	ini_set('session.save_path',realpath( dirname(__FILE__) . '/../' . 'sessions'));
	session_cache_expire(30);
 	session_start();
 	
//Autoload Classes
	spl_autoload_register('load_class');
	spl_autoload_register('load_model');
	
	function load_class($class)
{
	
   	if(!file_exists("core/".ucfirst($class). '.class.php'))
   	
       {return false;}
       
   	else{require_once("core/".ucfirst($class). '.class.php');return true;}
}
	
//Autoload Models
function load_model($class)
{
    if(!file_exists("model/".ucfirst($class).'Model.php') )
    
	{return false;}
       
    else{ require_once("model/".ucfirst($class).'Model.php');return true;}
    
}

//Set Errors to display
		
	$smarty= App::getsmartyvar();
		
	if(App::Config('debug') && !$smarty['debugging']){ini_set("display_errors",1);
										
	require( dirname(__FILE__) . '/../core/php_error.php' );
	
	\php_error\reportErrors();}


 	
//Get URL
	if(empty($_GET['url']))
{
		$route=array(App::Config('DefaultController'));
}

	else
{
		$route=explode('/',rtrim($_GET['url'],'/'));
}

	$file='controller/'.ucfirst($route[0]).'Controller.php';
	
	if(file_exists($file))
{
	$values=array();
	
	require $file;
	
	$controller= ucfirst($route[0])."Controller";
	
	if(count($route)==1)
{
		
	$method=strtolower(App::Config('DefaultMethod'));
		
} 
	
	else
{	

	$method=strtolower($route[1]);

}
	if(!method_exists($controller,$method))
{
		
	Error::index();return false;
		
}
	$url_params="";

	if(count($route)>=3)
{
				
	for($i=0;$i<=count($route)-3;$i++)

{
	
	$values[]=$route[$i+2];
	
	$url_params=$url_params.$route[$i+2]."/";
	
}
}
			
	else
{
	
		$values=null;$url_params=null;
		
}	
	
	Redirect::url($route[0],$method,$url_params);
	
	$controller=new $controller;
	
	$controller->$method($values);	

	
}
else 
{

		Error::index();
}



