<?php 
get_header(); 
if(!have_posts()){
	 echo __('May be searching will help.','rb');
}else{
	rewind_posts();
	get_template_part('loop','archive');
}
get_footer(); 
?> 
