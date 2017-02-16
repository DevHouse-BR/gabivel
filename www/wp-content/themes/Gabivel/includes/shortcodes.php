<?php   
include('blog-sh.php');
include('gallery-sh.php');
include('portfolio-sh.php');

$shorcodesUsage = array();
$shorcodesUsage['text'][] = array(  
                'code'=>'highlight', 
                'name'=>'Highlight', 
                'content'=>true
            );
$shorcodesUsage['other'][] = array(
                'code'=>'person_info', 
                'name'=>'Personel Information', 
                'content'=>false,
                'params' => array(
                    'name' =>  array(
                        'name' => 'Name',
                        'required' => false,
                        'type' => 'string'
                    ),
                    'title' =>  array(
                        'required' => false,
                        'type' => 'string'
                    ),
                    'twitter' =>  array(
                        'required' => false,
                        'type' => 'string'
                    ),
                    'facebook' =>  array(
                        'required' => false,
                        'type' => 'string'
                    ),
                    'email' =>  array(
                        'required' => false,
                        'type' => 'string'
                    )
                )
            );
$shorcodesUsage['text'][] = array(  
                'code'=>'dropcap', 
                'name'=>'Dropcap', 
                'content'=>true
            );

add_shortcode('flexslider', 'sh_flexslider');
function sh_flexslider($attr, $content=null){
    global $wpdb;
    $height = 0;
    $useResizer = true;
    $styleAdd = '';
    if(@!empty($attr['height']))
        $height = (int)$attr['height'];
    if(@!empty($attr['style']))
        $styleAdd = 'style="'.$attr['style'].'"';
    $heightAdd = '';
    if($height>0){
        $heightAdd = '&amp;h='.$height;
        $heightAddDiv = 'style="height:'.$height.'px; overflow:hidden;"';
    }
    if(@$attr['resizer']=='false')
        $useResizer = false;
        
    $randomId = createRandomKey(6);
    $re = '';
    $result = $wpdb->get_results("SELECT IMAGEID, TYPE, CONTENT, THUMB, CAPTION, DESCRIPTION, WIDTH, HEIGHT FROM {$wpdb->prefix}backgrounds WHERE GALLERYID in (".$attr['id'].") ORDER BY SLIDERORDER");
    $re .= '<div class="flexslider" '.$styleAdd.'>
        <ul class="slides">';
    foreach($result as $row){
        if($row->TYPE=='image'){
            $re .= '<li>';
            if($useResizer)
                $re .= '<img src="'.get_template_directory_uri().'/includes/timthumb.php?src='.$row->CONTENT.'&amp;w=940'.$heightAdd.'&amp;zc=1&amp;q=100" />';
            else
                $re .= '<img src="'.$row->CONTENT.'" />';
            if(!empty($row->CONTENT))
                $re .= '<p class="flex-caption">'.htmlentities(stripslashes($row->CAPTION), ENT_QUOTES, "UTF-8").'</p>';
            $re .= '</li>';
        }
        elseif($row->TYPE=='vimeo'){
            $re .=  '<li><div '.$heightAddDiv.'>';
            if($height==0)
                $re .= '<iframe src="http://player.vimeo.com/video/'.$row->CONTENT.'?title=0&amp;byline=0&amp;portrait=0&amp;color=7d7d7d" width="'.$row->WIDTH.'" height="'.$row->HEIGHT.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
            else
                $re .= '<iframe src="http://player.vimeo.com/video/'.$row->CONTENT.'?title=0&amp;byline=0&amp;portrait=0&amp;color=7d7d7d" width="100%" height="100%" frameborder="0" class="noVideoFit" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
            $re .= '</div></li>';
        }
        elseif($row->TYPE=='youtube'){
            $re .=  '<li><div '.$heightAddDiv.'>';
            if($height==0)
                $re .= '<iframe width="'.$row->WIDTH.'" height="'.$row->HEIGHT.'" src="http://www.youtube.com/embed/'.$row->CONTENT.'?wmode=transparent&amp;rel=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowfullscreen></iframe>';
            else
                $re .= '<iframe width="100%" height="100%" src="http://www.youtube.com/embed/'.$row->CONTENT.'?wmode=transparent&amp;rel=0" frameborder="0" class="noVideoFit" webkitAllowFullScreen mozallowfullscreen allowfullscreen></iframe>';
            $re .= '</div></li>';
        }elseif($row->TYPE=='selfhosted')
            $re .= '<li>'.stripslashes($row->CONTENT).'</li>';
    }
    $re .= '</ul>
        </div>';
    return $re;
}
            
