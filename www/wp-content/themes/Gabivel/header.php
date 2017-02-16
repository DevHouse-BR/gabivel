<?php
//preview settings
$tmpurl = get_template_directory_uri();
wp_enqueue_style("", "/wp-content/plugins/jetpack/modules/contact-form/css/grunion.css?ver=2.3.5");
if(opt('contentFont','')!='')
	wp_enqueue_style('contentFont', opt('contentFontFull',''), false, null, 'all');
if(opt('headerFont','')!='')
	wp_enqueue_style('headerFont', opt('headerFontFull',''), false, null, 'all');
?>

<?php
		global $pageTitle;
		$pageTitle = '';
				if(is_search()) {
					 if(have_posts()){
						$pageTitle .= __('Results for ','rb').'"'.get_search_query();
					}else{ 
						$pageTitle .= __('Not found for ','rb').'"'.get_search_query();
					}
				}elseif(is_page()){
					if(have_posts()){
						$pageTitle .= get_the_title();
					}else{
						$pageTitle .= __('Page request could not be found.','rb');
					}
				}elseif(is_tag()){
					if(have_posts()){
						$pageTitle .= __('Tag, ','rb').single_tag_title('',false);
					 }else{ 
						$pageTitle .= __('Page request could not be found.','rb');
					 }
				
				}elseif(is_category()){
					if(have_posts()){
						$pageTitle .= __('Category, ','rb').single_tag_title('',false);
					}else{
						$pageTitle .= __('Page request could not be found.','rb');
					}
				
				}elseif(is_archive()){
					if(have_posts()){
						$pageTitle .='';
						if(is_day())
							$pageTitle .= __('Daily Archives, ','rb').get_the_date();
						elseif(is_month())
							$pageTitle .= __('Monthly Archives, ','rb').get_the_date('F Y');
						elseif(is_year())
							$pageTitle .= __('Yearly Archives, ','rb').get_the_date('Y');
						else
							$pageTitle .= __('Blog Archives','rb');
						$pageTitle .= '';
					}else{
						$pageTitle .= __('Page request could not be found.','rb');
					}
				}elseif(is_404()){
						$pageTitle .= __('You may find your requested page by searching.','rb');
				}else{
					$pageTitle .= get_the_title(); 
				}
	
	global $pageDescription;
	if(have_posts() && is_single() OR is_page())
	{
		while(have_posts())
		{
			the_post();
			$out_excerpt = str_replace(array("\r\n", "\r", "\n"), "", get_the_excerpt());
			$pageDescription = apply_filters('the_excerpt_rss', $out_excerpt);
		}
	}elseif(is_category() OR is_tag()){
	if(is_category())
		$pageDescription = "Posts related to Category:".ucfirst(single_cat_title("", FALSE));
	elseif(is_tag())
		$pageDescription = "Posts related to Tag:".ucfirst(single_tag_title("", FALSE));
	}
	
	if(@$_GET['info']=='description'){
		echo $pageDescription;
		exit;
	}elseif(@$_GET['info']=='title'){
		wp_title( '|', true, 'right' );
		exit;
	}
?>

<?php if(!@$_GET['info']=='page'){ ?>
<!DOCTYPE html>
<html>
<head <?php language_attributes(); ?>>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php if(isset($_GET['_escaped_fragment_']) && !empty($_GET['_escaped_fragment_'])){
			echo get_ajax_content($_GET['_escaped_fragment_'], 'title');
		}else{
			wp_title( '|', true, 'right' );
		} ?>
</title>
<meta name="fragment" content="!">
<meta name="description" content="<?php if(isset($_GET['_escaped_fragment_']) && !empty($_GET['_escaped_fragment_'])){
		echo get_ajax_content($_GET['_escaped_fragment_'], 'description');
	}else{ ?><?php bloginfo('description'); ?>
<?php } ?>" />
<?php wp_head(); ?>
<?php
$favicon = trim(opt('favicon',''));
if(!empty($favicon)){
if(strpos($favicon,'http')===false)
	$favicon = $tmpurl.'/'.$favicon;
?>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $favicon; ?>">
<?php } ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if gte IE 8]>
<script src="<?php echo $tmpurl; ?>/js/html5shiv.js"></script>
<![endif]-->
<?php 
$analyticsCode = opt('googlecode','');

