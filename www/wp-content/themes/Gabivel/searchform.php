<?php  $searchQuery = get_search_query(); ?>
<div id="searchformwrapper">
<form id="searchform" action="#!" method="get" onsubmit="window.location='<?php echo home_url(); ?>/?s='+$('.searchbox').val(); return false; ">
	<a href="javascript:void(0)" class="searchbutton" onclick="$('#searchform').submit();"><?php _e('Search','rb'); ?></a>
	<input class="searchbox" type="text" name="s" onfocus="if(this.value=='<?php _e('SEARCH','rb'); ?>'){this.value='';}" onblur="if(this.value==''){this.value='<?php _e('SEARCH','rb'); ?>';}" value="<?php if(empty($searchQuery)){echo _e('SEARCH','rb');}else{ the_search_query();} ?>" size="25" maxlength="25" />
</form>
<div class="clearfix"></div>
</div>