add_shortcode('person_info', 'sh_person_info');
function sh_person_info($attr, $content=null){
    $re = '<div class="personInfo">';
    if($attr['src'])
        $re .= '<img src="'.$attr['src'].'" title="'.$attr['name'].'" />';
    $re .= '<div class="personName">
        <h3>'.$attr['name'].'</h3>
        <span>'.$attr['title'].'</span>';
        
    $re.=' <div class="personContact">';
        if(@!empty($attr['twitter']))
            $re.='<a class="tip personTwitter" target="_blank" href="http://twitter.com/'.$attr['twitter'].'" rel="@'.$attr['twitter'].'"/></a>';
        if(@!empty($attr['facebook']))
            $re.='<a class="tip personFacebook" target="_blank" href="http://fb.me/'.$attr['facebook'].'" rel="fb.me/'.$attr['facebook'].'"/></a>';
        if(@!empty($attr['email']))
            $re.='<a class="tip personEmail" target="_blank" href="mailto:'.$attr['email'].'" rel="'.$attr['email'].'"/></a>';
    $re .= '</div>'; //end of personContact
        
    $re.= '</div>'; // end of personName
    $re.= '</div>'; // end of personInfo
    return $re;
}

add_shortcode('highlight', 'sh_highlight');
function sh_highlight($attr, $content=null){
    return '<span class="highlight">'.$content.'</span>';
}

add_shortcode('video ', 'sh_video');
function sh_video($attr, $content=null){
    
    $sourceStr = getSource( $attr['url'], $attr['width'], $attr['height']);
    
    $imgW = (int) $attr['width'];
    $imgH = (int) $attr['height'];
    return $sourceStr;      
}

add_shortcode('list_two', 'sh_list_two');
function sh_list_two($attr, $content=null){
    $re = '<div class="list_two">'.do_shortcode($content).'</div>';
    return $re;
}

add_shortcode('list_item', 'sh_list_item');
function sh_list_item($attr, $content=null){
    $re = '<div class="item_two_one">'.$attr['title'].'</div>';
    $re .= '<div class="item_two_two">';
    
    if(!empty($attr['type']))
    {
        if($attr['type']=='url')
            $re.='<a class="nolink" href="'.$content.'" target="_blank">'.$content.'</a>';
        elseif($attr['type']=='email')
            $re.='<a class="nolink" href="mailto:'.$content.'" >'.$content.'</a>';
    }
    else
        $re .= $content;
    
    $re .= '</div>';
    return $re;
}

add_shortcode('form', 'sh_form');
function sh_form($attr, $content=null)
{
    $class='form_'.createRandomKey(5);
    $re ='<div class="'.$class.' contactForm dform">
            <form>
            '.do_shortcode($content);
    
    if(!empty($attr['secure']))
    {
        $r1 = rand(0,9);
        $r2 = rand(0,9);
        $re.='<p>
                <input type="hidden" name="s1" value="'.$r1.'" /> 
                <input type="hidden" name="s2" value="'.$r2.'" /> 
                <label for="sec">'.$r1.'+'.$r2.'=</label><div class="dFormInput" style="width:50px"><input  type="text" id="s" name="s" class="required" value="" /></div></p>';
    }
    
    $re .= '<p><label for="submit">&nbsp;</label><div class="form_input">';
    $re .= '<a class="nolink submitButton" onclick="javascript:$(\'.'.$class.' form\').submit();" href="javascript:void(0);">'. __('Enviar »','rb').'</a>';
    $re .= '</div></p>
            </form>
            </div>';
    $re .= '<script>
    $(\'#contentBox\').ready(function(){
        $(".'.$class.' form").validate({
          errorPlacement: function(error, element) {
             error.appendTo(element.parent("div").next() );
           }
         });
        $(".'.$class.' form").submit(function(){
            if($(".'.$class.' form").valid())
            {
                var formdata = $(".'.$class.' form").serialize();
                $(".'.$class.' form").slideUp();
                $(".'.$class.'").append("<div class=\"form_message\">Please wait...</div>").find("div.form_message").slideDown("slow");
                $.post("'.get_template_directory_uri().'/includes/form-sender.php'.'", formdata, function(data){
                    data = $.parseJSON(data); 
                    if(data.status=="OK")
                    {
                        $(".'.$class.' .form_message").html("Your message has been send successfuly.");
                    }
                    else
                    {
                        alert(data.ERR);
                        $(".'.$class.' form").slideDown();
                        $(".'.$class.' .form_message").remove();
                    }
                });
            }else
                alert("Please fill all required fields.");
            return false;
        });
    });
    </script>';
    
    return $re;
}