if(!empty($analyticsCode))
{
?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo trim($analyticsCode); ?>']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<?php } ?>

<script type='text/javascript'>
var themeURL = '<?php echo $tmpurl;?>';

var ghostModeEnable = <?php eopt('ghostMode','true'); ?>; // if true ghost mode active
var ghostModeText = <?php eopt('ghostModeText','false'); ?>; // if true ghost mode active text will show
var historyApiEnable = <?php eopt('historyApiEnable','true'); ?>; // if true htlm5 history api will use
var menuAlwaysOpen = <?php eopt('menuAlwaysOpen','false'); ?>; // if true menu always open
var menuAlwaysOpenMobile = <?php eopt('menuAlwaysOpenMobile','true'); ?>; // if true menu always open on mobile
var ghostModeTime = <?php eopt('ghostModeTime','5000'); ?>; // Gabivel mode wait time before to activate (ms)
var bgTime = <?php eopt('bgAniTime','6000'); ?>; // Background Image/Video animation display duration (ms)
var bgPaused = <?php eopt('bgPaused','false'); ?>; // Background Image/Video animation paused
var menuTime = <?php eopt('menuDelay','500'); ?>; // menu delay (ms)
var autoPlay = <?php eopt('autoPlay','true'); ?>; // Background audio autoplay
var loop = <?php eopt('loop','false'); ?>; // Background audio loop or next song
var videoSkipMobile = <?php eopt('videoSkipMobile','true'); ?>; // if true background videos skips on mobile
var NormalFade = <?php eopt('bgNormalFade','false'); ?>; // Normal fade or animated bg image
var videoLoop = <?php eopt('videoLoop','true'); ?>; // if true video will be play again when end of the video.
var muteWhilePlayVideo = <?php eopt('muteWhilePlayVideo','true'); ?>; // if true video mute while playing video
//var btnSoundUrlMp3 = '<?php eopt('btnSoundURLMp3',''); ?>'; // Button Hover Sound
//var btnSoundUrlOgg = '<?php eopt('btnSoundURLOgg',''); ?>'; // Button Hover Sound
var videoMuted = <?php eopt('videoMuted','false'); ?>; // if true video start mute
var loopBg = <?php eopt('loopBg','true'); ?>; // if true backgroud item loop when end of the array
var bgPatternV = '<?php eopt('bgPattern','block');?>'; // if block pattern visible, if none pattern hide
var videoPaused = <?php eopt('videoPaused','false');?>; // if true video doesn't start
var bgStretch = <?php eopt('mediaStretch','true');?>; // if true bg stretch
var defaultTitle = '<?php wp_title( '|', true, 'right' ); ?>'; // Default page title as string
var defaultURL = '<?php echo home_url(); ?>';  // Default page url as string
var twitterEnable = <?php eopt('twitterEnable','false');?>; // if true twitter data loaded by ajax
var twitterUser = '<?php eopt('twitterUser',''); ?>'; // enter your twitter name as string
var twitterCount = '<?php eopt('twitterCount','5'); ?>'; // count of tweets
var frontPage = '<?php eopt('useFrontPage','false'); ?>';
</script>
</head>
<body <?php body_class(); ?>>
<?php 
global $demo;
if($demo){ ?>
<!-- BEGIN: DEMO Picker -->
<div id="palette">
	<div id="paletteHeader">
		<div id="colorResult">#89c8cb</div>
		<a href="javascript:void(0);" class="closeButton"></a>
		<a href="javascript:void(0);" class="openButton"></a>
	</div>
	<div id="paletteBody">
		<div id="colorPicker"></div>
		<canvas id="colorPalette" width="150" height="150"></canvas>
	</div>
	<div id="ThemeSwitch">
		<a class="themeBtn light" href="javascript:void(0)" onclick="changeTheme('light')">LIGHT</a>
		<a class="themeBtn dark selected" href="javascript:void(0)" onclick="changeTheme('dark')">DARK</a>
	</div>
</div>
<script type="text/javascript">var themeURL = '<?php echo $tmpurl; ?>';</script>
<script type='text/javascript' src='<?php echo $tmpurl; ?>/js/demo.js'></script>
<script type="text/javascript">DrawPicker('colorPalette');</script>
<!-- BEGIN: DEMO Picker -->
<?php } ?>

<!-- BEGIN: Body Wrapper -->
<div id="body-wrapper">

	<!-- BEGIN: Main Menu -->
	<header id="menu-container">
		<nav id="mainmenuleft" class="mainmenu">
			<?php 
			wp_nav_menu( array('container_class' => 'menu-header', 'theme_location' => 'leftmenu', 'walker' => new My_Walker(), 'show_home' => true ) ); 
			?>
		</nav>
		<nav id="mainmenuright" class="mainmenu">
		<?php 
			wp_nav_menu( array('container_class' => 'menu-header', 'theme_location' => 'rightmenu', 'walker' => new My_Walker(), 'show_home' => true ) ); 
		?>
		</nav>
		<!-- BEGIN: Logo -->
		<div id="logo">
			<?php 
			$logoURL = opt('logo','');
			if( !empty($logoURL) && !$demo){
				if(strpos($logoURL,'http')===false)
				$logoURL = $tmpurl.'/'.$logoURL;
			?>
			<!--a href="<?php bloginfo('url'); ?>/home"><img src="<?php echo $logoURL; ?>" title="<?php bloginfo('name'); ?>" border="0"/></a-->
			<a href="<?php bloginfo('url'); ?>/?page_id=762"><img src="<?php echo $logoURL; ?>" title="<?php bloginfo('name'); ?>" border="0"/></a>
			<?php }else{ ?>
			<span id="demologo"></span>
			<?php } ?>
		</div>
		<!--END: Logo -->
	</header>
	<!-- END: Main Menu -->

	<!-- BEGIN: Main Elements; Please don't change these elements -->
	<div id="bgImage"><div id="bgImageWrapper"></div></div>
	<div id="bgPattern"></div>
	<div id="videoExpander"></div>
	<div id="bgText">
		<div class="headerText"></div>
		<div style="clear:both"></div>
		<div class="subText"></div>
		<div style="clear:both"></div>
	</div>
	<div id="contentLoading">
		<div id="canvasloader-container"></div>
		<div id="loading-text"><?php _e('Loading', 'rb'); ?></div>
	</div>	
	<div id="content">
		<div id="contentBox">
			<section id="contentBoxContainer">
			<?php
			if(isset($_GET['_escaped_fragment_']) && !empty($_GET['_escaped_fragment_'])){
				echo get_ajax_content($_GET['_escaped_fragment_'], 'page');
			}
			?>
<?php } ?>