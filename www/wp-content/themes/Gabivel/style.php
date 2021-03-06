<?php 
//Setup location of WordPress
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];

$ie8 = false;
if(preg_match('/(?i)msie [1-8]/',$_SERVER['HTTP_USER_AGENT']))  $ie8 = true;


//Access WordPress
require_once( $path_to_wp.'/wp-load.php' );

header ("Content-Type:text/css"); 

function rgbcolor($hexcolor){
	$rc = substr($hexcolor,0,2);
	$gc = substr($hexcolor,2,2);
	$bc = substr($hexcolor,4,2);
	return hexdec($rc).', '.hexdec($gc).', '.hexdec($bc);
}

if(!$demo){

$ThemePrefix = opt('theme_style','');
$ColorFirst = '#'.opt('colorFirst','');
$ColorInverse = '#'.opt('ColorInverse','FFFFFF');
$ColorFirstAlpha = 'rgba('.rgbcolor(opt('colorFirst','')).', 0.7)';
$ColorThemeBgAlpha = 'rgba(0, 0, 0, 0.7)';
if($ie8){
	$ColorFirstAlpha = 'rgb('.rgbcolor(opt('colorFirst','')).')';
	$ColorThemeBgAlpha = 'rgb(0, 0, 0)';
}
$ColorLines = '#999999';
if($ThemePrefix=='light'){
	if($ie8)
		$ColorThemeBgAlpha = 'rgba(255, 255, 255)';
	else	
		$ColorThemeBgAlpha = 'rgba(255, 255, 255, 0.7)';
	$ColorLines = '#333333';
}
$NormalFont = "'".opt('contentFont','')."', sans-serif";
$HeaderFont = "'".opt('headerFont','')."', sans-serif";
$ColorSecond = '#'.opt('colorSecond','');
$BackgroundColor = '#'.opt('colorBackground','');
$TextColor = '#'.opt('colorFont','');
$imagesDir = "images/";

}else{

echo '@ImagesDir: "images/";'."\n";
	$imagesDir = '@{ImagesDir}';

echo '@ColorFirst : '. "#".opt('colorFirst','').";\n";
	$ColorFirst = '@ColorFirst';
echo '@ColorFirstAlpha : rgba('.rgbcolor(opt('colorFirst','')).', .7);'."\n";
	$ColorFirstAlpha = '@ColorFirstAlpha';
echo '@ColorThemeBgAlpha : rgba(0, 0, 0, .7);'."\n";
	$ColorThemeBgAlpha = '@ColorThemeBgAlpha';
echo '@ColorSecond : '. "#".opt('colorSecond','').";\n";
	$ColorSecond = '@ColorSecond';
echo '@TextColor : '. "#".opt('colorFont','').";\n";
	$TextColor = '@TextColor';
echo '@BackgroundColor : '. "#".opt('colorBackground','').";\n";
	$BackgroundColor = '@BackgroundColor';

echo '@ThemePrefix : "'. opt('theme_style','')."\";\n";
$ThemePrefix = '@{ThemePrefix}';
	
$NormalFont = "'".opt('contentFont','')."', sans-serif";
$HeaderFont = "'".opt('headerFont','')."', sans-serif";

}
?>
/*
Theme Name: Gabivel Theme
Theme URI: http://www.renklibeyaz.com/ghostwp/
Description: Gabivel Theme WordPress
Author: RenkliBeyaz - Salih Ozovali
Version: 1.0
*/

/* REF: Please Dont Change this styles */
#REF_ColorFirst{color:<?php echo $ColorFirst; ?>; background-color:<?php echo $ColorFirst; ?>; display:none; }
#REF_ColorSecond{color:<?php echo $ColorSecond; ?>; background-color:<?php echo $ColorSecond; ?>; display:none; }
/*REF*/


/******** CSS Start ********/

#contentLoading{
	background-color:<?php echo $ColorThemeBgAlpha; ?>;
	position:absolute;
	padding:20px;
	box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.3);
	display:none;
}

#canvasloader-container{ display:inline-block; vertical-align:middle; }
#loading-text{ display:inline-block; vertical-align:middle; margin-left:20px;}

/*Body Loading*/
#bodyLoading{
	width:100%;
	position:absolute;
	left:0;
	top:0;
	text-align:center;
}
#loading{
	margin:100px auto 0px auto;
	text-align:center;
}
/* General */
* {
	-webkit-user-drag: none;
	margin:0px;
	padding:0px;
	border:none;
	outline:none;
	font-size:<?php eopt('contentFontSize','12');?>px;
	line-height:1.4em;
	color: <?php echo $TextColor; ?>;
	font-family: <?php echo $NormalFont; ?>;
}
* html .clearfix {
	height: 1%; /* IE5-6 */
	}
*+html .clearfix {
	display: inline-block; /* IE7not8 */
	}
.clearfix:after { /* FF, IE8, O, S, etc. */
	content: ".";
	display: block;
	height: 0;
	clear: both;
	visibility: hidden;
	}
::selection {
        background: <?php echo $ColorFirst; ?>; /* Safari */
		color: <?php echo $ColorSecond; ?>;  
        }
::-moz-selection {
        background: <?php echo $ColorFirst; ?>; /* Firefox */
		color: <?php echo $ColorSecond; ?>;  
}
a{
	-moz-transition: all 0.3s ease-in-out 0s;
	transition: all 0.3s ease-in-out;
	-webkit-transition: all 0.3s ease-in-out;
	-o-transition: all 0.3s ease-in-out;
}
a:link, a:visited{
	text-decoration:none;
	color: <?php echo $TextColor; ?>;
}
a:hover, a:active{
	text-decoration:none;
}
body{
	background: <?php echo $BackgroundColor; ?>;
	overflow:hidden;
}
html {
	overflow:hidden;
	background: <?php echo $BackgroundColor; ?>;
}

#fullControl{
	opacity:0;
	position:absolute;
	right:10px;
	top:100px;
}

#body-wrapper{
	width:100%;
	background-color: <?php echo $BackgroundColor; ?>;
	text-align:center;
	overflow:hidden;
	position:relative;
	opacity:0;
}
#content{
	opacity:0;
	display:none;
	position:absolute;
	overflow:hidden;
	width:940px;
	left:0px;
	top:127px;
	padding:20px;
	background: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-content-bg.png');
	box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.3);
}
#contentBox{
	position:relative;
	overflow:hidden;
	text-align:left;
	width:940px;
}
#contentBoxScroll{
	top:120px;
	position:absolute;
	display:none;
	text-align:left;
	width:20px;
	background: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-content-scroll-bg.png');
	box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.3);
}
#contentBoxContainer{
	position:relative;
}
.dragcontainer{
	position:relative;
	height:500px;
	margin-top:20px;
	background: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-scroll-bg.png') repeat-y center center;
}
.dragger{
	position:absolute;
	left:5px;
	width:10px;
	height:20px;
	background-color:<?php echo $ColorFirst; ?>;
	cursor:pointer;
}
#closeButton:link, #closeButton:visited{
	display:block;
	width:20px;
	height:20px;
	background-image:url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-pageClose.png');
}
#closeButton:hover, #closeButton:active{
	background-position:0 20px;
	background-color:<?php echo $ColorFirstAlpha; ?>;
}
#bgImages{
	display:none;
	opacity:0;
	list-style:none;
	position:absolute;
	left:0px;
	bottom:-83px;
	height:92px;
	background: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-bgImages.png');
	margin:0;
	padding:0; 
}
#bgImages li{
	position:relative;
	margin:0;
	float:left;
	padding:0px;
}
#bgImages li a{ display: block; margin:0; padding:0; }
#bgImages img.thumb{
	height:80px;
	margin:0;
	padding:0;
	cursor:pointer;
	opacity:.30;
}
#bgImages li .thumbType{
	opacity:0.3;
	position:absolute;
	width:30px;
	height:30px;
	left:-15px;
	top:-15px;
	border-radius:50%;
	background-color: #666;
	margin:0;
	padding:0; 
}
#bgImages li .thumbVideo{
	background:#666 url('<?php echo $imagesDir; ?>thumb_video.png') center center no-repeat;
}
#bgImages li .thumbImage{
	background:#666 url('<?php echo $imagesDir; ?>thumb_image.png') center center no-repeat;
}
#bgImages li .thumbFlash{
	background:#666 url('<?php echo $imagesDir; ?>thumb_flash.png') center center no-repeat;
}
#bgImages img.source, #bgImages iframe{
	display:none;
}
#bgImages h3, #bgImages p{
	display:none;
}
#bgImages li.active .thumbType{
	background-color: <?php echo $ColorFirst; ?>;
}
#bgImage{
	position:absolute;
	left:0;
	top:0;
}
#bgText{
	display:inline-block;
	text-align:left;
	position:absolute;
	left:20px;
	bottom:80px;
}
#bgText .headerText{
	display:inline-block;
	font-size:34px;
	line-height:54px;
	height:54px;
	color:<?php echo $ColorSecond; ?>;
	background-color:<?php echo $ColorThemeBgAlpha; ?>;
	padding:0 10px;
	white-space:nowrap;
	font-family: <?php echo $HeaderFont; ?>;
	opacity:0;
}
#bgText .subText{
	margin-top:1px;
	display:inline-block;
	font-size:16px;
	line-height:36px;
	height:36px;
	padding:0 10px;
	white-space:nowrap;
	color:<?php echo $ColorSecond; ?>;
	background-color:<?php echo $ColorFirstAlpha; ?>;	
	font-family: <?php echo $NormalFont; ?>;
	opacity:0;
}
.ghostModeActive{
	font-size:34px;
	line-height:54px;
	color:<?php echo $ColorSecond; ?>;
	background-color:<?php echo $ColorThemeBgAlpha; ?>;
	padding:0 10px;
	font-family: <?php echo $HeaderFont; ?>;
	position:absolute;
}