add_shortcode('form_item', 'sh_form_item');
function sh_form_item($attr, $content=null)
{
    $type='text';
    $re = '';
    $re.= '<p><label for="'.$attr['name'].'" >'.$attr['title'].'</label>';
    $re.='<input type="hidden" id="'.$attr['name'].'_title" name="title[]" value="'.$attr['title'].'" />';
    $re.='<input type="hidden" id="'.$attr['name'].'_key" name="key[]" value="'.$attr['name'].'" />';
    if(!empty($attr['type']))
        $type = $attr['type'];
    
    $re .='</p><div class="dFormInput">';
    $class = '';
    
    if(!empty($attr['validate']))
        $class = $attr['validate'];
    
    if($type=='text')
        $re.='<input class="'.$class.'" id="'.$attr['name'].'" type="text" name="'.$attr['name'].'" />';
    elseif($type=='textarea')
        $re.='<textarea class="'.$class.'" id="'.$attr['name'].'" name="'.$attr['name'].'" ></textarea>';
    elseif($type=='checkbox')
        $re.='<input class="'.$class.'" id="'.$attr['name'].'"  type="checkbox" name="'.$attr['name'].'" />';
    elseif($type=='select')
    {
        $re.='<select class="'.$class.'" id="'.$attr['name'].'" name="'.$attr['name'].'" >';
        $vals = explode(',',$attr['values']);
        foreach($vals as $val)
            $re.='<option>'.trim($val).'</option>';
        $re.='</select>';
    }
    $re .='</div>';
    $re.="</p>\n\n";
    
    return $re;
}

add_shortcode('map','sh_map');
function sh_map($attr, $content=null) //latlng -34.397, 150.644
{
$content = trim($content); 
//defaults
$width = '500px';
$height = '500px;';
$zoom = 11; // 0,7 to 18
$sensor = 'true'; 
$controls = 'false';
$type = 'HYBRID '; // ROADMAP | SATELLITE | TERRAIN 
$marker = '';
$marker_icon = '';
if(!empty($attr['zoom']))
    $zoom = $attr['zoom'];
if(!empty($attr['sensor']))
    $sensor = $attr['sensor'];
if(!empty($attr['nocontrols']))
    $controls = $attr['nocontrols'];
if(!empty($attr['type']))
    $type = $attr['type'];
if(!empty($attr['width']))
    $width = $attr['width'];
if(!empty($attr['height']))
    $height = $attr['height'];

$mapID = createRandomKey(5); 
if(!empty($attr['marker']) || !empty($content))
{
    if(!empty($attr['marker_icon']))
        $marker_icon = ', icon:\''.$attr['marker_icon'].'\'';
        
    $marker = 'var marker'.$mapID.' = new google.maps.Marker({map: mapObj'.$mapID.', 
        position: mapObj'.$mapID.'.getCenter()
        '.$marker_icon.'
        });';
        
    if(!empty($content))
    {
        
        $marker .= '
        var infowindow'.$mapID.' = new google.maps.InfoWindow();
        infowindow'.$mapID.'.setContent(\''.$content.'\');
        google.maps.event.addListener(marker'.$mapID.', \'click\', function() {
                infowindow'.$mapID.'.open(mapObj'.$mapID.',  marker'.$mapID.');
        });';
    }
    
}
$re = ' 
<script type="text/javascript">
$(document).bind(\'contentPageReady\', function(){
    var latlng = new google.maps.LatLng('.$attr['lat'].', '.$attr['lng'].');
    var myOptions = {
      zoom: '.$zoom.',
      disableDefaultUI: '.$controls.',
      center: latlng,
      mapTypeId: google.maps.MapTypeId.'.$type.'
    };
    var mapObj'.$mapID.' = new google.maps.Map(document.getElementById("map'.$mapID.'"), myOptions);
    '.$marker.'
});
</script>
<div id="map'.$mapID.'" class="mapContact" style="width:'.$width.'; height:'.$height.'"></div>
';

