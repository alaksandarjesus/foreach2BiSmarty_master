<?php return array(

/*This forces Smarty to (re)compile templates on every invocation. 
This setting overrides $compile_check. By default this is FALSE. 
This is handy for development and debugging. It should never be used in a production environment. */

'force_compile'=>false,

/*Set $debugging to TRUE in Smarty, and if needed set $debug_tpl to the template resource path to debug.tpl (this is in SMARTY_DIR by default). 
When you load the page, a Javascript console window will pop up and give you the names of all the 
included templates and assigned variables for the current page.*/

'debugging'=>false,

/*This tells Smarty whether or not to cache the output of the templates to the $cache_dir. 
By default this is set to 0 ie disabled. 
If your templates generate redundant content, it is advisable to turn on $caching, 
as this will result in significant performance gains.*/


/*Note : While loading dynamic contents example: List of users in database, List of products use {nocache}{/nocache}*/

'caching'=>true,

'cache_lifetime'=>3600,



















);