#bgImageWrapper{
	position:relative;
}
#bgImageWrapper img{
	position:absolute;
}
#ytVideo, #vmVideo, #jwVideo, #swfContent{
	position:absolute;
}
#bgPattern{
	display: none;
	position:absolute;
	background: url('<?php echo $imagesDir; ?>pattern.png');
}
#videoExpander{
	display: none;
	position:absolute;
	background: url('<?php echo $imagesDir; ?>top_right_expand.png') no-repeat center center;
}
.bgCanvas{
	position:absolute;
	left:0;
	top:0;
}
#timecircle{
	position:absolute;
	bottom:-5px;
	right:-5px;
}

/*Image Animate*/
.hoverWrapperBg{
	position:absolute;
	width:100%;
	left:0px;
	top:0px;
	overflow:hidden;
}
.disk1, .disk2{
	opacity:.30;
	background-color:<?php echo $BackgroundColor; ?>;
	border-radius:50%;
	position:absolute;
	left:0;
	top:0;
}
.disk1{ width:700px; height:700px; }
.disk2{ width:500px; height:500px; }
.image_frame{
	position:relative;
	cursor:pointer;
	border:2px solid <?php echo $ColorFirst; ?>;
}
.image_frame > a{
	display:block;
	padding:0;
	margin:0;
	font-size:0px;
}
.hoverWrapper{
	position:absolute;
	width:100%;
	left:0;
	top:0;
}
.nomodalimageborder{ border:2px solid <?php echo $ColorFirst; ?>; }
.hoverWrapperModal,
.hoverWrapperLink{
	-moz-transition: all 0.3s ease-in-out 0s;
	transition: all 0.3s ease-in-out;
	-webkit-transition: all 0.3s ease-in-out;
	-o-transition: all 0.3s ease-in-out;
	background-color:<?php echo $ColorFirstAlpha; ?>;
	display:block;
	width:40px;
	height:40px;
	position:absolute;
	right:20px;
	border-radius:50%;
}
.hoverWrapperModal{ bottom: 20px; background-image:url('<?php echo $imagesDir; ?>blog-zoom.png'); }
.hoverWrapperLink{ bottom: 80px; background-image:url('<?php echo $imagesDir; ?>blog-chain.png');}
.hoverWrapperOver{ 
	background-position: 0 -40px;
	background-color: <?php echo $ColorThemeBgAlpha; ?>;
}


.hoverWrapper .link{right:15px; background-image: url('<?php echo $imagesDir; ?>imageLink.png');}
.hoverWrapper .modal{right:49px;  background-image: url('<?php echo $imagesDir; ?>imageModal.png');}
.hoverWrapper .modalVideo{right:49px; background-image: url('<?php echo $imagesDir; ?>imageVideo.png');}
.hoverWrapper .link:hover, .hoverWrapper .link:active,
.hoverWrapper .modal:hover, .hoverWrapper .modal:active,
.hoverWrapper .modalVideo:hover, .hoverWrapper .modalVideo:active{
background-position:0 -33px;
box-shadow: -2px -2px rgba(0,0,0,.5) inset, 2px 2px rgba(0,0,0,.5) inset;
}

.blogdatemeta{
	<?php if($ThemePrefix=='light'){ ?>
	background-color:rgba(0, 0, 0, 0.1);
	<?php }else{ ?>
	background-color:rgba(255, 255, 255, 0.1);
	<?php } ?>
	margin-bottom:20px;
}
.blogdate{
	float:left;
	display:inline-block;
	font-size:18px;
	color:<?php echo $ColorSecond; ?>;
	font-family:<?php echo $HeaderFont; ?>;
	min-height:68px;
	min-width:60px;
	text-align:right;
	padding:20px;
	border-right:1px solid #fff;
	line-height:1.2em;
}
.hoverWrapper h3{
	opacity:0;
	text-align:left;
	padding:15px;
	margin:10px;
	font-size:18x;
	line-height:20px;
	color:<?php echo $ColorSecond; ?>;
	background-color:<?php echo $ColorFirst; ?>;
	font-family: <?php echo $HeaderFont; ?>;
}
.hoverWrapper .enter-text{
	opacity:0;
	text-align:left;
	padding:0px 15px 10px 15px;
	font-size:11px;
}

.blogreadmore:link,
.blogreadmore:visited {
	margin-top:20px;
	display:inline-block;
	background-color:<?php echo $ColorFirst; ?>;
	color: <?php echo $ColorSecond; ?>;
	padding:5px 10px;
}

.blogreadmore:hover,
.blogreadmore:active {
	background-color: <?php echo $ColorSecond; ?>;
	color: <?php echo $ColorFirst; ?>;
}

/*Play List*/
a.playerBtn:link, a.playerBtn:visited{
	-moz-transition: all 0.3s ease-in-out 0s;
	transition: all 0.3s ease-in-out;
	-webkit-transition: all 0.3s ease-in-out;
	-o-transition: all 0.3s ease-in-out;
	display:block; 
	width:16px; height:16px;
	background-color:<?php echo $ColorFirstAlpha; ?>;
	border-radius:5px;
}
a.playerBtn:hover, a.playerBtn:active{
	background-color:<?php echo $ColorThemeBgAlpha; ?>;
	background-position:0 -16px;
}
#playerController .play{background-image:url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-icon_player_play.png');}
#playerController .pause{background-image:url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-icon_player_pause.png');}
#playerController .stop{background-image:url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-icon_player_stop.png');}
#playerController .loop{background-image:url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-icon_player_loop.png');}
#playerController .nextsong{background-image:url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-icon_player_nextsong.png');}
#playerController .mute{background-image:url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-icon_player_mute.png'); display:none; margin-left:2px;}
#playerController .unmute{background-image:url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-icon_player_unmute.png'); margin-left:2px;}