return $re;
}


function createRandomKey($amount){
    $keyset  = "abcdefghijklmABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $randkey = "";
    for ($i=0; $i<$amount; $i++)
        $randkey .= substr($keyset, rand(0, strlen($keyset)-1), 1);
    return $randkey;    
}


function sh_toggle($attr, $content=null){
    $style='';
    if(!empty($attr['width']))
        $style = ' style="width:'.$attr['width'].'px"';
    return '<div '.$style.' class="sh_toggle"><div class="sh_toggle_text"><a class="nolink" href="javascript:void(0);">'.$attr['title'].'</a></div><div class="sh_toggle_content">'.do_shortcode($content).'</div></div>';
}
add_shortcode('toggle','sh_toggle');

function sh_divider($attr, $content=null){
    $style="";
    if(@!empty($attr['height']))
        $style = ' style="height:'.$attr['height'].'px" ';
    return '<div class="divider" '.$style.'></div>';
}
add_shortcode('divider','sh_divider');

function sh_vdivider($attr, $content=null){
    $style="";
    if(@!empty($attr['width']))
        $style = ' style="width:'.$attr['width'].'px" ';
    return '<div class="vericaldivider" '.$style.'></div>';
}
add_shortcode('vdivider','sh_vdivider');



function sh_seperator($attr, $content=null){
    $style = '';
    if(@!empty($attr['style']))
        $style = 'style="'.$attr['style'].'" ';
    return '<hr class="seperator" '.$style.'/>';
}
add_shortcode('seperator','sh_seperator'); 

function sh_list($attr, $content=null){
    $icon = '';
    if(!empty($attr['icon']))
    {
        $icon = ' style="background:url(\''.get_template_directory_uri().'/icons/'.$attr['icon'].'.gif\') no-repeat scroll left 0px transparent;"';
        $content = str_replace('<li>', '<li '.$icon.'>', $content);
    }
    return '<ul class="sh_list" >'.do_shortcode($content).'</ul>';
}
add_shortcode('list','sh_list'); 

function sh_dropcap($attr, $content=null){
    return '<div class="dropcap">'.do_shortcode($content).'</div>';
}
add_shortcode('dropcap','sh_dropcap'); 

function sh_quotes_one($attr, $content=null){
    return '<div class="quotes-one">'.do_shortcode($content).'</div>';
}
add_shortcode('quotes_one','sh_quotes_one'); 

function sh_quotes_two($attr, $content=null){
    $style = "";
    $addClass = "";
    if(@!empty($attr['align']))
        $addClass = $attr['align'];
    if(@!empty($attr['style']))
        $style = 'style='.$attr['style'];
    return '<div class="quotes-two '.$addClass.'" '.$style.'>'.do_shortcode($content).'</div>';
}
add_shortcode('quotes_two','sh_quotes_two'); 


function sh_quotes_writer($attr, $content=null){
    return '<div class="quotes-writer">'.do_shortcode($content).'</div>';
}
add_shortcode('quotes_writer','sh_quotes_writer'); 


function sh_code($attr, $content = null){
    return '
    <pre>'.htmlspecialchars($content).'</pre>';
}
add_shortcode('code', 'sh_code');

function sh_button($attr, $content = null)
{
    $size = 'small';
    $color = 'black';
    $target = '';
    $url = '#';
    if(@!empty($attr['size']))
        $size = strtolower($attr['size']);
    if(@!empty($attr['color']))
        $color = strtolower($attr['color']);
    if(@!empty($attr['url']))
        $url = $attr['url'];
    if(@!empty($attr['target']))
        $target = 'target="'.$attr['target'].'" ';
    $box = '<div class="button'.ucfirst($size).' '.$size.ucfirst($color).'"><a href="'.$url.'" '.$target.'>'.$content.'</a><span></span></div>';
    return do_shortcode($box);
}
add_shortcode('button','sh_button');

