<?php 

$search_refer = $_GET["post_type"];

if ($search_refer == 'carro') {
    load_template(TEMPLATEPATH . '/page-carros.php'); 
}
else{
    get_header();
    if(!have_posts()){
        echo __('No results were found for your keywords. Please try again with another keyword.','rb');
     }else{ 
        get_template_part('loop','search');
    }
    get_footer(); 
}
?>
