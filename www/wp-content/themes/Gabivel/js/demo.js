// DEMO FUNCTIONS
var activeTheme = '/dark';
var themeVars = {'@ColorFirst' : '#89c8cb',
				'@ColorFirstAlpha' : 'rgba(137, 200, 203, .7)',
				'@ColorThemeBgAlpha' : 'rgba(0, 0, 0, .7)',
				'@ColorSecond' : '#ffffff',
				'@TextColor' : '#ffffff',
				'@BackgroundColor' : '#000000',
				'@ThemePrefix': "'"+activeTheme+"'"}
function changeTheme(tn){
	 $('#ThemeSwitch a').removeClass('selected');
	 $('#ThemeSwitch .'+tn).addClass('selected');
	 activeTheme = tn;
	 if(tn=='dark'){
		themeVars['@ColorSecond'] = 	'#FFFFFF';
		themeVars['@BackgroundColor'] =	'#000000';
		themeVars['@ThemePrefix'] = 	"'"+activeTheme+"'";
		themeVars['@ImagesDir'] = 		"'"+themeURL+'/images/'+"'";
		themeVars['@TextColor'] = 		'#FFFFFF';
		themeVars['@ColorThemeBgAlpha'] = 	'rgba(0, 0, 0, .7)';
		less.modifyVars(themeVars);
	}else{
		themeVars['@ColorSecond'] = 	'#4a4a4a';
		themeVars['@BackgroundColor'] =	'#ffffff';
		themeVars['@ThemePrefix'] = 	"'"+activeTheme+"'";
		themeVars['@ImagesDir'] = 		"'"+themeURL+'/images/'+"'";
		themeVars['@TextColor'] = 		'#575757';
		themeVars['@ColorThemeBgAlpha'] = 	'rgba(255, 255, 255, .7)';
		less.modifyVars(themeVars);
	}
}
  
function DrawPicker(pickerID){
	mobileDevice = false;
	if( navigator.userAgent.match(/Android/i) || 
		navigator.userAgent.match(/webOS/i) ||
		navigator.userAgent.match(/iPhone/i) ||
		navigator.userAgent.match(/iPad/i) ||
		navigator.userAgent.match(/iPod/i)
		) mobileDevice = true;

	if(!isCanvasSupported() || mobileDevice){
		$('#palette').hide();
		return false;
	}
	
    var ctx = document.getElementById(pickerID).getContext('2d');
    var img = new Image();
    img.src = themeURL+'/images/280.png';
    img.onload = function(){
		ctx.drawImage(img,0,0,150,150);
	}
	
	var defColor = $.cookie("defColor");
	var defColorA = $.cookie("defColorA");
	var defTheme = $.cookie("defTheme");
	var defPalette = $.cookie("defPalette");
	var defPaletteX = $.cookie("defPaletteX");
	var defPaletteY = $.cookie("defPaletteY");
	if(defColor!=null){
		setDemoColor(defColor, defColorA);
		setDemoColorPreview(defColor, defColorA);
	}
	if(defTheme)
		changeTheme(defTheme);
	if(defPalette=='hide')
		hidePalette();
	else if(defPalette==null){
		if((($(window).width()-940)/2)-40-$('#palette').width()<0){
			hidePalette();
		}
	}
	if(defPaletteX!=null && defPaletteY!=null){
		if(defPaletteX<20) defPaletteX = 20;
		if(defPaletteY<20) defPaletteY = 20;
		if(defPaletteX>$(window).width()) defPaletteX = $(window).width()-20;
		if(defPaletteY>$(window).height()) defPaletteY = $(window).height()-20;
		$('#palette').css({left:defPaletteX+'px', top:defPaletteY+'px'});
	}
	
	
	$('#paletteHeader .closeButton').click(hidePalette);
	$('#paletteHeader .openButton').click(showPalette);
	  
	$('#'+pickerID+', #colorPicker').bind('selectstart dragstart', rFalse);
	$('#'+pickerID+', #colorPicker').bind('mousedown', function(){
		$('#'+pickerID).bind('mousemove', {pickerID:pickerID},GetColor);
	});

	$('#'+pickerID+', #colorPicker').bind('mouseup', function(){
		$('#'+pickerID).unbind('mousemove', GetColor);
		$.cookie("defColor", $('#colorResult').html(), {path:'/'});
		$.cookie("defColorA", $('#colorResult').attr('rel'), {path:'/'});
		setDemoColor($('#colorResult').html(), $('#colorResult').attr('rel'));
	});
	
	$('#paletteHeader').bind('mousedown', function(e){
		$(document).bind('selectstart dragstart', rFalse);
		if(typeof document.body.style.MozUserSelect!="undefined") //Firefox route
		document.body.style.MozUserSelect="none";
		
		$(document).bind('mouseup', function(){
			$.cookie('defPaletteX', $('#palette').offset().left, {path:'/'});
			$.cookie('defPaletteY', $('#palette').offset().top, {path:'/'});
			$(document).unbind('selectstart dragstart', rFalse);
			$(document).unbind('mousemove', movePalette);
		});
		
		$(document).bind('mousemove', {fX:e.pageX, fY:e.pageY, pX:$('#palette').offset().left, pY:$('#palette').offset().top}, movePalette);
	});	 
}

function hidePalette(){
	$.cookie("defPalette", 'hide', {path:'/'});
	$('#paletteHeader .openButton').show();
	$('#paletteHeader .closeButton').hide();
	$('#paletteBody, #ThemeSwitch, #colorResult').hide();
}
function showPalette(){
	$.cookie("defPalette", 'show', {path:'/'});
	$('#paletteHeader .openButton').hide();
	$('#paletteHeader .closeButton').show();
	$('#paletteBody, #ThemeSwitch, #colorResult').show();
}

function setDemoColor(color, colora){
	themeVars['@ColorFirst'] =  color;
	themeVars['@ColorFirstAlpha'] = colora;
	themeVars['@ImagesDir'] = 		"'"+themeURL+'/images/'+"'";
	less.modifyVars(themeVars)
}
function setDemoColorPreview(color, colora){
	$('#colorResult').html(color);
    $('#colorResult').css('background-color', color);
    $('#colorResult').attr('rel', colora);
}

function movePalette(event){
	var x = (event.pageX-event.data.fX) + event.data.pX;
	var y = (event.pageY-event.data.fY) + event.data.pY;
	$('#palette').css({left:x+'px', top:y+'px'});
}
function GetColor(event){
        var x = event.pageX - $(event.currentTarget).parent().offset().left;
        var y = event.pageY - $(event.currentTarget).parent().offset().top;
        var ctx = document.getElementById(event.data.pickerID).getContext('2d');
        var imgd = ctx.getImageData(x, y, 1, 1);
        var data = imgd.data;
		$('#colorPicker').css({left:(x-5)+'px', top:(y-5)+'px'});
        var hexString = RGBtoHex(data[0],data[1],data[2]);
        setDemoColorPreview('#'+hexString, 'rgba('+data[0]+','+data[1]+','+data[2]+',.7)');
}
function RGBtoHex(R,G,B) {return toHex(R)+toHex(G)+toHex(B)}
function toHex(N) {
      if (N==null) return "00";
      N=parseInt(N); if (N==0 || isNaN(N)) return "00";
      N=Math.max(0,N); N=Math.min(N,255); N=Math.round(N);
      return "0123456789ABCDEF".charAt((N-N%16)/16)
           + "0123456789ABCDEF".charAt(N%16);
}
function rFalse(event){ return false; }
function isCanvasSupported(){
  var elem = document.createElement('canvas');
  return !!(elem.getContext && elem.getContext('2d'));
}