function sh_message($attr, $content=null){
    $type="infobox";
    if(@!empty($attr['type']))
        $type = $attr['type'];
    return '<div class="'.$type.'">'.do_shortcode($content).'</div>';
}
add_shortcode('message','sh_message'); 

function sh_tip($attr, $content=null){
    return '<a href="#" class="tip" rel="'.$attr['text'].'">'.do_shortcode($content).'</a>';
}
add_shortcode('tip','sh_tip'); 

function sh_box($attr, $content = null)
{
    $style='padding:20px; margin:10px 0; ';
    $style_in ='';
    if(!empty($attr['width']))
        $style .= 'width:'.$attr['width'].'; ';
    else
        $style .= '';
        
    if(!empty($attr['height']))
        $style .= 'height:'.$attr['height'].'; ';
    else
        $style .= '';
    
    if(!empty($attr['align']))
    {
        if($attr['align']=='center')
            $style.='margin:0 auto 0 auto; ';
        elseif($attr['align']=='right')
            $style.='margin:10px 0 10px auto; ';
    }
    
    if(!empty($attr['textcolor']))
    {
        $style_in.='color:'.$attr['textcolor'].'; ';
    }else{
        $style_in.='color:#'.opt('colorFont',"").'; ';
    }
    
    if(empty($attr['border']))
    {
        if(!empty($attr['bordercolor']))
        {
            $style.='border:1px solid '.$attr['bordercolor'].'; ';
        }
    }else{
        // advanced usage
        $style.=$attr['border'].'; ';
    }
    
    if(empty($attr['background']))
    {
        if(!empty($attr['bgcolor']))
        {
            $style.='background-color:'.$attr['bgcolor'].'; ';
        }
    }else{
        // advanced usage
        $style.='background:'.$attr['background'].'; ';
    }
    
    $boxinsideClass = 'boxinside';
    if(!empty($attr['icon']))
    {
        $style_in .= 'padding-left:70px; ';
        $style_in .= 'background:url(\''.get_template_directory_uri().'/icons/'.$attr['icon'].'.png\') no-repeat left top; ';
    }else{
        $boxinsideClass = 'boxinsideNoicon';
    }
    
    $cornerData='';
    $cornerClass='';
    if(!empty($attr['corner']))
    {
        $cornerData = 'data-corner="'.$attr['corner'].'"';
        $cornerClass = ' corner ';
    }
    
    return '<div '.$cornerData.' class="box '.$cornerClass.' " style="'.$style.'"><div class="'.$boxinsideClass.'" style="'.$style_in.'">'.do_shortcode($content).'<div class="clearfix"></div></div></div>';
}
add_shortcode('box','sh_box');

/* Columns Codes **/
function sh_1of1($attr, $content = null){
    return '<div class="c1of1">'.do_shortcode($content).'</div>';
}
add_shortcode('1of1', 'sh_1of1');

function sh_1of2($attr, $content = null){
    return '<div class="c1of2">'.do_shortcode($content).'</div>';
}
add_shortcode('1of2', 'sh_1of2');

function sh_1of2_end($attr, $content = null){
    return '<div class="c1of2_end">'.do_shortcode($content).'</div>';
}
add_shortcode('1of2_end', 'sh_1of2_end');

function sh_1of3($attr, $content = null){
    return '<div class="c1of3">'.do_shortcode($content).'</div>';
}
add_shortcode('1of3', 'sh_1of3');

function sh_1of3_end($attr, $content = null){
    return '<div class="c1of3_end">'.do_shortcode($content).'</div>';
}
add_shortcode('1of3_end', 'sh_1of3_end');

function sh_2of3($attr, $content = null){
    return '<div class="c2of3">'.do_shortcode($content).'</div>';
}
add_shortcode('2of3', 'sh_2of3');

function sh_2of3_end($attr, $content = null){
    return '<div class="c2of3_end">'.do_shortcode($content).'</div>';
}
add_shortcode('2of3_end', 'sh_2of3_end');

