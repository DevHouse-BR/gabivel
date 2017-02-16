<?php

// options
$SettingsOptions = array(
	array(
		'id' => 'themecheck',
		'name'=>__('THEME CHECK','rb'),
		'type'=>'script',
		'imagemanager'=>'false',
		'icon'=>get_template_directory_uri().'/includes/adminimages/icon_themecheck.png',
		'run'=>'themeCheck'
	),
	array(
		'id' => 'setGeneral',
		'name'=>__('GENERAL SETTINGS','rb'),
		'type'=>'fields',
		'imagemanager'=>'true',
		'icon'=>get_template_directory_uri().'/includes/adminimages/icon_picker.png',
		'fields'=> array(
			array(
				'id'=>'logo',
				'name'=>__('Logo Url','rb'),
				'default'=> get_template_directory_uri().'/images/ghost_logo.png',
				'type'=>'url'
			),
			array(
				'id'=>'loading_logo_url',
				'name'=>__('Cover Image Url','rb'),
				'default'=> get_template_directory_uri().'/images/logo.jpg',
				'type'=>'url'
			),
			array(
				'id' => 'favicon',
				'name' => __('Favicon (.ico file)','rb'),
				'default' => get_template_directory_uri().'/images/favicon.ico',
				'type' => 'url'
			),
			array(
				'id' => 'btnSoundUrlMp3',
				'name' => __('Btn sound url (.mp3 file)','rb'),
				'default' => get_template_directory_uri().'/images/buttonsound.mp3',
				'type' => 'url'
			),
			array(
				'id' => 'btnSoundUrlOgg',
				'name' => __('Btn sound url (.ogg file)','rb'),
				'default' => get_template_directory_uri().'/images/buttonsound.ogg',
				'type' => 'url'
			),
			array(
				'id' => 'googlecode',
				'name' => __('Google Analytics Code','rb'),
				'default' => '',
				'type' => 'text'
			),
			array(
				'id' => 'copyrighttext',
				'name' => __('Footer Text','rb'),
				'default' => '',
				'type'=>'text'
			),
			array(
				'id' => 'sidebardefault',
				'name' => __('Default Sidebar Position on Page','rb'),
				'default' => 'Right',
				'options' => array(__('None','rb')=>'None', __('Left','rb')=>'Left', __('Right','rb')=>'Right'),
				'type' => 'select'
			),
			array(
				'id' => 'sidebarsingledefault',
				'name' => __('Default Sidebar Position on Post Detail','rb'),
				'default' => 'Right',
				'options' => array(__('None','rb')=>'None', __('Left','rb')=>'Left', __('Right','rb')=>'Right'),
				'type' => 'select'
			),
			array(
				'id' => 'useFrontPage',
				'name' => __('Enable to use a Front Page','rb'),
				'default' => 'false',
				'type'=>'onoff',
				'on'=>'true',
				'off'=>'false'
			),
			array(
				'id' => 'twitterEnable',
				'name' => __('Twitter Enable on Footer','rb'),
				'default' => 'false',
				'type'=>'onoff',
				'on'=>'true',
				'off'=>'false'
			),
			array(
				'id' => 'twitterUser',
				'name' => __('Twitter User Name','rb'),
				'default' => '',
				'type'=>'text'
			),
			array(
				'id' => 'twitterCount',
				'name' => __('Tweet Count','rb'),
				'default' => '5',
				'type'=>'integer'
			)
		)
	),
	array(
		'id' => 'interface',
		'name'=>__('INTERFACE OPTIONS','rb'),
		'type'=>'fields',
		'imagemanager'=>'false',
		'icon'=>get_template_directory_uri().'/includes/adminimages/icon_interface.png',
		'fields'=> array(
			array(
				'id' => 'ghostMode',
				'name' => __('Gabivel Mode Enable','rb'),
				'default' => 'false',
				'type'=>'onoff',
				'on'=>'true',
				'off'=>'false'
			),
			array(
				'id' => 'ghostModeText',
				'name' => __('Gabivel Mode Active Text Enable','rb'),
				'default' => 'true',
				'type'=>'onoff',
				'on'=>'true',
				'off'=>'false'
			),
			array(
				'id' => 'ghostModeTime',
				'name' => __('Gabivel Mode Time','rb'),
				'default' => '5000',
				'type'=>'integer',
				'after'=>' ms'
			),
			array(
				'id' => 'menuAlwaysOpen',
				'name' => __('Menu Always Open','rb'),
				'default' => 'false',
				'type'=>'onoff',
				'on'=>'true',
				'off'=>'false'
			),
			array(
				'id' => 'menuAlwaysOpenMobile',
				'name' => __('Menu Always Open Mobile','rb'),
				'default' => 'true',
				'type'=>'onoff',
				'on'=>'true',
				'off'=>'false'
			),
			array(
				'id' => 'bgAniTime',
				'name' => __('Bg Animation Time','rb'),
				'default' => '6000',
				'type'=>'integer',
				'after'=>' ms'
			),
			array(
				'id' => 'historyApiEnable',
				'name' => __('History Api Enable','rb'),
				'default' => 'true',
				'type'=>'onoff',
				'on'=>'true',
				'off'=>'false'
			),
			array(
				'id' => 'bgPaused',
				'name' => __('Bg Animation Paused','rb'),
				'default' => 'false',
				'type'=>'onoff',
				'on'=>'true',
				'off'=>'false'
			),
			array(
				'id' => 'menuDelay',
				'name' => __('Bg Animation Paused','rb'),
				'default' => '500',
				'type'=>'integer',
				'after'=>' ms'
			),
			array(
				'id' => 'autoPlay',
				'name' => __('Bg Audio Auto Play','rb'),
				'default' => 'false',//
				'type'=>'onoff',
				'on'=>'true',
				'off'=>'false'
			),
			array(
				'id' => 'loop',
				'name' => __('Bg Audio Loop','rb'),
				'default' => 'false',
				'type'=>'onoff',
				'on'=>'true',
				'off'=>'false'
			),
			array(
				'id' => 'bgNormalFade',
				'name' => __('Bg Normal Fade Animation','rb'),
				'default' => 'false',
				'type'=>'onoff',
				'on'=>'true',
				'off'=>'false'
			),
			array(
				'id' => 'videoSkipMobile',
				'name' => __('Bg Videos Skip on Mobile','rb'),
				'default' => 'true',
				'type'=>'onoff',
				'on'=>'true',
				'off'=>'false'
			),
			array(
				'id' => 'videoLoop',
				'name' => __('Bg Video Loop','rb'),
				'default' => 'false',
				'type'=>'onoff',
				'on'=>'true',
				'off'=>'false'
			),
			array(
				'id' => 'muteWhilePlayVideo',
				'name' => __('Bg Audio Mute While Play Video','rb'),
				'default' => 'false',
				'type'=>'onoff',
				'on'=>'true',
				'off'=>'false'
			),
			array(
				'id' => 'videoMuted',
				'name' => __('Bg Video Muted','rb'),
				'default' => 'false',
				'type'=>'onoff',
				'on'=>'true',
				'off'=>'false'
			),
			array(
				'id' => 'loopBg',
				'name' => __('Bg Items Loop','rb'),
				'default' => 'false',
				'type'=>'onoff',
				'on'=>'true',
				'off'=>'false'
			),
			array(
				'id' => 'bgPattern',
				'name' => __('Bg Pattern','rb'),
				'default' => 'block',
				'type'=>'onoff',
				'on'=>'block',
				'off'=>'none'
			),
			array(
				'id' => 'videoPaused',
				'name' => __('Bg Video Paused','rb'),
				'default' => 'false',
				'type'=>'onoff',
				'on'=>'true',
				'off'=>'false'
			),
			array(
				'id' => 'mediaStretch',
				'name' => __('Bg Items Stretch','rb'),
				'default' => 'true', 
				'type'=>'onoff',
				'on'=>'true',
				'off'=>'false'
			)
		)
	),
	array(
		'id' => 'style',
		'name'=>__('STYLE OPTIONS','rb'),
		'type'=>'fields',
		'imagemanager'=>'true',
		'icon'=>get_template_directory_uri().'/includes/adminimages/icon_generalsettings.png',
		'fields'=> array(
			array(
				'id' => 'theme_style',
				'name' => __('Theme Style','rb'),
				'default' => 'dark',
				'type'=>'select',
				'options'=>array(__('Light','rb')=>'light', __('Dark','rb')=>'dark')
			),
			array(
				'id' => 'colorFirst',
				'name' => __('First Color','rb'),
				'default' => '89c8cb',
				'type'=>'color'
			),
			array(
				'id' => 'colorInverse',
				'name' => __('First Color Inverse','rb'),
				'default' => 'ffffff',
				'type'=>'color'
			),
			array(
				'id'=>'colorSecond',
				'name'=>__('Color Second','rb'),
				'default'=> 'ffffff',
				'type'=>'color'
			),
			array(
				'id'=>'colorBackground',
				'name'=>__('Background Color','rb'),
				'default'=> '000000',
				'type'=>'color'
			)
		)
	),
	array(
		'id' => 'textoptions',
		'name'=>__('TEXT OPTIONS','rb'),
		'type'=>'fields',
		'imagemanager'=>'false',
		'icon'=>get_template_directory_uri().'/includes/adminimages/icon_textoptions.png',
		'fields'=> array(
			array(
				'id' => 'colorFont',
				'name' => __('Font Color','rb'),
				'default' => 'ffffff',
				'type'=>'color'
			),
			array(
				'id' => 'headerFont',
				'name' => __('Header Font','rb'),
				'default' => 'Hammersmith One',
				'type'=>'font'
			),
			array(
				'id' => 'contentFont',
				'name' => __('Content Font','rb'),
				'default' => 'PT Sans',
				'type'=>'font'
			),
			array(
				'id' => 'contentFontSize',
				'name' => __('Content Font','rb'),
				'default' => '14',
				'type'=>'integer',
				'after'=>' px'
			),
			array(
				'id' => 'menuHeaderFontSize',
				'name' => __('Menu Header Text Size','rb'),
				'default' => '14',
				'type'=>'integer',
				'after'=>' px'
			),	
			array(
				'id' => 'menuFontSize',
				'name' => __('Menu Text Size','rb'),
				'default' => '14',
				'type'=>'integer',
				'after'=>' px'
			),
			array(
				'id' => 'h1FontSize',
				'name' => __('H1 Text Size','rb'),
				'default' => '24',
				'type'=>'integer',
				'after'=>' px'
			),
			array(
				'id' => 'h2FontSize',
				'name' => __('H2 Text Size','rb'),
				'default' => '20',
				'type'=>'integer',
				'after'=>' px'
			),
			array(
				'id' => 'h3FontSize',
				'name' => __('H3 Text Size','rb'),
				'default' => '18',
				'type'=>'integer',
				'after'=>' px'
			),
			array(
				'id' => 'h4FontSize',
				'name' => __('H4 Text Size','rb'),
				'default' => '16',
				'type'=>'integer',
				'after'=>' px'
			),
			array(
				'id' => 'h5FontSize',
				'name' => __('H5 Text Size','rb'),
				'default' => '14',
				'type'=>'integer',
				'after'=>' px'
			),
			array(
				'id' => 'h6FontSize',
				'name' => __('H6 Text Size','rb'),
				'default' => '12',
				'type'=>'integer',
				'after'=>' px'
			)
		)
	),
	array(
		'id' => 'gallerymanager',
		'name'=>__('GALLERY MANAGER','rb'),
		'imagemanager'=>'false',
		'icon'=>get_template_directory_uri().'/includes/adminimages/icon_gallerymanager.png',
		'type'=>'script',
		'run'=>'getGalleriesList'
	),
	array(
		'id' => 'audiomanager',
		'name'=>__('AUDIO MANAGER','rb'),
		'imagemanager'=>'false',
		'icon'=>get_template_directory_uri().'/includes/adminimages/icon_audiomanager.png',
		'type'=>'script',
		'run'=>'getAudioManager'
	),
	array(
		'id' => 'help',
		'imagemanager'=>'false',
		'icon'=>get_template_directory_uri().'/includes/adminimages/icon_help.png',
		'name'=>__('HELP','rb'),
		'type'=>'area'
	)
);

?>