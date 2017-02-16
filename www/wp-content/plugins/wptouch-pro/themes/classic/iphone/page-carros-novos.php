<?php 
/**
 * Template Name: Lista de Carros Novos
 */
get_header();
$custom_fields = get_post_custom();
$sidebarPos = $custom_fields['sidebarPos'][0];

?>
<div class="<?php echo ($sidebarPos!='None')?'content-with-sidebar':'content-full-width'; ?>" <?php 
		if($sidebarPos!='None'){
			if($sidebarPos=='Left') echo 'style="float:right"';
			else if($sidebarPos=='Right') echo 'style="float:left"';
		} 
		?>>
	
	<div id="left-col" class="<?php echo ($sidebarPos!='None')?'left-col-with-sidebar':'page-content'; ?>">

		<?php
		
		$args = array( 
            'post_type' => 'carro', 
            'cat' => 31,
            'posts_per_page' => 10,
            'orderby' => 'date',
            'order' => 'DESC',
            's' => $s,
            'paged' => get_query_var('paged')
        );
        
        if(isset($_GET['valorminimo']) && isset($_GET['valormaximo'])){
            $args['meta_query'] = array(
                array(
                    'key' => 'valor',
                    'value' => array( $_GET['valorminimo'], $_GET['valormaximo'] ),
                    'compare' => 'BETWEEN',
                    'type' => 'numeric',
                )
            );
        }
		
		$loop = query_posts( $args );
		
		while (have_posts()) : the_post();
			$blogClass = '';
			$blogClassArr = get_post_class(array('blogitem'), get_the_ID());
			foreach($blogClassArr as $blogClassArrItem)
				$blogClass .= $blogClassArrItem . ' ';
			
			$link = get_permalink();
			?>
			
			<article id="post-<?=get_the_ID()?>" class="<?=$blogClass?>">
				<div class="foto">
					<a href="<?=$link?>"><?php echo get_the_post_thumbnail(get_the_ID(), "thumbnail"); ?></a>
				</div>
				<div class="meta-links">
					<h3><a href="<?=$link?>"><?=get_the_title()?></a></h3>
					<hr />
					
					<table>
						<tr>
							<td>Ano</td>
							<td><?php print_custom_field('ano'); ?></td>
						</tr>
						<tr>
							<td>Modelo</td>
							<td><?php print_custom_field('modelo'); ?></td>
						</tr>
						<tr>
							<td>Cor</td>
							<td><?php print_custom_field('cor'); ?></td>
						</tr>
						<tr>
							<td>Motor</td>
							<td><?php print_custom_field('motor'); ?></td>
						</tr>
						<tr>
							<td>Km</td>
							<td><?php print_custom_field('km'); ?></td>
						</tr>
						<tr>
							<td>Combustível</td>
							<td><?php print_custom_field('combustivel'); ?></td>
						</tr>
						<tr>
							<td>Valor</td>
							<td>R$ <?php echo number_format(get_custom_field('valor'), 2,",","."); ?></td>
						</tr>
					</table>
					
				</div>
			</article>
			<div class="detalhes"><?php echo do_shortcode('[button size="small" color="red" url="' . $link . '"]Detalhes[/button]'); ?></div>
			<hr class="seperator" style="margin:40px 0px" />
			<div class="clearfix"></div>
		<?
		endwhile;
		if(function_exists('wp_pagenavi'))
			wp_pagenavi();
		
		wp_reset_query();
		?>
	</div>
</div>
<?php get_sidebar(); ?>
<div class="clearfix"></div>
<?php get_footer(); ?>