function sh_1of4($attr, $content = null){   return '<div class="c1of4">'.do_shortcode($content).'</div>'; }
add_shortcode('1of4', 'sh_1of4');
function sh_1of4_end($attr, $content = null){   return '<div class="c1of4_end">'.do_shortcode($content).'</div>'; }
add_shortcode('1of4_end', 'sh_1of4_end');
function sh_2of4($attr, $content = null){   return '<div class="c2of4">'.do_shortcode($content).'</div>'; }
add_shortcode('2of4', 'sh_2of4');
function sh_2of4_end($attr, $content = null){   return '<div class="c2of4_end">'.do_shortcode($content).'</div>'; }
add_shortcode('2of4_end', 'sh_2of4_end');
function sh_3of4($attr, $content = null){   return '<div class="c3of4">'.do_shortcode($content).'</div>'; }
add_shortcode('3of4', 'sh_3of4');
function sh_3of4_end($attr, $content = null){   return '<div class="c3of4_end">'.do_shortcode($content).'</div>'; }
add_shortcode('3of4_end', 'sh_3of4_end');

function sh_1of5($attr, $content = null){   return '<div class="c1of5">'.do_shortcode($content).'</div>'; }
add_shortcode('1of5', 'sh_1of5');
function sh_1of5_end($attr, $content = null){   return '<div class="c1of5_end">'.do_shortcode($content).'</div>'; }
add_shortcode('1of5_end', 'sh_1of5_end');
function sh_2of5($attr, $content = null){   return '<div class="c2of5">'.do_shortcode($content).'</div>'; }
add_shortcode('2of5', 'sh_2of5');
function sh_2of5_end($attr, $content = null){   return '<div class="c2of5_end">'.do_shortcode($content).'</div>'; }
add_shortcode('2of5_end', 'sh_2of5_end');
function sh_3of5($attr, $content = null){   return '<div class="c3of5">'.do_shortcode($content).'</div>'; }
add_shortcode('3of5', 'sh_3of5');
function sh_3of5_end($attr, $content = null){   return '<div class="c3of5_end">'.do_shortcode($content).'</div>'; }
add_shortcode('3of5_end', 'sh_3of5_end');
function sh_4of5($attr, $content = null){   return '<div class="c4of5">'.do_shortcode($content).'</div>'; }
add_shortcode('4of5', 'sh_4of5');
function sh_4of5_end($attr, $content = null){   return '<div class="c4of5_end">'.do_shortcode($content).'</div>'; }
add_shortcode('4of5_end', 'sh_4of5_end');

function sh_1of6($attr, $content = null){   return '<div class="c1of6">'.do_shortcode($content).'</div>'; }
add_shortcode('1of6', 'sh_1of6');
function sh_1of6_end($attr, $content = null){   return '<div class="c1of6_end">'.do_shortcode($content).'</div>'; }
add_shortcode('1of6_end', 'sh_1of6_end');
function sh_2of6($attr, $content = null){   return '<div class="c2of6">'.do_shortcode($content).'</div>'; }
add_shortcode('2of6', 'sh_2of6');
function sh_2of6_end($attr, $content = null){   return '<div class="c2of6_end">'.do_shortcode($content).'</div>'; }
add_shortcode('2of6_end', 'sh_2of6_end');
function sh_3of6($attr, $content = null){   return '<div class="c3of6">'.do_shortcode($content).'</div>'; }
add_shortcode('3of6', 'sh_3of6');
function sh_3of6_end($attr, $content = null){   return '<div class="c3of6_end">'.do_shortcode($content).'</div>'; }
add_shortcode('3of6_end', 'sh_3of6_end');
function sh_4of6($attr, $content = null){   return '<div class="c4of6">'.do_shortcode($content).'</div>'; }
add_shortcode('4of6', 'sh_4of6');
function sh_4of6_end($attr, $content = null){   return '<div class="c4of6_end">'.do_shortcode($content).'</div>'; }
add_shortcode('4of6_end', 'sh_4of6_end');
function sh_5of6($attr, $content = null){   return '<div class="c5of6">'.do_shortcode($content).'</div>'; }
add_shortcode('5of6', 'sh_5of6');
function sh_5of6_end($attr, $content = null){   return '<div class="c5of6_end">'.do_shortcode($content).'</div>'; }
add_shortcode('5of6_end', 'sh_5of6_end');


