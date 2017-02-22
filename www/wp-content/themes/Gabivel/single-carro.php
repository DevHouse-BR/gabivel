<?php
get_header();
if(have_posts())
{
	if(have_posts())
	{
		the_post();
		$postID	= get_the_ID();
		$content = get_the_content();
        $content = apply_filters('the_content', $content);
		$title = get_the_title();
		$imgW = $imageW = 570;
		$imgH = $imageH = 0;
	}
}

$useInDetail = get_post_meta($postID, "useInDetail", true);
$sidebarDefault = opt('sidebarsingledefault', '');
$sidebarPos = get_post_meta($postID, "sidebarPos", true);
if($sidebarPos=='' || $sidebarPos=='Default') $sidebarPos = $sidebarDefault;

?>
<?php echo '<h1 class="caption"><a style="font-size: inherit; color: #ed3238;" href="'.get_permalink($itemid).'">'.get_the_title().'</a></h1>'; ?>

<!-- BEGIN: single -->
<div class="<?php echo ($sidebarPos!='None')?'content-with-sidebar':'content-full-width'; ?>" <?php 
		if($sidebarPos!='None'){
			if($sidebarPos=='Left') echo 'style="float:right"';
			else if($sidebarPos=='Right') echo 'style="float:left"';
		} 
		?>>
	<div id="left-col" class="<?php echo ($sidebarPos!='None')?'left-col-with-sidebar':'page-content'; ?>">
	<div class="divider"></div>
		<?php
		$mediaDetail = get_blog_media(get_the_ID(), 'detail');
		if($useInDetail=='use' && !empty($mediaDetail)){ echo $mediaDetail; }else{ ?>
	
		<?php } ?>
		<div class="sh_1of4" >
			<?php 
			$blogformat = strtolower( get_post_format($postID) );
			if($blogformat == 'standart' || $blogformat == '') 	$blogformat = 'standart';
	
			$blogmeta = '';
			$blogmeta .= '<div class="blogcontent" style="'. (($blogformat!='aside')?' margin-top:16px; ':' margin-top:0px; '). ' margin-bottom:15px;">'; // Begin blog content
			$blogmeta .= '<div class="blogdatemeta">'; // Begin blog meta
			$blogmeta .= get_blog_meta($postID, 'posted, category, tag, comments','detail'); 		
			$blogmeta .= '<div class="clearfix"></div>'; 
			$blogmeta .= '</div>'; // End Blog Meta
			$blogmeta .= '<div class="clearfix"></div>'; 
			$blogmeta .= '</div>'; // End Blog Content
			//echo $blogmeta;
			?>
		</div>
		<div class="<?php echo ($sidebarPos!='None')?'sh_2of4':'sh_3of4';?> column_end">
		
			<?php 
			
			$more=1; 
			$conteudo = get_the_content(''); 
            $conteudo = do_shortcode($conteudo);
            echo($conteudo);
			?>
			
		<div id="detalhes">
			<h3>Detalhes</h3>
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
					<td>Portas</td>
					<td><?php print_custom_field('portas'); ?></td>
				</tr>
				<tr>
					<td>Final Placa</td>
					<td><?php print_custom_field('final_placa'); ?></td>
				</tr>
				<tr>
					<td>Combustível</td>
					<td><?php print_custom_field('combustivel'); ?></td>
				</tr>
				<tr>
					<td>Localização</td>
					<td><?php print_custom_field('localizacao'); ?></td>
				</tr>
				<tr>
					<td>Valor</td>
					<td>R$ <?php echo number_format(get_custom_field('valor'), 2,",","."); ?></td>
				</tr>
				<tr>
					<td>Marca</td>
					<td><?php print_custom_field('marca'); ?></td>
				</tr>
			</table>
		</div>

		<br style="clear: both;" />
		
		<div id="opcionais">
			<h3>Opcionais</h3>
			<hr />
			<ul>
				<li<?php if(get_custom_field('air_bag') == "0") echo(' class="naotem"') ?>>Air bag</li>
				<li<?php if(get_custom_field('air_bag_duplo') == "0") echo(' class="naotem"') ?>>Air bag duplo</li> 
				<li<?php if(get_custom_field('alarme') == "0") echo(' class="naotem"') ?>>Alarme</li> 
				<li<?php if(get_custom_field('ar_quente') == "0") echo(' class="naotem"') ?>>Ar quente</li> 
				<li<?php if(get_custom_field('ar_condicionado') == "0") echo(' class="naotem"') ?>>Ar-condicionado</li> 
				<li<?php if(get_custom_field('ar_condicionado_digital') == "0") echo(' class="naotem"') ?>>Ar-condicionado digital</li> 
				<li<?php if(get_custom_field('bancos_em_couro') == "0") echo(' class="naotem"') ?>>Bancos em couro</li> 
				<li<?php if(get_custom_field('cambio_automatico') == "0") echo(' class="naotem"') ?>>Câmbio automático</li> 
				<li<?php if(get_custom_field('cd_player') == "0") echo(' class="naotem"') ?>>CD player</li> 
				<li<?php if(get_custom_field('computador_de_bordo') == "0") echo(' class="naotem"') ?>>Computador de bordo</li> 
				<li<?php if(get_custom_field('desembacador_traseiro') == "0") echo(' class="naotem"') ?>>Desembaçador traseiro</li> 
				<li<?php if(get_custom_field('direcao_hidraulica') == "0") echo(' class="naotem"') ?>>Direção hidráulica</li> 
				<li<?php if(get_custom_field('encosto_cab_traseiro') == "0") echo(' class="naotem"') ?>>Encosto cab. traseiro</li> 
				<li<?php if(get_custom_field('engate_de_carretinha') == "0") echo(' class="naotem"') ?>>Engate de carretinha</li> 
				<li<?php if(get_custom_field('espelhos_eletricos') == "0") echo(' class="naotem"') ?>>Espelhos elétricos</li> 
				<li<?php if(get_custom_field('farol_de_neblina') == "0") echo(' class="naotem"') ?>>Farol de neblina</li> 
				<li<?php if(get_custom_field('freios_abs') == "0") echo(' class="naotem"') ?>>Freios ABS</li> 
				<li<?php if(get_custom_field('limpador_traseiro') == "0") echo(' class="naotem"') ?>>Limpador traseiro</li> 
				<li<?php if(get_custom_field('lona_maritima') == "0") echo(' class="naotem"') ?>>Lona marítima</li> 
				<li<?php if(get_custom_field('mp3_player') == "0") echo(' class="naotem"') ?>>MP3 player</li> 
				<li<?php if(get_custom_field('para_choque_na_cor') == "0") echo(' class="naotem"') ?>>Para-choque na cor</li> 
				<li<?php if(get_custom_field('pelicula_solar') == "0") echo(' class="naotem"') ?>>Película solar</li> 
				<li<?php if(get_custom_field('protetor_de_cacamba') == "0") echo(' class="naotem"') ?>>Protetor de caçamba</li> 
				<li<?php if(get_custom_field('protetor_de_carter') == "0") echo(' class="naotem"') ?>>Protetor de cárter</li> 
				<li<?php if(get_custom_field('rodas_de_liga_leve') == "0") echo(' class="naotem"') ?>>Rodas de liga leve</li> 
				<li<?php if(get_custom_field('sensor_estacionamento') == "0") echo(' class="naotem"') ?>>Sensor estacionamento</li> 
				<li<?php if(get_custom_field('teto_solar') == "0") echo(' class="naotem"') ?>>Teto solar</li> 
				<li<?php if(get_custom_field('tracao_4x4') == "0") echo(' class="naotem"') ?>>Tração 4x4</li> 
				<li<?php if(get_custom_field('travas_eletricas') == "0") echo(' class="naotem"') ?>>Travas elétricas</li> 
				<li<?php if(get_custom_field('vidros_eletricos') == "0") echo(' class="naotem"') ?>>Vidros elétricos</li> 
				<li<?php if(get_custom_field('vidros_verdes') == "0") echo(' class="naotem"') ?>>Vidros verdes</li> 
				<li<?php if(get_custom_field('volante_escamoteavel') == "0") echo(' class="naotem"') ?>>Volante escamoteável</li> 
			</ul>
		</div>
		<div class="clearfix"></div>
            <div class="sh_divider"></div>
			<br />
		<?php
		//echo do_shortcode("[jpshare]");
		echo sharing_display();
        ?>
        <!--br /><br /><h1 class="caption">Contato</h1><br />Conheça este carro.<br /><br /-->
        <?php
        //echo do_shortcode("[contact-form][contact-field label='Nome' type='name' required='1'/][contact-field label='Email' type='email' required='1'/][contact-field label='Comentário' type='textarea' required='1'/][/contact-form]");
		?>

			<div class="clearfix"></div>
			<div class="sh_divider"></div>
			<?php 
			comments_template( '', true ); 
			?>
		</div>
	</div> <!-- end of left-col -->
</div>
<!-- END: single -->
<?php if($sidebarPos!='None') get_sidebar(); ?>
<div class="clearfix"></div>
<script type="text/javascript">
    $(document).ready(function(){
        var f = $("form.contact-form");
        //console.log(f);
        //$.post("test.php", f.serialize());
    });
</script>
<?php 
get_footer();
?>