#playWrapper{
	display:none;
	opacity:0;
	padding:20px;
	position:absolute;
	width:301px;
	background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-content-bg.png');
	border-radius:20px;
}
#playerBar{
	position:relative;
	width:100px;
	height:12px;
}
#playerBarActive{
	position:absolute;
	top:0;
	left:0;
	height:12px;
	width:0px;
	background-color:<?php echo $ColorFirst; ?>;
}
#volumeBar{
	position:relative;
	width:50px;
	height:12px;
}
#volumeBarActive{
	position:absolute;
	top:0;
	left:0;
	height:12px;
	width:0px;
	background-color:<?php echo $ColorFirst; ?>;
}
#playListCloseIcon{
	padding:5px;
	position:absolute;
	font-size:14px;
	font-family: <?php echo $HeaderFont; ?>;
	background-color:<?php echo $ColorFirst; ?>;
	color:<?php echo $ColorSecond; ?>;
}
#playerSongName{
	padding:10px 0;
	border-bottom:3px solid <?php echo $ColorFirst; ?>;
	margin-bottom:10px;
	
	font-size:14px;
	line-height:14px;
	font-family: <?php echo $HeaderFont; ?>;
	color:<?php echo $ColorFirst; ?>;
}
#playerController{
	margin-bottom:10px;
}
#playerController a{
	float:left;
	margin-right:1px;
}
#playerLoadBar{
	float:left;
	width:100px;
	height:12px;
	padding:1px;
	border:1px solid <?php echo $ColorLines; ?>;
	margin-left:5px;
}
#volumeLoadBar{
	float:left;
	width:50px;
	height:12px;
	padding:1px;
	border:1px solid <?php echo $ColorLines; ?>;
	margin-left:5px;
}
#playerSongDuration{
	float:left;
	width:53px;
	height:18px;
	margin-left:5px;
	margin-right:5px;
}
#playerSongDuration span{
	font-size:10px;
	font-family:'Arial';
	line-height:18px;
}
#playerSongDuration span.current{ color:<?php echo $ColorFirst; ?>; }
#playerSongDuration span.total{ color:<?php echo $ColorSecond; ?>; }
#playerController img{float:left; margin:4px 5px 0 5px;}
#audioList{
	margin-top:10px;
	clear:both;
}
#audioList ul {
	border-top:1px solid <?php echo $ColorLines; ?>;
	list-style:none;
	padding:1px;
}
#audioList ul li{
	cursor:pointer;
	line-height:28px;
	border-bottom:1px solid <?php echo $ColorLines; ?>;
}
#audioList ul li.active{
	background-color:<?php echo $ColorFirst; ?>;
	color:<?php echo $ColorSecond; ?>;
	text-indent:10px;
}
#audioList ul li.active > * {
	color:<?php echo $ColorSecond; ?>;
}


/*Menu*/
#logo img{
	margin:0;
	padding:0;
	line-height:1em;
}
#logo{
	position:absolute;
	top: 6px;
}
#demologo{
	margin:0;
	padding:0;
	line-height:1em;
	display:block;
	width:100px;
	height:100px;
	background: url('<?php echo $imagesDir; ?>demologo.png') no-repeat center center;
	background-color: <?php echo $ColorFirst; ?>;
	border-radius:50%;
}

#menu-container{
	z-index:9999;
	position:absolute;
	top:20px;
}
#mainmenuleft{
	height:40px;
	position:absolute;
	width:485px;
	background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-menu-bg.png');
	border-radius:20px 0 0 20px;
	box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.3);
}
#mainmenuright{
	height:40px;
	position:absolute;
	float:left;
	width:485px;
	background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-menu-bg.png');
	border-radius:0 20px 20px 0;
	box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.3);
}
.mainmenu ul{
	list-style:none;
}
.mainmenu ul ul li{ box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.3); }
.mainmenu ul > li{
	position:relative;
	text-align:left;
}
#mainmenuleft  ul > li{ float:right; }
#mainmenuright  ul > li{ float:left; }
.mainmenu ul li a:link,
.mainmenu ul li a:visited{
	padding:3px;
	display:block;
	text-decoration:none;
	text-align:left;
}
.mainmenu ul li a:hover,
.mainmenu ul li a:active{
}
.mainmenu ul > li.active > a:link,
.mainmenu ul > li.active > a:visited{
}
.mainmenu ul li a span.title{
	display:block;
	margin:0;
	padding:6px 10px 6px 10px;
	position:relative;
	color:<?php echo $ColorSecond; ?>;
	font-size:16px;
	font-family: <?php echo $HeaderFont; ?>;
	font-weight:500;
}
.mainmenu ul > li > a{}
.mainmenu ul li ul li a:link,
.mainmenu ul li ul li a:visited{ }
.mainmenu ul li ul li a:hover,
.mainmenu ul li ul li a:active{ }
.mainmenu ul li ul li a span.title{
	color:<?php echo $ColorSecond; ?>;
}
.mainmenu ul li a:hover span.title,
.mainmenu ul li a:active span.title,
.mainmenu ul > li.active > a:link span.title,
.mainmenu ul > li.active > a:visited span.title{
	-moz-transition: all 0.3s ease-in-out 0s;
	transition: all 0.3s ease-in-out;
	-webkit-transition: all 0.3s ease-in-out;
	-o-transition: all 0.3s ease-in-out;
	color:<?php echo $ColorSecond; ?>;
	background-color:<?php echo $ColorFirst; ?>;
}
.mainmenu ul li ul li a:hover span.title,
.mainmenu ul li ul li a:active span.title{
	color:<?php echo $ColorSecond; ?>;
	background-color:<?php echo $ColorFirst; ?>;
}
.mainmenu ul .description{
	display:none;
}
.mainmenu ul ul{
	width:220px;
	position:absolute;
	display:none;
	top:41px;
}
.mainmenu ul li li{
	margin-bottom:1px;
	background: url("<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-menu-bg.png");
	float:left;
	left:40px;
	top:20px;
	opacity:0;
}
#mainmenuleft ul li ul li,
#mainmenuright ul li ul li { float:none; clear:both;}
.mainmenu ul ul ul{
	width:220px;
	position:absolute;
	display:none;
	left:221px;
	top:0;
}

/* Footer */
#footer{
	position:absolute;
	left:0;
	bottom:0;
	width:100%;
	background: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-footer.png');
	height:32px;
	padding-top:1px;
}
#footertext{
	float:left;
	padding:0 10px;
	height:30px;
	line-height:30px;
	color:<?php echo $TextColor; ?>;
}
#footeraudio{
	display: <?php eopt('audioController','block'); ?>;
	float:right;
}
#footeraudio a{
	float:left;
	margin-left:1px;
}
#footeraudio .soundmute{ display:none;}
#bgControl{
	display: <?php eopt('bgController','block'); ?>;
	position:absolute;
}
#bgControlCount{
	display:inline-block;
	padding:0 15px 0 10px;
	font-size:18px;
	line-height:30px;
	vertical-align:top;
	font-family:<?php echo $HeaderFont; ?>;
	color:<?php echo $ColorSecond; ?>;
}
#bgControlButtons{
	display:inline-block;
}

#itemNumbers{
	position:absolute;
	bottom:20px;
	right:20px;
	opacity:0.5;
}
#currentItemNo{position:relative; background-color:<?php echo $ColorFirstAlpha; ?>;  border-radius:50%; width:40px; overflow:hidden; line-height:40px; text-align:center; font-size:24px; color:<?php echo $ColorInverse;?>; }
#totalItemCount{ position:absolute; top:-35px; left:-35px; border-radius:50%; width:60px; line-height:60px; text-align:center; font-size:36px; 
	background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-menu-bg.png');}
