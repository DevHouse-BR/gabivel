<?php 
global $more, $blogparams, $paged, $pageTitle, $pageTitleFull;
$dataformat ='dMY';
$metaformat = 'posted, category, comments, tag';

$sidebarPos = opt('sidebardefault', '');
?>
	<div class="<?php echo ($sidebarPos!='None')?'content-with-sidebar':'content-full-width'; ?>" <?php 
		if($sidebarPos!='None'){
			if($sidebarPos=='Left') echo 'style="float:right"';
			else if($sidebarPos=='Right') echo 'style="float:left"';
		} 
		?>>
	
	<div id="left-col" class="<?php echo ($sidebarPos!='None')?'left-col-with-sidebar':'page-content'; ?>">
<?php
	while(have_posts())
	{
		the_post();
		$blogformat = strtolower( get_post_format(get_the_ID()) );
		if($blogformat == 'standart' || $blogformat == '') 	$blogformat = 'standart';
		
		$blogClass = '';
		$blogClassArr = get_post_class(array('blogitem'), get_the_ID());
		foreach($blogClassArr as $blogClassArrItem)
			$blogClass.=$blogClassArrItem.' ';
		$re .= '<article id="post-'.get_the_ID().'" class="'.$blogClass.'">'; // // Begin blog item wrapper
		
		$re .= '<div class="blogcontent" >'; // Begin blog content
		$re .= '<div class="blogdatemeta">'; // Begin blog meta
		$re .= get_blog_meta(get_the_ID(), $metaformat);
		$re .= '<div class="clearfix"></div>';  		
		$re .= '</div>'; // End Blog Meta
		$re .= '<div class="clearfix"></div>'; 
		$re .= '</div>'; // End Blog Content
		
		
		if($blogformat!='aside'){
			$re .= '<div class="blogimage">'; // Begin Blog Image
			$re .= get_blog_media(get_the_ID(), 'list');
			$re .= '</div>'; //End Blog Image
		}
		
		
			
		$re .= '<div class="blogtext '.(($blogformat=='aside')?'blogtextlong':'').'" >'; // Begin Blog Text
		$more=1; 
		$re.= '<p>'.substr(strip_tags(preg_replace('|[[\/\!]*?[^\[\]]*?]|si', '', get_the_content())), 0, 600).'...'.'</p>';
		$re .= '</div>'; //End Blog Text
		
		$re .= '<hr class="seperator" style="margin-top:80px" />
		<div class="clearfix"></div>
		</article>'; // End Blog Item
	}
	
	if(function_exists('wp_pagenavi'))
	$re .= wp_pagenavi( array('options' => array('return_string' => true) ));
	$re.='
	<div class="divider" style="height:10px"></div>
	<div class="clearfix"></div>';
	echo $re;
?>
		</div>
	</div>
<?php if($sidebarPos!='None') get_sidebar(); ?>
<div class="clearfix"></div>