<?php if(!@$_GET['info']=='page'){ ?>
			</section>
		</div>
	</div>
	<div id="contentBoxScroll">
		<a id="closeButton" href="#!//"></a>
		<div class="dragcontainer">
			<div id="contentBoxScrollDragger" class="dragger"></div>
		</div>
	</div>
	<!-- END: Main Elements -->
	<!-- BEGIN: Bottom Side Bar -->
	<ul id="bgImages">		
		<?php
			$fpgalleryid = get_option('fpgalleryid');
			if(!empty($fpgalleryid)){
				$result = $wpdb->get_results("SELECT IMAGEID, TYPE, CONTENT, THUMB, CAPTION, DESCRIPTION, WIDTH, HEIGHT FROM {$wpdb->prefix}backgrounds WHERE GALLERYID='$fpgalleryid' ORDER BY SLIDERORDER");
				foreach($result as $row)
				{
					echo "<li>\n";
									
					if($row->TYPE=='image')
						echo '<a href="'.$row->CONTENT.'" alt="'.$row->CAPTION.'" />';
					elseif($row->TYPE=='vimeo')
						echo '<a href="http://vimeo.com/'.$row->CONTENT.'?width='.$row->WIDTH.'&height='.$row->HEIGHT.'" >';
					elseif($row->TYPE=='youtube')
						echo '<a href="http://youtu.be/'.$row->CONTENT.'?width='.$row->WIDTH.'&height='.$row->HEIGHT.'" >';
					else
						echo '<a href="'.$row->CONTENT.'?width='.$row->WIDTH.'&height='.$row->HEIGHT.'" >';
						
					echo '<img class="thumb" src="'.get_template_directory_uri().'/includes/timthumb.php?src='.$row->THUMB.'&w=120&h=80&zc=1&q=100" alt="'.$row->CAPTION.'" />'."\n";
					
					echo '</a>';
					
					if(!empty($row->CAPTION))
						echo '<h3>'.stripslashes($row->CAPTION).'</h3>'."\n";
						
					if(!empty($row->DESCRIPTION))
						echo '<p>'.stripslashes($row->DESCRIPTION).'</p>'."\n";
					
					echo "</li>\n";
				}
			}
		?>	
	</ul>
	<!-- END: Bottom Side Bar -->
	
	
	<div style="display: none;" id="itemNumbers">
		<div id="totalItemCount"></div>
		<canvas id="timecircle" width="50" height="50"></canvas>
		<div id="currentItemNo"></div>
	</div>
	
	
	<!-- BEGIN: Controller Buttons -->
	<a class="btnCtrl prevBG" href="javascript:void(0);" onclick="prevBg()"></a>
	<a class="btnCtrl nextBG" href="javascript:void(0);" onclick="nextBg()"></a>
	<a class="btnCtrl fitCenterBG" href="javascript:void(0);" onclick="setFit()"></a>
	<a class="btnCtrl fullCenterBG" href="javascript:void(0);" onclick="setFull()"></a>
	<div style="display: none;" id="topRight">
		<a class="tlCtrl setFullScrnBG" href="javascript:void(0);" onclick="setFullScrn()"></a>
		<a class="tlCtrl closeFullScrnBG" href="javascript:void(0);" onclick="closeFullScrn()"></a>
		
		<a class="tlCtrl fullBG" href="javascript:void(0);" onclick="setFit()"></a> 
		<a class="tlCtrl fitBG" href="javascript:void(0);" onclick="setMin()"></a>
		
		<a class="tlCtrl soundiconBG" href="javascript:void(0);" onclick="videoMute()"></a>
		<a class="tlCtrl soundmuteBG" href="javascript:void(0);" onclick="videoUnMute()"></a>
		
		<a class="tlCtrl soundplaylist" href="javascript:void(0);" ></a>
		
		<a class="tlCtrl infoBG" href="javascript:void(0);" onclick="setInfo()"></a>
	</div>	
	<!-- END: Controller Buttons -->
	
	<!-- BEGIN: Please don't remove these elements -->
	<div id="fullControl"></div>
	<a href="javascript:void(0);" id="thumbOpener"></a>
	<!-- END -->
	
	<footer id="bottomleft">
		<div class="btnBL videoBL">
			<a class="mBL mOpener" href="javascript:void(0);"></a>
			<a class="mBL soundiconVideo" href="javascript:void(0);" onclick="videoMute()"></a>
			<a class="mBL soundmuteVideo" href="javascript:void(0);" onclick="videoUnMute()"></a>
			<a class="mBL pauseVideoBL" href="javascript:void(0);" onclick="pauseBgVideo();"></a>
			<a class="mBL playVideoBL" href="javascript:void(0);" onclick="playBgVideo();"></a>
		</div>
		<?php $url = str_replace('/#!','', home_url()); ?>
		<div class="btnBL shareBL">
			<a class="mBL mOpener" href="javascript:void(0);"></a>
			<a class="mBL shareFb"  target="_blank" rel="http://www.facebook.com/sharer.php?u=%%url%%" href="http://www.facebook.com/sharer.php?u=http:<?php echo $url;?>" ></a>
			<a class="mBL shareTwt" target="_blank" rel="http://twitter.com/home?status=<?php _e('Check out this Awesome Site - ','rb'); ?>%%url%%" href="http://twitter.com/home?status=<?php _e('Check out this Awesome Site - ','rb'); ?><?php echo $url;?>"></a>
			<a class="mBL shareRss" target="_blank" href="<?php echo $url;?>?feed=rss"></a>
		</div>
		<div class="btnBL twtBL">
			<a class="mBL mOpener" href="javascript:void(0);"></a>
			<ul class="twtList">
				<li class="twtLoading"><?php _e('Tweets are loading...','rb'); ?></li>
			</ul>
		</div>
		<?php if(opt('copyrighttext','')!=''){ ?>
		<div class="btnBL footerText">
			<span><?php echo do_shortcode(stripslashes(opt('copyrighttext',''))); ?></span>
		</div>
		<?php } ?>
	</footer>
	
</div>
<!-- END: Body Wrapper -->


<!-- BEGIN: Music Player -->
	<div id="playWrapper">
		<!-- BEGIN: Audio Player; Please don't remove these elements -->
		<div id="player">
			<div id="playerSongName"></div>
			<div id="playerController">
				<a href="javascript:void(0);" class="playerBtn stop"></a>
				<a href="javascript:void(0);" class="playerBtn play"></a>
				<a href="javascript:void(0);" class="playerBtn pause"></a>
				<a href="javascript:void(0);" class="playerBtn loop"></a>
				<a href="javascript:void(0);" class="playerBtn nextsong"></a>
				<div id="playerLoadBar">
					<div id="playerBar">
						<div id="playerBarActive"></div>
					</div>
				</div>
				<div id="playerSongDuration"><span class="current"></span><span class="total"></span></div>
				<a href="javascript:void(0);" class="playerBtn mute"></a>
				<a href="javascript:void(0);" class="playerBtn unmute"></a>
				<div id="volumeLoadBar">
					<div id="volumeBar">
						<div id="volumeBarActive"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<!-- END: Audio Player -->
		
		
		<!-- BEGIN: Audio List -->
		<div id="audioList">
			<ul>
			<?php
				$audioList = get_option("audioList");
				$listHTML = '';
				if(!empty($audioList))
				{
					$audioJSON = json_decode($audioList);
					for($i=0; $i<sizeof($audioJSON); $i++)
						echo '<li data-mp3="'.htmlentities(stripslashes($audioJSON[$i]->mp3),ENT_QUOTES, "UTF-8").'" data-ogg="'.htmlentities(stripslashes($audioJSON[$i]->ogg),ENT_QUOTES, "UTF-8").'">'.htmlentities(stripslashes($audioJSON[$i]->name),ENT_QUOTES, "UTF-8")."</li>\n";
				}
				?>
			</ul>
		</div>
		<!-- END: Audio List -->
	</div>
<!-- END: Music Player -->

<!-- BEGIN: First Loading; Please don't remove this element -->
<div id="bodyLoading">
	<div id="loading">
		<!-- You can change loading logo  -->
		<?php 
		$llogoURL = opt('loading_logo_url','');
		if(strpos($llogoURL,'http')===false)
			$llogoURL = get_template_directory_uri().'/'.$llogoURL;
		?>
		<img src="<?php echo $llogoURL; ?>" title="<?php bloginfo('name'); ?>" border="0"/>
	</div>
</div>
<!-- END: First Loading -->

<!-- BEGIN: Please don't remove or change these elements -->
<div id="REF_ColorFirst"></div>
<div id="REF_ColorSecond"></div>
<!-- END:  -->
<?php wp_footer();?>
</body>
</html>
<?php } ?>