.currentItemPaused{ position:absolute; width:40px; height:40px; background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-bgControlPause.png'); cursor:pointer; }
.currentItemPlayed{ position:absolute; width:40px; height:40px; background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-bgControlPlay.png'); cursor:pointer; }


#share{float:left; display: <?php eopt('shareIcons','block'); ?>; }
#share  ul{list-style:none;}
#share li{float:left; margin-right:1px;}
.btnCtrl:link, .btnCtrl:visited{
	-moz-transition: all 0.3s ease-in-out 0s;
	transition: all 0.3s ease-in-out;
	-webkit-transition: all 0.3s ease-in-out;
	-o-transition: all 0.3s ease-in-out;
	display:block;
	width:40px; 
	height:40px;
	background-color:<?php echo $ColorThemeBgAlpha; ?>;
	border-radius:50%;
	position:absolute;
	opacity:0.5;
}
.btnCtrl:hover, a.btnCtrl:active{
	background-color:<?php echo $ColorFirstAlpha; ?>;
	background-position:-40px 0;
	box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
}

.tlCtrl:link, .tlCtrl:visited{
	-moz-transition: all 0.3s ease-in-out 0s;
	transition: all 0.3s ease-in-out;
	-webkit-transition: all 0.3s ease-in-out;
	-o-transition: all 0.3s ease-in-out;
	display:block;
	width:40px; 
	height:40px;
	background-color:<?php echo $ColorThemeBgAlpha; ?>;
	border-radius:50%;
	margin-bottom:10px;
	opacity:0.5;
}
.tlCtrl:hover, .tlCtrl:active{
	background-color:<?php echo $ColorFirstAlpha; ?>;
	background-position:-40px 0;
	box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
}

#topRight{
	position:absolute;
	right:20px;
	top:20px;
}

.playBG, .fitBG,  .closeFullScrnBG,  .infoBG{display:none;}
.nextBG:link,  .nextBG:visited{ background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-bgControlRight.png'); right:20px; top:50%;}
.prevBG:link,  .prevBG:visited{ background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-bgControlLeft.png'); left:20px; top:50%; }
.fullBG:link,  .fullBG:visited{ background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-bgControlFull.png');  }
.fitBG:link,  .fitBG:visited{ background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-bgControlFullClose.png'); }
.setFullScrnBG:link,  .setFullScrnBG:visited{ background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-bgControlFit.png'); display:block;}
.soundiconBG:link,  .soundiconBG:visited{display:none; background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-icon_sound.png'); } 
.soundmuteBG:link,  .soundmuteBG:visited{display:none; background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-icon_mute.png'); } 
.closeFullScrnBG:link,  .closeFullScrnBG:visited{ background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-bgControlClose.png'); display:none;}
.infoBG:link,  .infoBG:visited{ background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-bgControlInfo.png'); display:none; }
.fitCenterBG:link,  .fitCenterBG:visited{ background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-fitCenterBG.png'); top:50%; left:50%; display:none;}
.fullCenterBG:link,  .fullCenterBG:visited{ background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-fullCenterBG.png'); top:50%; left:50%; display:none;}
.soundplaylist:link,  .soundplaylist:visited{ background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-playListControl.png'); }

.nextBG:hover, .nextBG:active{ background-position:40px 0; }

#bottomleft{ position:absolute; left:20px; bottom:20px; }
#bottomleft .btnBL { 
	-moz-transition:none;
	transition:none;
	-webkit-transition: none;
	-o-transition: none;
}
.btnBL, .footerText{
	overflow:hidden;
	-moz-transition: all 0.3s ease-in-out 0s;
	transition: all 0.3s ease-in-out;
	-webkit-transition: all 0.3s ease-in-out;
	-o-transition: all 0.3s ease-in-out;
	width:40px;
	height:40px;
	background-color:<?php echo $ColorThemeBgAlpha; ?>;
	border-radius:20px;
	float:left;
	margin-right:10px;
	opacity:0.5;
}
.footerText{
	width:auto;
	padding:0 10px;
}
.footerText span{ line-height:40px; }
.mBL:link, .mBL:visited{
	display:block;
	width:40px;
	height:40px;
	border-radius:50%;
	float:left;
}
.mBL:hover, .mBL:active{
	background-color:<?php echo $ColorFirstAlpha; ?>;
	background-position:-40px 0;
}

.muteVideoBL, .pauseVideoBL, .playVideoBL,
.shareFb, .shareTwt, .shareRss{ margin-left:10px; }

.twtList{
	list-style:none;
	width:1000px;
}
.twtList li{
	font-size:14px;
	line-height:40px;
	text-align:left;
	display:none;
} 
.twtBL{ display:none; }
.twtBL > .mOpener{ margin-right:20px; background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-icon_tw.png');}
.shareBL > .mOpener{background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-icon_share.png');}
.videoBL > .mOpener{margin-right:10px; background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-bgControlVideo.png');}
.videoBL { display:none; opacity:0;}
.playVideoBL{ display:none; background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-playVideoBL.png'); }
.pauseVideoBL{ display:none; background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-pauseVideoBL.png'); }
.soundiconVideo{background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-soundiconVideo.png');}
.soundmuteVideo{background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-soundmuteVideo.png');}
.shareFb{background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-icon_fb.png');}
.shareTwt{background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-icon_twt.png');}
.shareRss{background-image: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-icon_rss.png');}


/*BLOG*/
.blogitem{margin-top:20px;}
#content h1.caption{
	padding:14px 0 15px 0;
	font-family: <?php echo $HeaderFont; ?>;
	font-size:32px;
	line-height:1.2em;
	color: <?php echo $ColorSecond; ?>;
	border-bottom:1px solid <?php echo $ColorFirst; ?>;
	margin-bottom: 20px;
}
.blogimage{
	margin:10px 20px 0 0;
	float:left;
	width:460px;
}
.blogtext{
	float:left;
	width:220px;
	margin-top:10px;
}
.blogtextlong{
	width:700px;
}
.blogdateLeft{
	font-size:12px;
	padding-right:3px;
	margin-top:15px;
	float:left;
	border-right:1px solid #000;
	width:30px;
	color:#000;
	text-align:right;
}
.blogdateRight{
	font-size:12px;
	padding-left:3px;
	margin-top:15px;
	float:left;
	width:29px;
	text-align:left;
	color:#000;
}
.blogcontent{
	margin:10px 0;
	border-bottom:2px solid <?php echo $ColorFirst; ?>;
}
.blogTop{clear:both;}
.blogTop hr{
	float:left;
	width:570px;
	margin-top:8px;
	height:3px;
	background-color:#333;
}
.blogTop a:link,
.blogTop a:visited{
	display:block;
	float:right;
	color:#333;
	font-family: <?php echo $HeaderFont; ?>;
	font-size:12px;
	
	text-decoration:none;
}
.blogTop a:hover,
.blogTop a:active{
	color:#ffcc00;
}
.blogcontent p{
	margin-top:20px;
	font-size:11px;
	float:left;
}

.meta-links{
	float:left;
	display:inline-block;
}

h3.postQuote{
	background:url('<?php echo $imagesDir; ?>quote-bg.png') no-repeat;
	font-family: <?php echo $NormalFont; ?>;
	font-size:36px;
	color: <?php echo $TextColor; ?>;
	font-style:italic;
	padding:20px 0 0 20px;
}
h4.postQuoteTitle{
	margin-top:10px;
	font-size:18px;
	text-align:right;
}
.linkformat:link, .linkformat:visited{
	font-size:18px;
	line-height:1.2em;
	text-decoration:none;
	font-family: <?php echo $HeaderFont; ?>;
	color: <?php echo $colorInverse; ?>;
	margin:20px 0 0 0;
}
.linkformat:hover, .linkformat:active{
	text-decoration:underline;
	color:<?php echo $ColorFirst; ?>;
}

/* Flex Slider Direction */
.flex-direction-nav li a {width: 30px; height: 30px; display: block; position: absolute; top: 40px; cursor: pointer; text-indent: -9999px; border-radius:50%; }
.flex-direction-nav li a:hover{ background-color:<?php echo $ColorThemeBgAlpha; ?>; }
.flex-direction-nav li .next {background:<?php echo $ColorFirstAlpha; ?> url('<?php echo $imagesDir; ?>slider_arrow_right.png') center center no-repeat; right: 40px;}
.flex-direction-nav li .prev {background:<?php echo $ColorFirstAlpha; ?> url('<?php echo $imagesDir; ?>slider_arrow_left.png') center center no-repeat; right: 80px;}
.flex-direction-nav li .disabled {opacity: .3; filter:alpha(opacity=30); cursor: default;}

.flex-control-nav li a { background-image:none; background-color: <?php echo $ColorFirstAlpha; ?>; }
.flex-control-nav li a:hover { background-color: <?php echo $ColorThemeBgAlpha; ?>; }
.flex-control-nav li a.active { background-color: <?php echo $ColorThemeBgAlpha; ?>; opacity:0.3; }

.meta-links h3{
	color:<?php echo $ColorSecond; ?>;
	font-family: <?php echo $HeaderFont; ?>;
	font-size:22px;
	line-height:1.4em;
	margin:14px 20px;
	width:559px;
}
.meta-links h3 a:visited,.meta-links h3 a:link {
	color:<?php echo $ColorSecond; ?>;
	font-family: <?php echo $HeaderFont; ?>;
	font-size:22px;
	line-height:1.4em;
	text-decoration:none;
}
.meta-links h3 a:hover,.meta-links h3 a:active {
	color:<?php echo $ColorFirst; ?>;
}

.meta-row{
	display:inline-block;
	margin:0 0 20px 20px;
}
.meta-row a:link, .meta-row a:visited{ text-decoration:none; }
.meta-row a:hover, .meta-row a:active{ color:<?php echo $ColorFirst; ?>; }
.meta-row span{
	text-indent:-9999px;
	display:inline-block;
	width:30px;
	height:30px;
	border-radius:15px;
	background-color: <?php echo $ColorFirstAlpha ?>;
	vertical-align:25%;
	margin-right:10px;
}
.meta-postedby{ background-image:url('<?php echo $imagesDir; ?>meta-postedby.png'); }
.meta-categories{ background-image:url('<?php echo $imagesDir; ?>meta-categories.png'); }
.meta-tags{ background-image:url('<?php echo $imagesDir; ?>meta-tags.png'); }
.meta-comments{ background-image:url('<?php echo $imagesDir; ?>meta-comments.png'); }

.morelink:link,
.morelink:visited{
	display:inline-block;
	font-size:14px;
	background-color:<?php echo $ColorFirst; ?>;
	color:<?php echo $ColorSecond; ?>;
	padding:5px 9px;
	text-decoration:none;
	margin-top:20px;
}
.morelink:hover,
.morelink:active{
	box-shadow: -2px -2px rgba(0,0,0,.5) inset, 2px 2px rgba(0,0,0,.5) inset;
}
.meta-tips{
	position:absolute;
	color:<?php echo $ColorSecond; ?>;
	padding:5px 10px;
	background-color:<?php echo $ColorFirst; ?>;
}
.meta-tips span{
	width:10px;
	height:10px;
	position:absolute;
	bottom:-4px;
	right:0px;
}
.meta-tips span svg polygon{
	fill:<?php echo $ColorFirst; ?>;
}

.content-with-sidebar{ float:left; width:700px;	}
.left-col-with-sidebar{	width:700px; float:left;}
.page-content{width: 940px; }
#right-col{ width:220px; }
.right-col-left{
	float:left;
	margin-left:0;
	margin-right:20px;
}
.right-col-right{
	float:right;
	margin:0 0 0 20px;
}
#right-col > ul{ list-style:none outside none; }
#right-col > ul > li{ width: 220px; }

#right-col > ul > li > div{
	padding-bottom:20px;
	margin-top:20px;
	border-bottom: 1px solid <?php echo $ColorFirst; ?>;
}
#right-col ul li div h3{
	font-size:18px;
	color:<?php echo $ColorSecond; ?>;
	margin:0;
	padding-bottom:10px;
	margin-top:20px;
}

#right-col ul li div a:link, 
#right-col ul li div a:visited {
	text-decoration:none;
}
#right-col ul li div a:hover,
#right-col ul li div a:active {
	text-decoration:underline;
	color:<?php echo $ColorFirst; ?>;
}

/* Widgets */
input.searchbox{
	float: left;
	text-indent: 10px;
	width:160px;
	background-color: <?php echo $ColorFirst; ?>;
	color: <?php echo $ColorInverse; ?>;
	height: 40px;
	line-height:40px;
	text-align:right;
	vertical-align: middle; 
	border-radius:0px;
	padding-right:20px;
}
.searchbutton,
.searchbutton:visited,
.searchbutton:link{
	display:block;
	float: left;
	width:40px;
	height:40px;
	font-size:0px;
	background: <?php echo $ColorFirst; ?> url('<?php echo $imagesDir; ?>search-icon.png') center center no-repeat;
	border:none;
	text-indent:-9999px;
}

.widget_recent_entries ul,
.widget_archive ul,
.widget_categories ul,
.widget_recent_comments ul
{ list-style:none; }
.widget_recent_entries ul li,
.widget_archive ul li,
.widget_categories ul li,
.widget_recent_comments ul li
{ padding-left:25px; margin-bottom:15px; width:195px;}
.widget_recent_entries ul li{ background:url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-widget-recent-entries.png') 0 5px no-repeat; }
.widget_recent_comments ul li{ background:url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-widget-recent-comments.png') 0 5px no-repeat; }
.widget_archive ul li{ background:url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-widget-archives-icon.png') 0 5px no-repeat; }
.widget_categories ul li{ background:url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-widget-categories-icon.png') 0 5px no-repeat; }

#right-col .widget_tag_cloud a:link, #right-col .widget_tag_cloud a:visited{
	float:left;
	display:inline;
	font-size:12px !important;
	line-height:24px;
	padding:0 5px;
	color:<?php echo $ColorInverse; ?>;
	background-color:<?php echo $ColorFirst; ?>;
	text-decoration:none;
	text-transform:uppercase;
	margin:1px 1px 0 0;
	border:none;
}
#right-col .widget_tag_cloud a:hover, #right-col .widget_tag_cloud a:active{
	background-color:<?php echo $ColorThemeBgAlpha; ?>;
	color:<?php echo $ColorSecond; ?>;
	position:relative;
	z-index:99999;
	text-decoration:none;
}
.tagcloud:after {
    clear: both;
    content: ".";
    display: block;
    height: 0;
    visibility: hidden;
}


/*About*/
.personInfo img{ float:left; }
.personName{ float:left; padding-left:20px;}
.personName h3{font-size:12px; line-height:16px;}
.personName span{font-size:11px; line-height:11px; display:block; }
.personContact{clear:both; display:block; float:left; padding-top:20px; }
.personContact a:link, .personContact a:visited{background-position:-6px -6px; background-color:<?php echo $ColorFirst; ?>; width:20px; height:20px; display:block; float:left; margin-left:1px; border:none; border-radius:50%; }
.personContact a:hover, .personContact a:active{background-position:-6px -40px;}
.personFacebook{background-image:url('<?php echo $imagesDir; ?>person-facebook.png');}
.personTwitter{background-image:url('<?php echo $imagesDir; ?>person-twitter.png');}
.personEmail{background-image:url('<?php echo $imagesDir; ?>person-email.png');}

/*Portfolio*/
.portfolioitems{
	list-style:none;
	width:620px;
	overflow:hidden;
}
.portfolio1columns li{
	float:left;
	margin: 20px 0 0 0;
}
.portfolio2columns li{
	float:left;
	margin: 20px 20px 0 0;
}
.portfolio3columns li{
	float:left;
	margin: 20px 20px 0 0;
}
.portfolio4columns li{
	float:left;
	margin: 20px 20px 0 0;
}
.portfolioFilter{
	display:block;
	list-style:none;
	margin:20px 0 0 0;
	height:24px;
	padding-bottom:20px;
	border-bottom:2px solid <?php echo $ColorFirst; ?>;
	float:none;
}

.portfolioFilter li{ float:left; margin-right:10px;}
.portfolioFilter li a:link,
.portfolioFilter li a:visited{
	display:block;
	background-color:<?php echo $ColorFirst; ?>; 
	text-decoration:none;
	color:<?php echo $ColorInverse; ?>;
	font-family: <?php echo $HeaderFont; ?>;
	font-size:12px;
	line-height:30px;
	padding:0 15px;
}
.portfolioFilter li a:hover,
.portfolioFilter li a:active{
	background-color:<?php echo $ColorThemeBgAlpha; ?>; 
	text-decoration:none;
	color:<?php echo $ColorInverse; ?>;
}

/*Columns*/
.c1,
.c1of2, .c1of2_end, 
.c1of3, .c1of3_end, .c2of3, .c2of3_end,
.c1of4, .c1of4_end, .c2of4, .c2of4_end, .c3of4, .c3of4_end,
.c1of5, .c1of5_end, .c2of5, .c2of5_end, .c3of5, .c3of5_end, .c4of5, .c4of5_end,
.c1of6, .c1of6_end, .c2of6, .c2of6_end, .c3of6, .c3of6_end, .c4of6, .c4of6_end, .c5of6, .c5of6_end{
float:left; margin-top:20px;}

.c1{clear:both; float:left; width:940px;}

.c1of2{float:left; width:460px; margin-right:20px;}
.c1of2_end{float:left; width:460px;}

.c1of3{float:left; width:300px; margin-right:20px;}
.c1of3_end{float:left; width:300px;}
.c2of3{float:left; width:620px; margin-right:20px;}
.c2of3_end{float:left; width:620px;}

.c1of4{float:left; width:220px; margin-right:20px;}
.c1of4_end{float:left; width:220px;}
.c2of4{float:left; width:460px; margin-right:20px;}
.c2of4_end{float:left; width:460px;}
.c3of4{float:left; width:700px; margin-right:20px;}
.c3of4_end{float:left; width:700px;}

.c1of5{float:left; width:172px; margin-right:20px;}
.c1of5_end{float:left; width:172px;}
.c2of5{float:left; width:364px; margin-right:20px;}
.c2of5_end{float:left; width:364px;}
.c3of5{float:left; width:556px; margin-right:20px;}
.c3of5_end{float:left; width:556px;}
.c4of5{float:left; width:748px; margin-right:20px;}
.c4of5_end{float:left; width:748px;}

.c1of6{float:left; width:140px; margin-right:20px;}
.c1of6_end{float:left; width:140px;}
.c2of6{float:left; width:300px; margin-right:20px;}
.c2of6_end{float:left; width:300px;}
.c3of6{float:left; width:460px; margin-right:20px;}
.c3of6_end{float:left; width:460px;}
.c4of6{float:left; width:620px; margin-right:20px;}
.c4of6_end{float:left; width:620px;}
.c5of6{float:left; width:620px; margin-right:20px;}
.c5of6_end{float:left; width:780px;}

.c1of12{float:left; width:60px; margin-right:20px;}
.c1of12_end{float:left; width:60px;}
.c2of6{float:left; width:140px; margin-right:20px;}
.c2of12_end{float:left; width:140px;}
.c3of12{float:left; width:220px; margin-right:20px;}
.c3of12_end{float:left; width:220px;}
.c4of12{float:left; width:300px; margin-right:20px;}
.c4of12_end{float:left; width:300px;}
.c5of12{float:left; width:380px; margin-right:20px;}
.c5of12_end{float:left; width:380px;}
.c6of12{float:left; width:460px; margin-right:20px;}
.c6of12_end{float:left; width:460px;}
.c7of6{float:left; width:540px; margin-right:20px;}
.c7of12_end{float:left; width:540px;}
.c8of12{float:left; width:620px; margin-right:20px;}
.c8of12_end{float:left; width:620px;}
.c9of12{float:left; width:700px; margin-right:20px;}
.c9of12_end{float:left; width:700px;}
.c10of12{float:left; width:780px; margin-right:20px;}
.c10of12_end{float:left; width:780px;}
.c11of12{float:left; width:860px; margin-right:20px;}
.c11of12_end{float:left; width:860px;}

/*STYLES*/
h1, h2, h3, h4, h5, h6{
	clear:both;
	font-family: <?php echo $HeaderFont; ?>;
	font-weight:bold;
	color: <?php echo $ColorFirst; ?>;
}
h1{font-size:<?php eopt('h1FontSize','24');?>px;}
h2{font-size:<?php eopt('h2FontSize','20');?>px;}
h3{font-size:<?php eopt('h3FontSize','18');?>px;}
h4{font-size:<?php eopt('h4FontSize','16');?>px;}
h5{font-size:<?php eopt('h5FontSize','14');?>px;}
h6{font-size:<?php eopt('h6FontSize','12');?>px;}

.divider{clear:both; height:20px;}
.vericaldivider{display:inline-block; width:20px; }
hr.seperator{clear:both; float:left; margin-top:20px; height:1px; background-color:<?php echo $ColorFirst; ?>; width:100%; }
hr.seperatorBold{clear:both; float:left; margin-top:20px; height:3px; background-color:<?php echo $ColorFirst; ?>; width:100%; }
.quotes-one{
	margin-left:20px;
	border-left:3px solid <?php echo $ColorFirst; ?>;
	padding-left:20px;
}
.quotes-two{
	padding-left:35px;
	background: url('<?php echo $imagesDir; ?>quote2-bg.png') 0px 5px no-repeat;
}
.dropcap{
	text-align:center;
	display:block;
	float:left;
	font-weight:500;
	font-size:28px;
	line-height:40px;
	width:40px;
	font-family: <?php echo $HeaderFont; ?>;
	background-color: <?php echo $ColorFirst; ?>;
	color:<?php echo $ColorSecond; ?>;
	padding:0;
	margin:7px 5px 0 0;
	border-radius:50%;
}
.quotes-writer{color:#fff;}
.right{float:right; margin:5px 0 5px 15px;}
.left{float:left; margin:5px 15px 5px 0px;}
span.highlight{background-color:<?php echo $ColorFirst; ?>; color:<?php echo $ColorSecond; ?>; padding:0px 2px;}
span.textlight{color:<?php echo $ColorFirst; ?>;}
ul{list-style:none;display: inline-block;}
ul li{padding: 0px 0 3px 20px;}
ul.check li{ background:url('<?php echo $imagesDir; ?>list-check.png') left 6px no-repeat;}
ul.cross li{ background:url('<?php echo $imagesDir; ?>list-cross.png') left 7px no-repeat;}
ul.arrow li{ background:url('<?php echo $imagesDir; ?>list-arrow.png') left 8px no-repeat;}
ul.circle li{ background:url('<?php echo $imagesDir; ?>list-circle.png') left 7px no-repeat;}

.infobox, .attentionbox, .downloadbox, .crossbox{
	padding:20px 20px 20px 75px;
	border:2px solid #333;
}
.infobox{
	border-color:#0066cc;
	color:#0066cc;
	background: url('<?php echo $imagesDir; ?>box-info.png') 20px 24px no-repeat;
}
.attentionbox{
	border-color:#ffcc00;
	color:#ffcc00;
	background: url('<?php echo $imagesDir; ?>box-attention.png') 20px 24px no-repeat;
}
.downloadbox{
	border-color:#009900;
	color:#009900;
	background: url('<?php echo $imagesDir; ?>box-download.png') 20px 24px no-repeat;
}
.crossbox{
	border-color:#ff0000;
	color:#ff0000;
	background: url('<?php echo $imagesDir; ?>box-cross.png') 20px 24px no-repeat;
}

.tipbox{
	position:absolute;
	color:#000;
	padding:10px 10px;
	background-color:#ffcc00;
	border-radius:6px;
}
.tipbox span{
	width:9px;
	height:5px;
	background:url('<?php echo $imagesDir; ?>tips-bottom.png') center center no-repeat;
	position:absolute;
	bottom:-5px;
	left:50%;
}


a.tip:link, 
a.tip:visited{
	color:<?php echo $ColorFirst; ?>;
	border-bottom:1px solid <?php echo $ColorSecond; ?>;
} 

a.tip:hover, 
a.tip:active{
	border-bottom:none;
}

div.item_two_one{
	clear:both;
	float:left;
	width:80px;
	padding:12px 5px 12px 0;
	vertical-align:top;
	font-family: <?php echo $HeaderFont; ?>;
	font-size:16px;
}
div.item_two_two{
	float:left;
	width:430px;
	margin-left:10px;
	padding:15px 5px;
	border-bottom: 1px solid #333;
	vertical-align:top;
}

/*Buttons*/
.buttonSmall{
	display:inline-block;
	background: url('<?php echo $imagesDir; ?>button-white-left.png') left top no-repeat;
	height:26px;
	padding-left:5px;
}
.buttonSmall a{
	background: url('<?php echo $imagesDir; ?>button-white-center.png') left top repeat-x;
	float:left;
	font-size:12px;
	line-height:26px;
	padding:0 10px;
	text-decoration:none;
	font-family: <?php echo $HeaderFont; ?>;
	
	color:#ffffff;
}
.buttonSmall span{
	float:left;
	background: url('<?php echo $imagesDir; ?>button-white-right.png') left top no-repeat;
	height:26px;
	width:5px;
}

.smallBlack{background-image: url('<?php echo $imagesDir; ?>button-black-left.png'); }
.smallBlack a{background-image: url('<?php echo $imagesDir; ?>button-black-center.png'); }
.smallBlack span{background-image: url('<?php echo $imagesDir; ?>button-black-right.png'); }

.smallWhite{background-image: url('<?php echo $imagesDir; ?>button-white-left.png'); }
.smallWhite a{background-image: url('<?php echo $imagesDir; ?>button-white-center.png'); color:#333333;}
.smallWhite span{background-image: url('<?php echo $imagesDir; ?>button-white-right.png'); }

.smallRed{background-image: url('<?php echo $imagesDir; ?>button-red-left.png'); }
.smallRed a{background-image: url('<?php echo $imagesDir; ?>button-red-center.png'); }
.smallRed span{background-image: url('<?php echo $imagesDir; ?>button-red-right.png'); }

.smallGreen{background-image: url('<?php echo $imagesDir; ?>button-green-left.png'); }
.smallGreen a{background-image: url('<?php echo $imagesDir; ?>button-green-center.png'); }
.smallGreen span{background-image: url('<?php echo $imagesDir; ?>button-green-right.png'); }

.smallBlue{background-image: url('<?php echo $imagesDir; ?>button-blue-left.png'); }
.smallBlue a{background-image: url('<?php echo $imagesDir; ?>button-blue-center.png'); }
.smallBlue span{background-image: url('<?php echo $imagesDir; ?>button-blue-right.png'); }

.buttonMedium{
	display:inline-block;
	background: url('<?php echo $imagesDir; ?>buttonM-white-left.png') left top no-repeat;
	height:36px;
	padding-left:5px;
}
.buttonMedium a{
	background: url('<?php echo $imagesDir; ?>buttonM-white-center.png') left top repeat-x;
	float:left;
	font-size:16px;
	line-height:36px;
	padding:0 10px;
	text-decoration:none;
	font-family: <?php echo $HeaderFont; ?>;
	
	color:#ffffff;
}
.buttonMedium span{
	float:left;
	background: url('<?php echo $imagesDir; ?>buttonM-white-right.png') left top no-repeat;
	height:36px;
	width:5px;
}

.mediumBlack{background-image: url('<?php echo $imagesDir; ?>buttonM-black-left.png'); }
.mediumBlack a{background-image: url('<?php echo $imagesDir; ?>buttonM-black-center.png'); }
.mediumBlack span{background-image: url('<?php echo $imagesDir; ?>buttonM-black-right.png'); }

.mediumWhite{background-image: url('<?php echo $imagesDir; ?>buttonM-white-left.png'); }
.mediumWhite a{background-image: url('<?php echo $imagesDir; ?>buttonM-white-center.png'); color:#333333;}
.mediumWhite span{background-image: url('<?php echo $imagesDir; ?>buttonM-white-right.png'); }

.mediumRed{background-image: url('<?php echo $imagesDir; ?>buttonM-red-left.png'); }
.mediumRed a{background-image: url('<?php echo $imagesDir; ?>buttonM-red-center.png'); }
.mediumRed span{background-image: url('<?php echo $imagesDir; ?>buttonM-red-right.png'); }

.mediumGreen{background-image: url('<?php echo $imagesDir; ?>buttonM-green-left.png'); }
.mediumGreen a{background-image: url('<?php echo $imagesDir; ?>buttonM-green-center.png'); }
.mediumGreen span{background-image: url('<?php echo $imagesDir; ?>buttonM-green-right.png'); }

.mediumBlue{background-image: url('<?php echo $imagesDir; ?>buttonM-blue-left.png'); }
.mediumBlue a{background-image: url('<?php echo $imagesDir; ?>buttonM-blue-center.png'); }
.mediumBlue span{background-image: url('<?php echo $imagesDir; ?>buttonM-blue-right.png'); }

/*CONTACT FORM*/
.dform p{
	display:block;
	clear:both;
	padding:5px 5px 5px 0;
}

.dFormInput{
	float:left;
	width:300px;
	/*padding:5px;*/
	margin-left:10px;
	border:1px solid <?php echo $ColorThemeBgAlpha; ?>;
	background-color: <?php echo $ColorThemeBgAlpha; ?>;
}
.dFormInputFocus{
	border:1px solid <?php echo $ColorFirstAlpha; ?>;
}
.dform label{
	padding-top:0px;
	float:left;
	display:inline-block;
	width:200px;
	text-decoration:none;
	font-family: <?php echo $HeaderFont; ?>;
	font-size:16px;
}
.dform input[type=text], .dform textarea{
    background-color: #757575 !important;
}
.dform input[type=text], .dform select, .dform textarea{
	background:none;
	width:100%;
}
.dform input[type=text]:focus, .dform select:focus, .dform textarea:focus{
}
.dform select{
}
.dform input[type=submit]{
	margin-left:10px;
}
.dform textarea{
	height:113px;
}
.dform label.error{
	clear:both;
	float:left;
	margin-left:200px;
	padding-left:10px;
	width:280px;
	color:<?php echo $ColorFirst; ?>;
	font-weight:normal;
	font-size:11px;
}
.form_message{
	display:none;
	padding:5px;
	background-color:<?php echo $ColorFirst; ?>;
	color:<?php echo $ColorSecond; ?>;
}
div.form_input{
	float:left;
}
.dform .submitButton{
	display:block;
	margin:10px 0 0 10px;
	color:<?php echo $ColorSecond; ?>;
	background-color:<?php echo $ColorFirst; ?>;
	line-height:14px;
	padding:10px 20px;
	text-decoration:none;
	font-family: <?php echo $HeaderFont; ?>;
	font-size:14px;
	text-transform:uppercase;
	font-weight:bold;
}
.dform .submitButton:hover{
	box-shadow: -2px -2px rgba(0,0,0,.5) inset, 2px 2px rgba(0,0,0,.5) inset;
}


/*Portfolio*/
.portfolioitems{
	list-style:none;
	width:620px;
	overflow:hidden;
	margin-top:20px;
}
.portfolioitem{
	float:left;
	margin:0 20px 20px 0;
}
.portfolioitem .meta-row{ margin-bottom:10px;}
.portfolioitem h3{ font-size:14px; margin:14px 0 0 0;}

.portfolioFilter li{ float:left; margin:0 0 1px 1px;}
.portfolioFilter li a:link,
.portfolioFilter li a:visited{
	display:block;
	background-color:<?php echo $colorBox; ?>; 
	text-decoration:none;
	color:<?php echo $colorBoxInverse; ?>;
	font-family: <?php echo $ContentFont; ?>;
	font-size:12px;
	line-height:24px;
	padding:0 10px;
	border:none;
}
.portfolioFilter li a:hover,
.portfolioFilter li a:active{
	background-color:<?php echo $colorSecond; ?>; 
	color:<?php echo $colorSecondInverse; ?>;
}
.portfolioFilter li a.selected{ 
	background-color:<?php echo $colorSecond; ?>; 
	color:<?php echo $colorSecondInverse; ?>;
}
.portfolioWithSidebar{width:720px;}
.portfolioWithoutSidebar{width:960px;}

/*Gallery*/
.galleryitems{
	list-style:none;
	overflow:hidden;
	margin-top:20px;
}
.galleryitem{
	float:left;
	margin:0 20px 20px 0;
}
.galleryitem h3{ font-size:14px; margin-top:14px;}
.galleryWithSidebar{width:720px;} 
.galleryWithoutSidebar{width:960px;}
.c3columns_withSidebar > li{ width:220px;}
.c4columns_withSidebar > li{ width:160px;}
.c5columns_withSidebar > li{ width:124px;}
.c6columns_withSidebar > li{ width:100px;}
.c3columns_withoutSidebar > li{ width:300px;}
.c4columns_withoutSidebar > li{ width:220px;}
.c5columns_withoutSidebar > li{ width:172px;}
.c6columns_withoutSidebar > li{ width:140px;}


div.read-more-link{
	text-align:right;
	border-bottom: <?php echo $colorSecond; ?> 1px solid;
	margin-bottom: 40px;
	font-family: <?php echo $headerFont; ?>;
}

a.read-more-link{
	display:inline-block !important; 
	color:<?php echo $colorSecondInverse;  ?>;
	font-size: 12pt;
	text-decoration: none;
	padding: 6px 6px 8px 35px;
	background:<?php echo $colorSecond; ?> url('<?php echo $prfx; ?>images/readmore-icon.png') 22px center no-repeat;
	width:auto;
}

/*ADD WP*/
pre{
	 white-space: pre-wrap;       /* css-3 */
	white-space: -moz-pre-wrap !important;  /* Mozilla, since 1999 */
	white-space: -pre-wrap;      /* Opera 4-6 */
	white-space: -o-pre-wrap;    /* Opera 7 */
	overflow: auto;
	font-family: 'Consolas',monospace;
	font-size:13px;
	color: #333;
	line-height:18px;
	background: url("<?php echo $imagesDir; ?>pre-bg.png") repeat scroll left top #FFFFFF;
	border-left: 4px solid #888;
	padding:18px 5px 18px 10px;
	margin: 10px 0 10px 0;
}
div.sh_toggle{
	clear:both;
}
div.sh_toggle_text a{
	color:#fff;
	font-size: 10pt;
	
	text-decoration: none;
}
.sh_toggle_text{
	padding: 4px 4px 4px 20px;
	background:url('<?php echo $imagesDir; ?>toggle_arrow_closed.png') 0px 6px no-repeat;
	cursor:pointer;
}
.sh_toggle_text_opened{
	background:url('<?php echo $imagesDir; ?>toggle_arrow_opened.png') 0px 6px no-repeat;	
	cursor:pointer;
}
.sh_toggle_content{
	display:none;
}

.wp-pagenavi {
	margin-top:24px;
}
.wp-pagenavi .pages{
	background-color:<?php echo $ColorFirst; ?>;
	color:<?php echo $ColorSecond; ?>;
	padding:4px 8px;
	font-size:14px;
	font-family:<?php echo $HeaderFont; ?>;
	text-transform:uppercase;
}

.wp-pagenavi .current{
	margin-left:1px;
	background-color:<?php echo $ColorThemeBgAlpha; ?>;
	color:<?php echo $ColorSecond; ?>;
	padding:4px 8px;
	font-size:14px;
	font-family:<?php echo $HeaderFont; ?>;
}

.wp-pagenavi .page:link, 
.wp-pagenavi .page:visited, 
.wp-pagenavi .nextpostslink:link, 
.wp-pagenavi .nextpostslink:visited, 
.wp-pagenavi .previouspostslink:link,
.wp-pagenavi .previouspostslink:visited{
	margin-left:1px;
	background-color:<?php echo $ColorFirst; ?>;
	color:<?php echo $ColorSecond; ?>;
	padding:4px 8px;
	font-size:14px;
	font-family:<?php echo $HeaderFont; ?>;
	text-decoration:none;
}

.wp-pagenavi .page:hover, 
.wp-pagenavi .page:active, 
.wp-pagenavi .nextpostslink:hover, 
.wp-pagenavi .nextpostslink:active, 
.wp-pagenavi .previouspostslink:hover,
.wp-pagenavi .previouspostslink:active{
	background-color:<?php echo $ColorThemeBgAlpha; ?>;
	color:<?php echo $ColorSecond; ?>;
}



/* Comments CSS*/
#comments{ margin-top:20px; border-top:2px solid <?php echo $ColorFirst; ?>; margin-top:20px;}
#comments h4{
	margin-top:20px;
	padding-bottom:20px;
}
.comment-wrapper{
	background:url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-comment-bg.png');
	margin-bottom:20px;
}

#comments ul, #comments ol{
	list-style:none;
}

#comments ol li li{
	padding-left:100px;
	background: url('<?php echo $imagesDir; ?><?php echo $ThemePrefix; ?>-comment-icon.png') 48px 40px no-repeat;
}

.comment-avatar{
	float:left;
	width:80px;
	height:80px;
	margin:10px;
}
.comment-text{
	padding-left:100px;
	padding-right:10px;
}
.comment-author{
	float:left;
	padding-top:10px;
	border-bottom:1px solid <?php echo $ColorFirst; ?>;
	padding-bottom:10px;
}
#comments li .comment-author{width:520px;}
#comments li li .comment-author{width:420px;}
#comments li li li .comment-author{width:320px;}
#comments li li li li .comment-author{width:220px;}
#comments li li li li li .comment-author{width:120px;}
.author-link{
	color:<?php echo $ColorFirst; ?>;
}
.author-date{
	font-sieze:12px;
	font-weight:italic;
}
.author-time{
	font-size:12px;
}
.comment-text p{
	float:left;
	padding: 5px 10px 10px 0;
}
.form-allowed-tags{
	display:none;
}

#comments .comment-reply-link{
	display:inline-block;
	float:left;
	margin-left:10px;
	margin-top:10px;
}
#comments .comment-reply-link:link,
#comments .comment-reply-link:visited{
	display:inline-block;
	float:right;
	font-size:11px;
	line-height:25px;
	height:25px;
	padding:1px 11px 0px 11px;
	text-transform:uppercase;
	background-color: <?php echo $ColorFirst; ?>;
	color: <?php echo $ColorSecond; ?>;
	font-family: <?php echo $HeaderFont; ?>;
	text-decoration:none;
}
@-moz-document url-prefix() {
	#comments .comment-reply-link a:link,
	#comments .comment-reply-link a:visited{
		padding:0px 11px 1px 11px;
  }
}
#comments .comment-reply-link:link,
#comments .comment-reply-link:visited{
	margin-right:0px;
	margin-bottom:10px;
}
#comments ol ul .comment-reply-link:link,
#comments ol ul .comment-reply-link:visited{
	margin-right:0px;
}
#comments .comment-reply-link:hover,
#comments .comment-reply-link:active{
	text-decoration:none;
	background-color:<?php echo $ColorThemeBgAlpha; ?>;
	color:<?php echo $ColorSecond; ?>;
}

/*Comment Form*/
#respond{ border-top:1px solid <?php echo $ColorFirst; ?>; margin-bottom:20px; }
#respond h3{ margin-top:20px;}
#commentform{
}
.comment-notes, .logged-in-as{
	padding: 0 0 0 0; 
}
#commentform label{
	display:inline-block;
	font-size:14px;
	vertical-align:top;
	font-family: <?php echo $HeaderFont; ?>;
	font-size:16px;
	text-transform:uppercase;
	margin-bottom:14px;
} 
#commentform .required{
	display:inline-block;
	width:15px;
	height:22px;
	color: #ff0000;
	vertical-align:top;
}

#commentform .comment-form-author,
#commentform .comment-form-email,
#commentform .comment-form-url{	
	float:left;
	width:220px;
	margin-right:20px;
}
#commentform .comment-form-url{ margin-right:0;}

#commentform .comment-form-author label, 
#commentform .comment-form-email label{ }
#commentform .comment-form-comment{ padding-top:20px; clear:both; }
#commentform input[type=text], 
#commentform textarea{
	width: 210px;
	height: 22px;
	background-color:<?php echo $ColorThemeBgAlpha; ?>;
	border:1px solid <?php echo $ColorThemeBgAlpha; ?>;
	padding:5px;
}
#commentform .comment-notes{ padding-top:0; }
#commentform input[type=text]:focus, 
#commentform textarea:focus{
	border:1px solid <?php echo $ColorFirst; ?>;
}
#commentform textarea{
	height:140px;
	width:690px;
}
#commentform p{
	margin-top:20px;
	vertical-align:top;
}
#commentform input[type=submit]{
	cursor:pointer;
	display:inline-block;
	font-size:14px;
	line-height:35px;
	height:35px;
	padding:1px 0 0px 0;
	width:220px;
	text-transform:uppercase;
	text-align:center;
	background-color: <?php echo $ColorFirst; ?>;
	color: <?php echo $ColorSecond; ?>;
	font-family: <?php echo $HeaderFont; ?>;
	text-transform:uppercase;
}
#commentform input[type=submit]:hover{
	background-color: <?php echo $ColorThemeBgAlpha; ?>;
	color: <?php echo $ColorSecond; ?>;
}
@-moz-document url-prefix() {
	#commentform input[type=submit]{
		padding:0px 11px 1px 11px;
  }
}