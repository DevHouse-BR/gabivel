<?php
get_header();
if(have_posts())
{
	if(have_posts())
	{
		the_post();
		$postID	= get_the_ID();
		$content = get_the_content();
        $content = apply_filters('the_content', $content);
		$title = get_the_title();
		$imgW = $imageW = 570;
		$imgH = $imageH = 0;
	}
}

$useInDetail = get_post_meta($postID, "useInDetail", true);
$sidebarDefault = opt('sidebarsingledefault', '');
$sidebarPos = get_post_meta($postID, "sidebarPos", true);
if($sidebarPos=='' || $sidebarPos=='Default') $sidebarPos = $sidebarDefault;

?>
<h1 class="caption"><?php the_title(); ?></h1>

<!-- BEGIN: single -->
<div class="<?php echo ($sidebarPos!='None')?'content-with-sidebar':'content-full-width'; ?>" <?php 
		if($sidebarPos!='None'){
			if($sidebarPos=='Left') echo 'style="float:right"';
			else if($sidebarPos=='Right') echo 'style="float:left"';
		} 
		?>>
	<div id="left-col" class="<?php echo ($sidebarPos!='None')?'left-col-with-sidebar':'page-content'; ?>">
	<div class="divider"></div>
		<?php
		$mediaDetail = get_blog_media(get_the_ID(), 'detail');
		if($useInDetail=='use' && !empty($mediaDetail)){ echo $mediaDetail; }else{ ?>
	
		<?php } ?>
		<div class="sh_1of4" >
			<?php 
			$blogformat = strtolower( get_post_format($postID) );
			if($blogformat == 'standart' || $blogformat == '') 	$blogformat = 'standart';
	
			$blogmeta = '';
			$blogmeta .= '<div class="blogcontent" style="'. (($blogformat!='aside')?' margin-top:16px; ':' margin-top:0px; '). ' margin-bottom:15px;">'; // Begin blog content
			$blogmeta .= '<div class="blogdatemeta">'; // Begin blog meta
			$blogmeta .= get_blog_meta($postID, 'posted, category, tag, comments','detail'); 		
			$blogmeta .= '<div class="clearfix"></div>'; 
			$blogmeta .= '</div>'; // End Blog Meta
			$blogmeta .= '<div class="clearfix"></div>'; 
			$blogmeta .= '</div>'; // End Blog Content
			echo $blogmeta;
			?>
		</div>
		<div class="<?php echo ($sidebarPos!='None')?'sh_2of4':'sh_3of4';?> column_end">
		
			<p><?php $more=1; the_content(''); ?></p>
			
			
		
			<div class="clearfix"></div>
			<div class="sh_divider"></div>
			<?php comments_template( '', true ); ?>
		</div>
	</div> <!-- end of left-col -->
</div>
<!-- END: single -->
<?php if($sidebarPos!='None') get_sidebar(); ?>
<div class="clearfix"></div>

<?php 
get_footer();
?>