<?php 
get_header();
	if(have_posts() && opt('useFrontPage','false')=='true')
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
	?>
		<h1 class="caption"><?php echo $pageTitle; ?></h1>
		<div class="<?php echo ($sidebarPos!='None')?'content-with-sidebar':'content-full-width'; ?>" <?php 
			if($sidebarPos!='None'){
				if($sidebarPos=='Left') echo 'style="float:right"';
				else if($sidebarPos=='Right') echo 'style="float:left"';
			} 
			?>>
			<div id="left-col" class="<?php echo ($sidebarPos!='None')?'left-col-with-sidebar':'page-content'; ?>">
				<?php echo $content; ?>
			</div>
		</div>
		<?php if($sidebarPos!='None') get_sidebar(); ?>
		<div class="clearfix"></div>
	<?php
	}
	?>
<?php get_footer(); ?>