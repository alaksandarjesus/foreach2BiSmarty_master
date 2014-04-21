<?php return array(


/*	Debugging Error Mode should be set true only on development mode
 	WARNING! It is downright _DANGEROUS_ to use this in production, on a live website. It should *ONLY* be used for development.
	PHP Error will kill your environment at will, clear the output buffers, and allows HTML injection from exceptions. 
 	In future versions it plans to do far more then that.
	If you use it in development, awesome! If you use it in production, you're an idiot.
  	Refer : http://www.phperror.net/
  	Avoid <meta charset="utf-8"> for better performance of the error class in development mode.
*/ 


'debug'=>true,

//Specify default controller
'DefaultController'=>'',

//Specify default function
'DefaultMethod'=>'',

//Specify URL.
//Dont forget to add a backslash at the end.
'url' =>'',


//Set default timezone.
//Use App::createdon() to display time

'timezone' =>'',

//Use Keygenerator.php from the root folder. or 
//Any algorithm to generate your own 32 string length key. Use Only alphanumerics.
'key'=>"",

'use_page_class'=>false,





















);
