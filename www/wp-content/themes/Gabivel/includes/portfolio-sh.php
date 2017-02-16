<?php

add_shortcode('portfolio', 'sh_portfolio');
function sh_portfolio($attr, $content=null)
{
	$prm = $attr;
	global $post, $paged, $more, $wpdb, $pageTitle, $sidebarPos;
	if(!isset($prm['category']))
		$cat = '';
	else
		$cat = $prm['category'];
		
	$type = 'pagination';
	if(@isset($prm['type'])) $type = $prm['type'];
	
	$imageType = 'landscape';
	
	$count = 3;
	if(@isset($prm['count'])) $count = (int) $prm['count'];
	
	if($count<3) $count =3;
	if($count>6) $count =6;
	
	$textType = 'true';
	if(@isset($prm['text'])) $textType = $prm['text'];
		
	$sidebarType = 'none';
	if(@isset($prm['sidebar'])) $sidebarType = $prm['sidebar'];
		

	$postperpage = 10;
	if(@isset($prm['postperpage']))	$postperpage = (int) $prm['postperpage'];

	if($sidebarPos!='None'){
		$ulClass = 'portfolioWithSidebar';
		$ulType = 'withSidebar';
		$pageWidth = 700;
	}else{
		$ulClass = 'portfolioWithoutSidebar';
		$ulType = 'withoutSidebar';
		$pageWidth = 940;
	}
	$spaceH = 20;
	$columnW = (int) (($pageWidth-($spaceH*($count-1)))/$count);
	$imageW = (int) ($columnW);
	
	
	$imageW = (int) ($columnW);
	if($imageType=='landscape')
		$imageH = (int) ($imageW/1.5);
	if($imageType=='portrait')
		$imageH = (int) ($imageW*1.5);
	if($imageType=='square')
		$imageH = (int)($imageW);
	
	$imageW -= 4;
	$imageH -= 4;

	if($postperpage<=0)
		$postperpage = 10;
	 
	$re = '';
	
	if(@!empty($prm['title']))
		$re .= '<h2 class="sh_portfolio_title">'.$prm['title'].'</h2>';

	if($type=='filter'){
		$catParam = '';
		if(!empty($cat))
			$catParam = " WHERE wterms.term_id in(".$cat.") ";
		
		$re .= '<ul class="portfolioFilter">';
			$cat_query = "SELECT wterms.name, wterms.term_id FROM $wpdb->terms wterms ".$catParam." ORDER BY wterms.name ASC";
			
			$catResults = $wpdb->get_results($cat_query);
			$re .= '<li data-value="all"><a href="javascript:void(0);" class="selected modal">'.__('ALL', 'rb').'</a></li>'."\n";
			foreach($catResults as $catRow)
				$re .= '<li data-value="'.$catRow->term_id.'"><a  href="javascript:void(0);" class="modal">'.$catRow->name.'</a></li>'."\n";
		$re .= '</ul><div class="clearfix"></div>';
		$re .= '<hr class="bar"/>';
	}	
			$re .= '<ul class="portfolioitems c'.$count.'columns_'.$ulType.' '.$ulClass.'" data-col="'.$count.'" data-side="'.$ulType.'">';
			if($type=='pagination')
				$wp_res = new WP_Query('post_type=post&posts_per_page='.$postperpage.'&cat='.$cat.'&paged='.$paged);
			else
				$wp_res = new WP_Query('post_type=post&cat='.$cat.'&posts_per_page=-1');
			
			if($wp_res->have_posts()){
				$i=0;
				while($wp_res->have_posts()){
				$i++;
					$wp_res->the_post();
					
				
			$useResizer = get_post_meta($post->ID, "useResizer", true);
			$cropPos 	= get_post_meta($post->ID, "cropPos", true);
			$cropPos	= ($cropPos=='')?'c':$cropPos;
			
			
			$dataID = 'data-id="id-'.$post->ID.'"';
			$dataCalss='';
			if($type=='filter')
			{
				$catIDs = '';
				foreach((get_the_category($post->ID)) as $category)
						$catIDs .= 'cat-'.$category->cat_ID.' ';
				if(!empty($catIDs))
					$dataCalss .= ' data-type="'.$catIDs.'" ';
			}		
			
			$re .= '<li '.$dataID.' '.$dataCalss.' class="portfolioitem" >';			
			$thumbnail_src = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); 
			
			if($useResizer=='use')
				$thumbnail_url = get_template_directory_uri().'/includes/timthumb.php?src='.$thumbnail_src.'&amp;h='.$imageH.'&amp;w='.$imageW.'&amp;zc=1&amp;a='.$cropPos.'&amp;q=100';
			else
				$thumbnail_url = $thumbnail_src;
					
			$portfolioformat = strtolower( get_post_format($post->ID) );
			$mediaurl = get_permalink();
			if($portfolioformat=='image')
				$mediaurl = get_post_meta($post->ID, "rb_format_big_image_url", true);
			elseif($portfolioformat=='video'){
				$videoUrl		= get_post_meta($post->ID, "rb_format_video_url", true);
				$videoWidth		= (int) get_post_meta($post->ID, "rb_format_video_width", true);
				$videoHeight	= (int) get_post_meta($post->ID, "rb_format_video_height", true);
				$mediaurl = $videoUrl.'?width='.$videoWidth.'&height='.$videoWidth;
			}
			$re .= '<div class="image_frame" rel="'.$portfolioformat.'">
				<a href="'.$mediaurl.'"  title="'.get_the_title().'" '.((in_array($portfolioformat, array('image','video')))?'class="modal"':'').'>
					<img src="'.$thumbnail_url.'" width="'.$imageW.'" alt="'.get_the_title().'" '.((!in_array($portfolioformat, array('image','video')))?'class="nomodal"':'').' />';
			$re .= '<div class="hoverWrapperBg">
				<div class="disk1"></div>
				<div class="disk2"></div>
			</div>';
				$re .= '<div class="hoverWrapper">';
				if(get_permalink()!=$mediaurl){
					if($portfolioformat=='video')
						$re .= '<span class="hoverWrapperModal hoverWrapperVideo"></span>';
					elseif($portfolioformat=='gallery')
						$re .= '<span class="hoverWrapperModal hoverWrapperGallery"></span>';
					else
						$re .= '<span class="hoverWrapperModal"></span>';
				}
				$re .= '<span class="hoverWrapperLink" rel="'.get_permalink().'"></span>';
				$re .='</div>';
			$re .= '</a>';
			$re .= '</div>';
			if($textType!='none'){
				$re .= '<h3>'.get_the_title().'</h3>';
			}
				
			$re .= '</li>';
		}
	}
	$re .= '</ul>
		<hr class="seperator" />
		<div class="clearfix"></div>';

	if($type=='pagination'){
		if(function_exists('wp_pagenavi')){
			$re .= wp_pagenavi( array( 'query' => $wp_res, 'echo' => false));
			$re.='	<div class="divider" style="height:10px"></div>
			<div class="clearfix"></div>';
		}
	}
	wp_reset_postdata();	
	return $re;
}

?>