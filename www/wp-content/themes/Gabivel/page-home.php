<?php 
/**
 * Template Name: Page Home
 */
get_header();
	if(have_posts())
	{
		have_posts();
		the_post();
		$postID	= get_the_ID();
		
		$sidebarDefault = opt('sidebardefault', '');
		global $sidebarPos;
		$sidebarPos = get_post_meta($postID, "sidebarPos", true);
		if($sidebarPos=='' || $sidebarPos=='Default') $sidebarPos = $sidebarDefault;
		
		$content = get_the_content();
		$content = apply_filters('the_content', $content);
		$title = get_the_title();
	}
	?>
	<div class="content-full-width" <?php 
		if($sidebarPos!='None'){
			if($sidebarPos=='Left') echo 'style="float:right"';
			else if($sidebarPos=='Right') echo 'style="float:left"';
		} 
		?>>
		<div id="left-col" class="<?php echo ($sidebarPos!='None')?'left-col-with-sidebar':'page-content'; ?>">
			<?php echo $content; ?>
		</div>
	</div>
	<?php if($sidebarPos!='None') //get_sidebar(); ?>
	<div class="clearfix"></div>
<?php get_footer(); ?>
