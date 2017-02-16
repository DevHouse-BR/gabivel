<?php 
/**
 * Template Name: Page Index Clean
 */
get_header();
get_footer(); 
?>
<script type="text/javascript">

$(document).ready(function() {
	
	var homeInterval = setInterval(function(){
		
		if((typeof(ytplayer) != "undefined") && (activePlayer == "none")){
			$('#logo a').click();
			clearInterval(homeInterval);
		}
		
	}, 2000);
	
});

</script>