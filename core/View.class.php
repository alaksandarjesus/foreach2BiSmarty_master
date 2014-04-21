<?php 

class View {
	
	public static function render($page,$smartyvar=null){
		$smarty = new Smarty;
		foreach (App::getsmartyvar() as $key=>$value){
		
			$smarty->$key=$value;
		
		}

		if(App::Config('use_page_class')){$smarty->assign("page",App::page($page));}

		if(isset($_SESSION['with'])){$smartyvar['with']=$_SESSION['with'];unset ($_SESSION['with']);}
		
		if($smartyvar){
			
							foreach($smartyvar as $key=>$variable){
								if(!is_array($variable)){$smarty->assign($key,$variable);}
								else{
										foreach($variable as $arraykey=>$arrayvar){
											$smarty->assign($arraykey,$arrayvar);
										
										}
									
									}
						
						}
					
						}
		$smarty->display($page.'.html');
		}	
	
		
	
	
	}