function sh_1of12($attr, $content = null){  return '<div class="c1of12">'.do_shortcode($content).'</div>'; }
add_shortcode('1of12', 'sh_1of12');
function sh_1of12_end($attr, $content = null){  return '<div class="c1of12_end">'.do_shortcode($content).'</div>'; }
add_shortcode('1of12_end', 'sh_1of12_end');

function sh_2of12($attr, $content = null){  return '<div class="c2of12">'.do_shortcode($content).'</div>'; }
add_shortcode('2of12', 'sh_2of12');
function sh_2of12_end($attr, $content = null){  return '<div class="c2of12_end">'.do_shortcode($content).'</div>'; }
add_shortcode('2of12_end', 'sh_2of12_end');

function sh_3of12($attr, $content = null){  return '<div class="c3of12">'.do_shortcode($content).'</div>'; }
add_shortcode('3of12', 'sh_3of12');
function sh_3of12_end($attr, $content = null){  return '<div class="c3of12_end">'.do_shortcode($content).'</div>'; }
add_shortcode('3of12_end', 'sh_3of12_end');

function sh_4of12($attr, $content = null){  return '<div class="c4of12">'.do_shortcode($content).'</div>'; }
add_shortcode('4of12', 'sh_4of12');
function sh_4of12_end($attr, $content = null){  return '<div class="c4of12_end">'.do_shortcode($content).'</div>'; }
add_shortcode('4of12_end', 'sh_4of12_end');

function sh_5of12($attr, $content = null){  return '<div class="c5of12">'.do_shortcode($content).'</div>'; }
add_shortcode('5of12', 'sh_5of12');
function sh_5of12_end($attr, $content = null){  return '<div class="c5of12_end">'.do_shortcode($content).'</div>'; }
add_shortcode('5of12_end', 'sh_5of12_end');

function sh_6of12($attr, $content = null){  return '<div class="c6of12">'.do_shortcode($content).'</div>'; }
add_shortcode('6of12', 'sh_6of12');
function sh_6of12_end($attr, $content = null){  return '<div class="c6of12_end">'.do_shortcode($content).'</div>'; }
add_shortcode('6of12_end', 'sh_6of12_end');

function sh_7of12($attr, $content = null){  return '<div class="c7of12">'.do_shortcode($content).'</div>'; }
add_shortcode('7of12', 'sh_7of12');
function sh_7of12_end($attr, $content = null){  return '<div class="c7of12_end">'.do_shortcode($content).'</div>'; }
add_shortcode('7of12_end', 'sh_7of12_end');

function sh_8of12($attr, $content = null){  return '<div class="c8of12">'.do_shortcode($content).'</div>'; }
add_shortcode('8of12', 'sh_8of12');
function sh_8of12_end($attr, $content = null){  return '<div class="c8of12_end">'.do_shortcode($content).'</div>'; }
add_shortcode('8of12_end', 'sh81of12_end');

function sh_9of12($attr, $content = null){  return '<div class="c9of12">'.do_shortcode($content).'</div>'; }
add_shortcode('9of12', 'sh_9of12');
function sh_9of12_end($attr, $content = null){  return '<div class="c9of12_end">'.do_shortcode($content).'</div>'; }
add_shortcode('9of12_end', 'sh_9of12_end');

function sh_10of12($attr, $content = null){     return '<div class="c10of12">'.do_shortcode($content).'</div>'; }
add_shortcode('10of12', 'sh_10of12');
function sh_10of12_end($attr, $content = null){     return '<div class="c10of12_end">'.do_shortcode($content).'</div>'; }
add_shortcode('10of12_end', 'sh_10of12_end');

function sh_11of12($attr, $content = null){     return '<div class="c11of12">'.do_shortcode($content).'</div>'; }
add_shortcode('11of12', 'sh_11of12');
function sh_11of12_end($attr, $content = null){     return '<div class="c11of12_end">'.do_shortcode($content).'</div>'; }
add_shortcode('11of12_end', 'sh_11of12_end');

function sh_clear($attr, $content = null){  return '<div class="clearfix"></div>'; }
add_shortcode('clear', 'sh_clear');
?>